<select id="myselect" name="access" class="form-select" aria-label="Default select example" required>
    <option disabled selected value hidden> -- select an option -- </option>
    <option value="admin" <?php echo ($row['access'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
    <option value="all" <?php echo ($row['access'] == 'all') ? 'selected' : ''; ?>>All</option>
    <?php
    $query = "SELECT DISTINCT tboard FROM participant";
    $result = $conn->query($query);
    while ($row_temp = $result->fetch_assoc()) {
        $tplayerValue = $row_temp['tboard'];
        $selected = ($row['access'] == $tplayerValue) ? 'selected' : '';
        echo "<option value=\"$tplayerValue\" $selected>$tplayerValue</option>";
    }
    ?>
</select>
