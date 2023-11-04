<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scoreview</title>
  <link rel="icon" type="image/x-icon" href="images/title.ico">
  <link rel="stylesheet" href="css\viewstyle.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
  <div class="header">
    <h1><?php require_once 'eventName.php'; ?><br>SCORESHEET</h1>
  </div>
  <div id="refreshedDiv">
    <?php require_once 'viewtable.php'; ?>
  </div>
  <script>
    let result;

    function refreshDiv() {
      fetch('viewtable.php')
        .then(response => response.text())
        .then(data => {
          result = data;
        })
        .catch(error => {
          alert("Cant Fetch");
        });
      if (typeof result === 'undefined') {} else {
        document.getElementById("refreshedDiv").innerHTML = result;
      }

    }
    setInterval(refreshDiv, 1000);
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>