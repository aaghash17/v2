<html>
<head>
    <title>Database Data Display</title>
</head>
<body>
    <h1>Database Data</h1>

    <?php
    // Database connection parameters
    $servername = "sql12.freesqldatabase.com"; // Replace with your server name
    $username = "sql12657337"; // Replace with your database username
    $password = "xDESGG7pQ3"; // Replace with your database password
    $dbname = "sql12657337"; // Replace with your database name

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data from the database table
    $sql = "SELECT * FROM participant"; // Replace with your table name

    // Execute the query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        //echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

        // Fetch and display data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["pname"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["sex"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
