<?php
require_once 'db_config.php';
//$result = $conn->query("SHOW COLUMNS FROM participant FROM sql12657337");
//$result = $conn->query("SHOW COLUMNS FROM participant FROM id21476807_archery");
$result = $conn->query("SHOW COLUMNS FROM participant FROM archery");
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}
$columnArr = array_column($data, 'Field');
$result = $conn->query("SELECT * FROM participant");
// $result1 = $conn->query("SELECT * FROM participant");
// $user_arr[] = array('tboard', 'tplayer', 'pname', 'district', 'category', 'total', 'd11', 'd12', 'd13', 'd21', 'd22', 'd23', 'd31', 'd32', 'd33', 'd41', 'd42', 'd43', 'd51', 'd52', 'd53', 'd61', 'd62', 'd63', 'd71', 'd72', 'd73', 'd81', 'd82', 'd83', 'd91', 'd92', 'd93', 'd101', 'd102', 'd103');
// while ($row = mysqli_fetch_array($result1)) {
//   $a1 = $row['tboard'];
//   $a2 = $row['tplayer'];
//   $a3 = $row['pname'];
//   $a4 = $row['district'];
//   $a5 = $row['category'];
//   $a8 = $row['total'];
//   $a9 = $row['d11'];
//   $a10 = $row['d12'];
//   $a11 = $row['d13'];
//   $a12 = $row['d21'];
//   $a13 = $row['d22'];
//   $a14 = $row['d23'];
//   $a15 = $row['d31'];
//   $a16 = $row['d32'];
//   $a17 = $row['d33'];
//   $a18 = $row['d41'];
//   $a19 = $row['d42'];
//   $a20 = $row['d43'];
//   $a21 = $row['d51'];
//   $a22 = $row['d52'];
//   $a23 = $row['d53'];
//   $a24 = $row['d61'];
//   $a25 = $row['d62'];
//   $a26 = $row['d63'];
//   $a27 = $row['d71'];
//   $a28 = $row['d72'];
//   $a29 = $row['d73'];
//   $a30 = $row['d81'];
//   $a31 = $row['d82'];
//   $a32 = $row['d83'];
//   $a33 = $row['d91'];
//   $a34 = $row['d92'];
//   $a35 = $row['d93'];
//   $a36 = $row['d101'];
//   $a37 = $row['d102'];
//   $a38 = $row['d103'];
//   $user_arr[] = array(
//     $a1, $a2, $a3, $a4, $a5, $a8, $a9, $a10,
//     $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20,
//     $a21, $a22, $a23, $a24, $a25, $a26, $a27, $a28, $a29, $a30,
//     $a31, $a32, $a33, $a34, $a35, $a36, $a37, $a38
//   );
// }
// $serialize_user_arr = serialize($user_arr);

?>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  //  header("Location: login.php");
  //  exit;
  //} else {
  //  $_SESSION["loggedin"] = false;
  //}
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
              $category = $data[4];
              $sql = "select count(*) as allcount from participant where pname='" . $pname . "' and tboard='" . $tboard . "' and  tplayer='" . $tplayer .  "' and district='" . $district . "' and category='" . $category  . "'";
              $retrieve_data = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($retrieve_data);
              $count = $row['allcount'];
              if ($count == 0) {

                $insert_query = "insert into participant(pname,tboard,tplayer,district,category) values('" . $pname . "','" . $tboard . "','" . $tplayer . "','" . $district . "','" . $category . "' )";
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
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body onload="loadfunc()">
  <div class="header">
    <h1>Welcome, Admin!</h1>
  </div>

  <div class="content">

    <h2>Event Name</h2>
    <input type="text" id="event-name" size="50">
    <button onclick="myEvent()">Change</button>

    <h2>Upload Excel and Insert Data</h2>
    <form method="post" action="" enctype="multipart/form-data" id="import_form">
      <a href="refer\example.csv" target="_blank">Download Sample Format</a><br>
      <h6></h6>
      <input type='file' name="importfile" id="importfile" accept=".csv">
      <input type="submit" id="but_import" name="but_import" value="Import">
    </form>

    <h2>Export Data</h2>
    <form method='post' action='download.php'>
      <input type='submit' value='Export' name='Export'>
      <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
    </form>

    <h2>Clear Table Data</h2>
    <button onclick="clearTable()">ClearTable</button>


    <div class="table-container">
      <table>
        <thead>
          <tr>
            <?php
            foreach ($columnArr as $value) {
              echo "<th>" . $value . "</th>";
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($columnArr as $a) {
              echo "<td>" . $row[$a] . "</td>";
            }
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php
  include "user-index.php";
  ?>


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