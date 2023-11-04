<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--meta http-equiv="refresh" content="5"-->
  <title>Scoreview</title>
  <link rel="icon" type="image/x-icon" href="images/title.ico">
  <link rel="stylesheet" href="css\viewstyle.css">
</head>

<body>


  <div class="header">
    <h1><?php require_once 'eventName.php'; ?><br>SCORESHEET</h1>
  </div>



  <div id="refreshedDiv">
    <?php require_once 'viewtable.php'; ?>
  </div>

  <script>
    function refreshDiv() {
      fetch('viewtable.php')
        .then(response => response.text()) // assuming the PHP file returns text
        .then(data => {
          var result = data;
        })
        .catch(error => {
          alert("Cant Fetch");
        });
      document.getElementById("refreshedDiv").innerHTML = result;
    }
    setInterval(refreshDiv, 1000);
  </script>


</body>

</html>