<?php
require_once "db_config.php";

//$start = $_GET['start'];
//$batchSize = $_GET['batchSize'];

//$sql = "SELECT tboard,tplayer,pname,district,category,total FROM participant LIMIT $start, $batchSize";

$start = $_GET['start'];
$batchSize = $_GET['batchSize'];

$sql = "SELECT tboard,tplayer,pname,district,category,total FROM participant ORDER BY total desc LIMIT $start, $batchSize";

$result = $conn->query($sql);

$entries = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $entries[] = $row;
    }
}

echo json_encode($entries);
