<?php
include "db_config.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $access = $_POST['access'];

  $sql = "UPDATE `crud` SET `username`='$username',`password`='$password',`access`='$access' WHERE username = '$id'";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: admin.php");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="bootstrap-5.2.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
  <title>User Edit</title>
</head>

<body>
  <br><br>
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Detail</h3>
      <!--p class="text-muted">Click update after changing any information</p-->
    </div>

    <?php
    $sql = "SELECT * FROM `crud` WHERE username = '$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="mb-3">
          <label class="form-label">Username:</label>
          <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password:</label>
          <input type="text" class="form-control" name="password" value="<?php echo $row['password'] ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Access:</label>
          <?php
          include "user-edit-access.php";
          ?>
        </div>
        <div onload="selfunc()"></div>
        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="admin.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
  <script>
    function selfunc() {
      alert("Hello");
    }
  </script>

</body>

</html>