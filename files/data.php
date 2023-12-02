<?php
session_start();
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//   header("Location: login.php");
//   exit;
// } else {
//   $_SESSION["loggedin"] = false;
// }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once 'db_config.php';
  $data = $_POST['data'];

  if ($data[0] == "1") {
    $data = substr($data, 1);
    $len = strlen($data);
    if ($len === 3) {
      $tboard = substr($data, 0, -1);
      $tplayer = $data[2];
    } else {
      $tboard = $data[0];
      $tplayer = $data[1];
    }
    $sql = "SELECT * FROM participant where tboard='$tboard' AND tplayer='$tplayer'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $pname = $row['pname'];
    $district = $row['district'];
    $category = $row['category'];
    $d11 = $row['d11'];
    $d12 = $row['d12'];
    $d13 = $row['d13'];
    $d21 = $row['d21'];
    $d22 = $row['d22'];
    $d23 = $row['d23'];
    $d31 = $row['d31'];
    $d32 = $row['d32'];
    $d33 = $row['d33'];
    $d41 = $row['d41'];
    $d42 = $row['d42'];
    $d43 = $row['d43'];
    $d51 = $row['d51'];
    $d52 = $row['d52'];
    $d53 = $row['d53'];
    $d61 = $row['d61'];
    $d62 = $row['d62'];
    $d63 = $row['d63'];
    $d71 = $row['d71'];
    $d72 = $row['d72'];
    $d73 = $row['d73'];
    $d81 = $row['d81'];
    $d82 = $row['d82'];
    $d83 = $row['d83'];
    $d91 = $row['d91'];
    $d92 = $row['d92'];
    $d93 = $row['d93'];
    $d101 = $row['d101'];
    $d102 = $row['d102'];
    $d103 = $row['d103'];

    $result = array(
      "$pname", "$district", "$category", "2", "3", "$d11", "$d12", "$d13", "$d21", "$d22", "$d23",
      "$d31", "$d32", "$d33", "$d41", "$d42", "$d43", "$d51", "$d52", "$d53", "$d61", "$d62", "$d63",
      "$d71", "$d72", "$d73", "$d81", "$d82", "$d83", "$d91", "$d92", "$d93", "$d101", "$d102", "$d103"
    );
    $result = json_encode($result);
    echo $result;
    exit;
  }

  if ($data[0] == "2") {
    $data = substr($data, 1);
    $temp = explode('&', $data);

    $data = $temp[0];
    $len = strlen($data);
    if ($len === 3) {
      $tboard = substr($data, 0, -1);
      $tplayer = $data[2];
    } else {
      $tboard = $data[0];
      $tplayer = $data[1];
    }

    $pos = $temp[1];
    $value = $temp[2];

    $sql = "UPDATE participant set $pos = '$value' where tboard='$tboard' AND tplayer='$tplayer'";
    $result = $conn->query($sql);
    echo $result;
    exit;
  }

  if ($data[0] == "3") {
    $data = substr($data, 1);
    $temp = explode('&', $data);

    $data = $temp[0];
    $len = strlen($data);
    if ($len === 3) {
      $tboard = substr($data, 0, -1);
      $tplayer = $data[2];
    } else {
      $tboard = $data[0];
      $tplayer = $data[1];
    }
    $data = $temp[1];
    $sql = "UPDATE participant set total = '$data' where tboard='$tboard' AND tplayer='$tplayer'";
    $result = $conn->query($sql);
    echo $result;
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scoresheet</title>
  <link rel="icon" type="image/x-icon" href="images/title.ico">
  <link rel="stylesheet" href="css\datastyle.css">
  <link rel="stylesheet" href="css\table.css">
</head>

<body>
  <div class="mobile">
    <div class="header">
      <h2><?php require_once 'eventName.php'; ?></h2>
    </div>
    <?php require_once "data_board.php" ?>
    <div class="warpper">
      <input class="radio" id="one" value="A" name="group" type="radio" onchange="fetchvalue();">
      <input class="radio" id="two" value="B" name="group" type="radio" onchange="fetchvalue();">
      <input class="radio" id="three" value="C" name="group" type="radio" onchange="fetchvalue();">
      <!--input class="radio" id="four" value="D" name="group" type="radio" onchange="fetchvalue();"-->

      <div class="tabs">
        <label class="tab" id="one-tab" for="one">A</label>
        <label class="tab" id="two-tab" for="two">B</label>
        <label class="tab" id="three-tab" for="three">C</label>
        <!--label class="tab" id="four-tab" for="four">D</label-->
      </div>
    </div>

    <div class="person-details">
      <div class="group-1">
        <div class="group-1-text">NAME -&nbsp;</div>
        <div class="group-1-text">DISTRICT -&nbsp;</div>
        <div class="group-1-text">CATEGORY -&nbsp;</div>
        <!--div class="group-1-text">AGE -&nbsp;</div>
        <div class="group-1-text">BOW -&nbsp;</div-->
      </div>
      <div class="group-2">
        <div class="group-2-text"><label id="pname">!!!</label></div>
        <div class="group-2-text"><label id="district">!!!</label></div>
        <div class="group-2-text"><label id="category">!!!</label></div>
        <!--div class="group-2-text"><label id="age">!!!</label></div>
        <div class="group-2-text"><label id="bow">!!!</label></div-->
      </div>
    </div>

    <div class="table-scoresheet">
      <div class="table-heading">
        <div class="table-heading1">
          <div class="frame-1">
            <div class="_text">S.No</div>
          </div>
          <div class="frame-2">
            <div class="_text">Score</div>
          </div>
          <div class="frame-3">
            <div class="_text">Sum</div>
          </div>
        </div>
        <div class="table-heading2">
          <div class="frame-4">
            <div class="_text">1</div>
          </div>
          <div class="frame-4">
            <div class="_text">2</div>
          </div>
          <div class="frame-4">
            <div class="_text">3</div>
          </div>
        </div>
      </div>
      <div class="table-data">

        <div class="row-1">
          <div class="c-sno">
            <div class="_text">1</div>
          </div>
          <div class="c-1">
            <input type="number" id="d11" onchange="setvalue('d11');">
          </div>
          <div class="c-2">
            <input type="number" id="d12" onchange="setvalue('d12');">
          </div>
          <div class="c-3">
            <input type="number" id="d13" onchange="setvalue('d13');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s1"></label></div>
          </div>
        </div>
        <div class="row-2">
          <div class="c-sno">
            <div class="_text">2</div>
          </div>
          <div class="c-1">
            <input type="text" id="d21" onchange="setvalue('d21');">
          </div>
          <div class="c-2">
            <input type="text" id="d22" onchange="setvalue('d22');">
          </div>
          <div class="c-3">
            <input type="text" id="d23" onchange="setvalue('d23');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s2"></label></div>
          </div>
        </div>
        <div class="row-3">
          <div class="c-sno">
            <div class="_text">3</div>
          </div>
          <div class="c-1">
            <input type="text" id="d31" onchange="setvalue('d31');">
          </div>
          <div class="c-2">
            <input type="text" id="d32" onchange="setvalue('d32');">
          </div>
          <div class="c-3">
            <input type="text" id="d33" onchange="setvalue('d33');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s3"></label></div>
          </div>
        </div>
        <div class="row-4">
          <div class="c-sno">
            <div class="_text">4</div>
          </div>
          <div class="c-1">
            <input type="text" id="d41" onchange="setvalue('d41');">
          </div>
          <div class="c-2">
            <input type="text" id="d42" onchange="setvalue('d42');">
          </div>
          <div class="c-3">
            <input type="text" id="d43" onchange="setvalue('d43');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s4"></label></div>
          </div>
        </div>
        <div class="row-5">
          <div class="c-sno">
            <div class="_text">5</div>
          </div>
          <div class="c-1">
            <input type="text" id="d51" onchange="setvalue('d51');">
          </div>
          <div class="c-2">
            <input type="text" id="d52" onchange="setvalue('d52');">
          </div>
          <div class="c-3">
            <input type="text" id="d53" onchange="setvalue('d53');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s5"></label></div>
          </div>
        </div>
        <div class="row-6">
          <div class="c-sno">
            <div class="_text">6</div>
          </div>
          <div class="c-1">
            <input type="text" id="d61" onchange="setvalue('d61');">
          </div>
          <div class="c-2">
            <input type="text" id="d62" onchange="setvalue('d62');">
          </div>
          <div class="c-3">
            <input type="text" id="d63" onchange="setvalue('d63');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s6"></label></div>
          </div>
        </div>

        <div class="row-7">
          <div class="c-sno">
            <div class="_text">7</div>
          </div>
          <div class="c-1">
            <input type="text" id="d71" onchange="setvalue('d71');">
          </div>
          <div class="c-2">
            <input type="text" id="d72" onchange="setvalue('d72');">
          </div>
          <div class="c-3">
            <input type="text" id="d73" onchange="setvalue('d73');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s7"></label></div>
          </div>
        </div>

        <div class="row-8">
          <div class="c-sno">
            <div class="_text">8</div>
          </div>
          <div class="c-1">
            <input type="text" id="d81" onchange="setvalue('d81');">
          </div>
          <div class="c-2">
            <input type="text" id="d82" onchange="setvalue('d82');">
          </div>
          <div class="c-3">
            <input type="text" id="d83" onchange="setvalue('d83');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s8"></label></div>
          </div>
        </div>

        <div class="row-9">
          <div class="c-sno">
            <div class="_text">9</div>
          </div>
          <div class="c-1">
            <input type="text" id="d91" onchange="setvalue('d91');">
          </div>
          <div class="c-2">
            <input type="text" id="d92" onchange="setvalue('d92');">
          </div>
          <div class="c-3">
            <input type="text" id="d93" onchange="setvalue('d93');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s9"></label></div>
          </div>
        </div>

        <div class="row-10">
          <div class="c-sno">
            <div class="_text">10</div>
          </div>
          <div class="c-1">
            <input type="text" id="d101" onchange="setvalue('d101');">
          </div>
          <div class="c-2">
            <input type="text" id="d102" onchange="setvalue('d102');">
          </div>
          <div class="c-3">
            <input type="text" id="d103" onchange="setvalue('d103');">
          </div>
          <div class="c-sum">
            <div class="_text"><label id="s10"></label></div>
          </div>
        </div>

      </div>
      <div class="table-total">
        <div class="frame-18">
          <div class="_text">Total</div>
        </div>
        <div class="frame-19">
          <div class="_text"><label id="total"></label></div>
        </div>
      </div>
    </div>

  </div>
  <script src="js/datascript.js"></script>
</body>

</html>