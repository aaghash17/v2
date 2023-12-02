<?php
$inputValue = $_SESSION["access"];
?>

<div class="custom-select">
    <select name="tboard_in" id="tboard_in" onchange="fetchvalue();">
        <?php if ($inputValue == "all") : ?>
            <option value="none" selected disabled hidden>Select a board</option>
            <option value="1">Board-1</option>
            <option value="2">Board-2</option>
            <option value="3">Board-3</option>
            <option value="4">Board-4</option>
            <option value="5">Board-5</option>
            <option value="6">Board-6</option>
            <option value="7">Board-7</option>
            <option value="8">Board-8</option>
            <option value="9">Board-9</option>
            <option value="10">Board-10</option>
        <?php endif; ?>
        <?php if ($inputValue == "1") : ?>
            <option value="1" selected>Board-1</option>
        <?php endif; ?>
        <?php if ($inputValue == "2") : ?>
            <option value="2" selected>Board-2</option>
        <?php endif; ?>
        <?php if ($inputValue == "3") : ?>
            <option value="3" selected>Board-3</option>
        <?php endif; ?>
        <?php if ($inputValue == "4") : ?>
            <option value="4" selected>Board-4</option>
        <?php endif; ?>
        <?php if ($inputValue == "5") : ?>
            <option value="5" selected>Board-5</option>
        <?php endif; ?>
        <?php if ($inputValue == "6") : ?>
            <option value="6" selected>Board-6</option>
        <?php endif; ?>
        <?php if ($inputValue == "7") : ?>
            <option value="7" selected>Board-7</option>
        <?php endif; ?>
        <?php if ($inputValue == "8") : ?>
            <option value="8" selected>Board-8</option>
        <?php endif; ?>
        <?php if ($inputValue == "9") : ?>
            <option value="9" selected>Board-9</option>
        <?php endif; ?>
        <?php if ($inputValue == "10") : ?>
            <option value="10" selected>Board-10</option>
        <?php endif; ?>
    </select>
</div>