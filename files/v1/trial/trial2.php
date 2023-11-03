<?php 
require_once 'php\db_config.php';
$sql = "SELECT * FROM participant";
$result = $conn->query($sql);          
while($row = mysqli_fetch_array($result)){
    $a1 = $row['tboard'];$a2 = $row['tplayer'];$a3 = $row['pname'];$a4 = $row['age'];
    $a5 = $row['sex'];$a6 = $row['bow'];$a7 = $row['district'];$a8 = $row['total'];
    $a9 = $row['d11'];$a10 = $row['d12'];$a11 = $row['d13'];$a12 = $row['d21'];$a13 = $row['d22'];$a14 = $row['d23'];
    $a15 = $row['d31'];$a16 = $row['d32'];$a17 = $row['d33'];$a18 = $row['d41'];$a19 = $row['d42'];$a20 = $row['d43'];
    $a21 = $row['d51'];$a22 = $row['d52'];$a23 = $row['d53'];$a24 = $row['d61'];$a25 = $row['d62'];$a26 = $row['d63'];
    $a27 = $row['d71'];$a28 = $row['d72'];$a29 = $row['d73'];$a30 = $row['d81'];$a31 = $row['d82'];$a32 = $row['d83'];
    $a33 = $row['d91'];$a34 = $row['d92'];$a35 = $row['d93'];$a36 = $row['d101'];$a37 = $row['d102'];$a38 = $row['d103'];
    $user_arr[] = array($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,
                        $a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,
                        $a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,
                        $a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38);
    }
    $serialize_user_arr = serialize($user_arr);
    ?>


<h2>Export Data</h2>
      <form method='post' action='php\download.php'>
        <input type='submit' value='Export' name='Export'>
        <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
      </form-->