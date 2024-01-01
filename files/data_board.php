<?php
$inputValue = $_SESSION["access"];
?>
<div class="custom-select">
    <select name="tboard_in" id="tboard_in" onchange="fetchvalue();">
        <?php if ($inputValue == "all") : ?>
            <option value="none" selected disabled hidden>Select a board</option>

            <?php
            $query = "SELECT DISTINCT tboard FROM participant";
            $result = $conn->query($query);
            while ($row_temp = $result->fetch_assoc()) {
                $tplayerValue = $row_temp['tboard'];
                $formattedText = "Board-" . $tplayerValue;
                echo "<option value=\"$tplayerValue\">$formattedText</option>";
            }
        ?>
        <?php else : ?>
            <option value="<?php echo $inputValue; ?>"><?php echo "Board-" . $inputValue; ?></option>
        <?php endif; ?>
    </select>
</div>

<div class="warpper">
    <input class="radio" id="one" value="A" name="group" type="radio" onchange="fetchvalue();">
    <input class="radio" id="two" value="B" name="group" type="radio" onchange="fetchvalue();">
    <input class="radio" id="three" value="C" name="group" type="radio" onchange="fetchvalue();">
    <input class="radio" id="four" value="D" name="group" type="radio" onchange="fetchvalue();">

    <div class="tabs">
      <label class="tab" id="one-tab" for="one">A</label>
      <label class="tab" id="two-tab" for="two">B</label>
      <label class="tab" id="three-tab" for="three">C</label>
      <label class="tab" id="four-tab" for="four">D</label>
    </div>
</div>