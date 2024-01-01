<?php
require_once 'db_config.php';

session_start();
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//   header("Location: login.php");
//   exit;
// } else {
//   $_SESSION["loggedin"] = false;
// }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['data'])) {
    $data = $_POST['data'];

    if ($data[0] == "1") {
      $sql = "SELECT event FROM data  where sno=1";
      $event = $conn->query($sql);
      $row = mysqli_fetch_assoc($event);
      echo $row['event'];
      exit;
    }

    if ($data[0] == "2") {
      $data = substr($data, 1);
      $sql = "UPDATE data set event = '$data' where sno=1";
      $result = $conn->query($sql);
      echo $result;
      exit;
    }

    if ($data[0] == "3") {
      $sql = "TRUNCATE TABLE participant;";
      $result = $conn->query($sql);
      echo $result;
      exit;
    }
  }

  if (isset($_POST['but_import'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["importfile"]["name"]);

    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $uploadOk = 1;
    if ($imageFileType != "csv") {
      $uploadOk = 0;
    }

    if ($uploadOk != 0) {

      $sql = "TRUNCATE TABLE participant;";
      $result = $conn->query($sql);

      if (move_uploaded_file($_FILES["importfile"]["tmp_name"], $target_dir . 'importfile.csv')) {
        $target_file = $target_dir . 'importfile.csv';
        $fileexists = 0;
        if (file_exists($target_file)) {
          $fileexists = 1;
        }
        if ($fileexists == 1) {
          $file = fopen($target_file, "r");
          $i = 0;
          $importData_arr = array();
          while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($data);
            for ($c = 0; $c < $num; $c++) {
              $importData_arr[$i][] = mysqli_real_escape_string($conn, $data[$c]);
            }
            $i++;
          }
          fclose($file);
          $skip = 0;
          foreach ($importData_arr as $data) {
            if ($skip != 0) {
              $tboard = $data[0];
              $tplayer = $data[1];
              $pname = $data[2];
              $district = $data[3];
              $age = $data[4];
              $sex = $data[5];
              $bow = $data[6];
              $sql = "select count(*) as allcount from participant where pname='" . $pname . "' and tboard='" . $tboard . "' and  tplayer='" . $tplayer .  "' and district='" . $district . "' and age='" . $age . "'  and sex='" . $sex . "' and bow='" . $bow  . "'";
              $retrieve_data = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($retrieve_data);
              $count = $row['allcount'];
              if ($count == 0) {

                $insert_query = "insert into participant(pname,tboard,tplayer,district,age,sex,bow) values('" . $pname . "','" . $tboard . "','" . $tplayer . "','" . $district . "','" . $age . "','" . $sex . "','" . $bow . "' )";
                mysqli_query($conn, $insert_query);
              }
            }
            $skip++;
          }
          $newtargetfile = $target_file;
          if (file_exists($newtargetfile)) {
            unlink($newtargetfile);
          }
        }
      }
    }
    header("Refresh:0");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="images/title.ico">
  <title>Admin Page</title>
  <link rel="stylesheet" href="css\adminstyle.css">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="bootstrap-5.2.3/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.2.3/bootstrap.bundle.min.js"></script>
</head>

<body onload="loadfunc()">

  <div class="container mt-4">

    <nav class="navbar navbar-dark bg-primary rounded py-4">
      <div class="container text-center">
        <br><span class="navbar-brand mb-0 h1" style="font-size: 2rem;">Admin Page</span><br>
      </div>
    </nav>

    <div class="container mt-4">
      <h4>Event Name</h4>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="event-name" aria-describedby="button-addon">
        <button class="btn btn-primary" type="button" id="button-addon" onclick="myEvent()">Change</button>
      </div>
    </div>

    <div class="container mt-4">
      <h4>Upload Excel and Insert Data</h4>
      <form method="post" action="" enctype="multipart/form-data" id="import_form" class="mt-2">
        <a href="refer\example.csv" target="_blank">Download Sample Format</a><br>
        <h6></h6>
        <div class="mb-3">
          <label for="importfile" class="form-label">Choose Excel File (.csv)</label>
          <input type='file' class="form-control" name="importfile" id="importfile" accept=".csv">
        </div>
        <input type="submit" class="btn btn-primary" id="but_import" name="but_import" value="Import">
      </form>
    </div>

    <div class="container mt-4">
      <h4>Export Data</h4>
      <form method='post' action='download.php'>
        <button type='submit' class='btn btn-primary'>Export</button>
        <textarea name='export_data' style='display: none;'><?php require_once 'export_data.php' ?></textarea>
      </form>
    </div>

    <!--div class="container mt-4">
      <h4>Clear Table Data</h4>
      <button type="button" class="btn btn-danger" onclick="clearTable()">Clear Table</button>
    </div-->

    <div class="container mt-4">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h4 class="d-inline-block">User credential</h4>
          <button type="button" class="btn btn-primary ms-2">+</button>
        </div>
      </div>
      <?php require_once "user-index.php"; ?>
    </div>

    <div class="container mt-4">
      <h4>Data table</h4>
      <?php require_once "admin-table.php"; ?>
    </div>


    <script>
      function setSessionVariable(data) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            if (data[0] == 1) {
              result = xhr.responseText;
              document.getElementById("event-name").value = result;
            }
            if (data[0] == 2) {
              result = xhr.responseText;
              alert("Event name changed");
              location.reload();
            }
            if (data[0] == 3) {
              result = xhr.responseText;
              alert("Table cleared");
              location.reload();
            }
          }
        };
        xhr.send('data=' + encodeURIComponent(data));
      }

      function loadfunc() {
        setSessionVariable("1");
      }

      function myEvent() {
        setSessionVariable("2" + document.getElementById("event-name").value);
      }

      function clearTable() {
        if (confirm("Do you want to clear Table!")) {
          setSessionVariable("3");
        } else {}
      }
    </script>

</body>

</html>