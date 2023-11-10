<?php
include "db_config.php";

if (isset($_POST["submit"])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $conf_pass = $_POST['confirm_password'];
   if (strlen($username) > 3 && strlen($username) < 16) {
      $sql = "SELECT * FROM crud WHERE username = '$username'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         echo '<script>alert("Username already exists")</script>';
      } else {
         if (strlen($password) > 7 && strlen($password) < 16) {
            if ($password == $conf_pass) {
               $sql = "INSERT INTO `crud`(`id`, `username`, `password`) VALUES (NULL,'$username','$password')";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                  echo '<script>alert("User created")</script>';
                  header("Location: login.php");
               } else {
                  echo "Failed: " . mysqli_error($conn);
               }
            } else {
               echo '<script>alert("Passwords dont match")</script>';
            }
         } else {
            echo '<script>alert("Password must be 8 to 16 characters")</script>';
         }
      }
   } else {
      echo '<script>alert("Username must be 4 to 16 characters")</script>';
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/x-icon" href="images/title.ico">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>Add User</title>
</head>

<body>

   <br><br>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Username:</label>
                  <input type="text" class="form-control" name="username" placeholder="username" required>
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Password:</label>
                  <input type="text" class="form-control" name="password" placeholder="password" required>
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Confirm Password:</label>
                  <input type="text" class="form-control" name="confirm_password" placeholder="password" required>
               </div>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Submit</button>
               <a href="login.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>