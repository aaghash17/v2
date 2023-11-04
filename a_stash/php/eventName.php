<?php 
require_once 'db_config.php';
$sql = "SELECT event FROM data  where sno=1";
$event = $conn->query($sql);
$row = mysqli_fetch_assoc($event);
echo $row['event'];
