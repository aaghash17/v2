<?php
$servername = "sql12.freesqldatabase.com"; // Replace with your actual server name
$username = "sql12657337";     // Replace with your actual username
$password = "xDESGG7pQ3";     // Replace with your actual password
$dbname = "sql12657337";  // Replace with your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
