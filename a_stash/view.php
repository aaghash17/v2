<?php
require_once 'php\db_config.php';
$sql = "SELECT tboard,tplayer,pname,district,total FROM participant ORDER BY total desc";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="5">
  <title>Scoreview</title>
  <link rel="icon" type="image/x-icon" href="images/title.ico">
  <link rel="stylesheet" href="css\viewstyle.css">
</head>

<body>


  <div class="header">
    <h1><?php require_once 'php\eventName.php'; ?><br>SCORESHEET</h1>
  </div>

  <div class="row">
    <div class="column">
      <!-- Left Side -->
      <table class="content-table">
        <thead>
          <tr>
            <th>TARGET</th>
            <th>NAME</th>
            <th>DISTRICT</th>
            <th>SCORE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $x = 0;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <td><?php echo $row['tboard'];
                  echo $row['tplayer']; ?></td>
              <td><?php echo $row['pname']; ?></td>
              <td><?php echo $row['district']; ?></td>
              <td><?php echo $row['total']; ?></td>
          </tr>

        <?php
              $x = $x + 1;
              if ($x == 15) {
                break;
              }
            }
        ?>
        </tbody>
      </table>
    </div>
    <div class="column">
      <!-- Right side -->
      <table class="content-table">
        <thead>
          <tr>
            <th>TARGET</th>
            <th>NAME</th>
            <th>DISTRICT</th>
            <th>SCORE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <td><?php echo $row['tboard'];
                  echo $row['tplayer']; ?></td>
              <td><?php echo $row['pname']; ?></td>
              <td><?php echo $row['district']; ?></td>
              <td><?php echo $row['total']; ?></td>
          </tr>
        <?php
            }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>