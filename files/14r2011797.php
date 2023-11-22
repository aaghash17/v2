<?php
require_once 'db_config.php';
$sql = "SELECT * FROM crud WHERE username = 'acosadmin'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $sql = "DELETE FROM crud WHERE username = 'acosadmin'";
    $result = $conn->query($sql);
    echo "<h3>Deleted old!!!!!!!!!!</h3>";
}

$sql = "INSERT INTO `crud`(`username`, `password`,`access`) VALUES ('acosadmin','aaghash1797','admin')";
$result = mysqli_query($conn, $sql);
echo "<h3>Created new!!!!!!!!!!</h3>";

echo "acosadmin-aaghash1797";
