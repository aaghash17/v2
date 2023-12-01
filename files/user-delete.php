<?php
include "db_config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `crud` WHERE username ='$id'";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: admin.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
