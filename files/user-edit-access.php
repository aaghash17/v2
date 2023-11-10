<select id="myselect" name="access" class="form-select" aria-label="Default select example" required>
    <option disabled selected value hidden> -- select an option -- </option>
    <option value="admin" <?php echo ($row['access'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
    <option value="all" <?php echo ($row['access'] == 'all') ? 'selected' : ''; ?>>All</option>
    <option value="1" <?php echo ($row['access'] == '1') ? 'selected' : ''; ?>>1</option>
    <option value="2" <?php echo ($row['access'] == '2') ? 'selected' : ''; ?>>2</option>
    <option value="3" <?php echo ($row['access'] == '3') ? 'selected' : ''; ?>>3</option>
    <option value="4" <?php echo ($row['access'] == '4') ? 'selected' : ''; ?>>4</option>
    <option value="5" <?php echo ($row['access'] == '5') ? 'selected' : ''; ?>>5</option>
    <option value="6" <?php echo ($row['access'] == '6') ? 'selected' : ''; ?>>6</option>
    <option value="7" <?php echo ($row['access'] == '7') ? 'selected' : ''; ?>>7</option>
    <option value="8" <?php echo ($row['access'] == '8') ? 'selected' : ''; ?>>8</option>
    <option value="9" <?php echo ($row['access'] == '9') ? 'selected' : ''; ?>>9</option>
    <option value="10" <?php echo ($row['access'] == '10') ? 'selected' : ''; ?>>10</option>
</select>