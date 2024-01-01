<?php
require_once 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scoreview</title>
  <link rel="icon" type="image/x-icon" href="images/title.ico">
  <link rel="stylesheet" href="css\viewstyle.css">
  <link href="bootstrap-5.2.3/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.2.3/bootstrap.bundle.min.js"></script>
  <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" /-->
</head>

<body>
  <!--div class="header">
    <h1><?php //require_once 'eventName.php'; 
        ?><br>SCORESHEET</h1>
  </div-->
  <div class="container mt-5">
    <nav class="navbar navbar-dark bg-primary rounded py-4">
      <div class="container text-center">
        <br><span class="navbar-brand mb-0 h1" style="font-size: 2rem;"><?php require_once 'eventName.php'; ?><br>SCORESHEET</span><br>
      </div>
    </nav>

    <div class="pt-5">
    <div class="px-5">
    <?php require_once 'viewtable1.php'; ?>
    </div>
    </div>

    <script>
      let result;

      // function refreshDiv() {
      //   fetch('viewtable.php')
      //     .then(response => response.text())
      //     .then(data => {
      //       result = data;
      //     })
      //     .catch(error => {
      //       alert("Cant Fetch");
      //     });
      //   if (typeof result === 'undefined') {} else {
      //     document.getElementById("refreshedDiv").innerHTML = result;
      //   }

      // }
      // setInterval(refreshDiv, 1000);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>