<?php

// Free My SQL DB
//$servername = "sql12.freesqldatabase.com";
//$username = "sql12657337";
//$password = "xDESGG7pQ3";
//$dbname = "sql12657337";

// Webhost DB
//$servername = "localhost";
//$username = "id21476807_archery123";
//$password = "P@ssword@2023";
//$dbname = "id21476807_archery";

//Local Connection
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "archery";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
