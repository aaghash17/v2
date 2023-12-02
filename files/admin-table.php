<?php
require_once 'db_config.php';
$result = $conn->query("SHOW COLUMNS FROM participant FROM " . $dbname);
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$columnArr = array_column($data, 'Field');
$result = $conn->query("SELECT * FROM participant");
?>

<div class="table-container">
    <table class="table table-bordered">
        <thead class="table-dark sticky-header">
            <tr>

                <?php
                foreach ($columnArr as $value) {
                    echo "<th>" . $value . "</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($columnArr as $a) {
                    echo "<td>" . $row[$a] . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>