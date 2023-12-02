<?php
session_start();
require_once 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $inUsername = $_POST["username"];
  $inPassword = $_POST["password"];

  $sql = "SELECT * FROM crud where username='$inUsername'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($inPassword == $row['password']) {
      //echo "<script>alert('Access is " . $row['access'] . "');</script>";
      $board = array('all', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
      if (in_array($row['access'], $board)) {
        $variableB = $variableA;
        $_SESSION["loggedin"] = true;
        header("Location: data.php");
      } else if ($row['access'] == "admin") {
        echo "<script>alert('Access is admin');</script>";
      } else {
        echo "<script>alert('Access is not updated');</script>";
      }
    } else {
      echo "<script>alert('Password is incorrect');</script>";
    }
  } else {
    echo "<script>alert('Username doesnt exist');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/x-icon" href="images/title.ico">
  <link rel="stylesheet" href="css/style.css" />
</head>

<body class="bg-img bg-cover" style="background-image: url(images/bg.jpg)">
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h1 class="heading-section">National Indoor Archery Association</h1>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">
            <h3 class="mb-4 text-center"><b>Login</b></h3>
            <form method="post" action="" class="signin-form">
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required />
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password" required />
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">
                  Sign In
                </button>
              </div>
              <div class="form-group d-md-flex">
                <div class="w-50">
                </div>
                <div class="w-50 text-md-right">
                </div>
              </div>
            </form>
            <p class="w-100 text-center">
              <a href="user-add.php"><u>Not Registered? Sign Up</u></a>
            </p>
            <p class="w-100 text-center">
              <a href="view.php" target="_blank"><u>View the scorecard</u></a>
            </p>
            <p class="w-100 text-center">
              &mdash; <a href="data.php" target="_blank">Score entry</a>&mdash;
            </p>
            <p class="w-100 text-center">
              &mdash; <a href="admin.php" target="_blank">Admin Page</a>&mdash;
            </p>
            <div class="social d-flex text-center">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/login/jquery.min.js"></script>
  <script src="js/login/popper.js"></script>
  <script src="js/login/bootstrap.min.js"></script>
  <script src="js/login/main.js"></script>

</body>

</html>