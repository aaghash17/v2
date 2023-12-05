<?php
require_once 'db_config.php';
//$sql = "SELECT tboard,tplayer,pname,district,category,total FROM participant ORDER BY total desc";
//$result = $conn->query($sql);
?>

<body onload=" fetchAndDisplayEntries()">
    <div class="container">
        <div class="row">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>TARGET</th>
                        <th>NAME</th>
                        <th>DISTRICT</th>
                        <th>CATEGORY</th>
                        <th>SCORE</th>
                    </tr>
                </thead>
                <tbody id="table-body">

                </tbody>
            </table>
        </div>
    </div>

    <script>
        function displayEntries(entries) {
            var tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Clear existing rows

            entries.forEach(function(entry) {
                var row = document.createElement('tr');
                if (entry.total == null) {
                    var total = "";
                } else {
                    total = entry.total;
                }
                row.innerHTML = '<td>' + entry.tboard + entry.tplayer + '</td><td>' + entry.pname + '</td><td>' + entry.district + '</td><td>' + entry.category + '</td><td>' + total + '</td>';
                tableBody.appendChild(row);
            });
        }

        function fetchAndDisplayEntries() {
            var currentIndex = 0;
            var batchSize = 10;
            var totalEntries = <?php echo $conn->query("SELECT COUNT(*) FROM participant")->fetch_row()[0]; ?>;

            function displayNextBatch() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var entries = JSON.parse(this.responseText);

                        if (entries.length > 0) {
                            displayEntries(entries);
                            currentIndex += batchSize;

                            if (currentIndex < totalEntries) {
                                setTimeout(displayNextBatch, 5000);
                            } else {
                                currentIndex = 0;
                                setTimeout(displayNextBatch, 5000);
                            }
                        }
                    }
                };
                xmlhttp.open("GET", "get_entries.php?start=" + currentIndex + "&batchSize=" + batchSize, true);
                xmlhttp.send();
            }

            displayNextBatch();
        }
        fetchAndDisplayEntries();
    </script>
</body>