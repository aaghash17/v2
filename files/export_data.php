<?php
// $result1 = $conn->query("SELECT * FROM participant");
// $user_arr[] = array('tboard', 'tplayer', 'pname', 'district', 'category', 'total', 'd11', 'd12', 'd13', 'd21', 'd22', 'd23', 'd31', 'd32', 'd33', 'd41', 'd42', 'd43', 'd51', 'd52', 'd53', 'd61', 'd62', 'd63', 'd71', 'd72', 'd73', 'd81', 'd82', 'd83', 'd91', 'd92', 'd93', 'd101', 'd102', 'd103');
// while ($row = mysqli_fetch_array($result1)) {
//   $a1 = $row['tboard'];
//   $a2 = $row['tplayer'];
//   $a3 = $row['pname'];
//   $a4 = $row['district'];
//   $a5 = $row['category'];
//   $a8 = $row['total'];
//   $a9 = $row['d11'];
//   $a10 = $row['d12'];
//   $a11 = $row['d13'];
//   $a12 = $row['d21'];
//   $a13 = $row['d22'];
//   $a14 = $row['d23'];
//   $a15 = $row['d31'];
//   $a16 = $row['d32'];
//   $a17 = $row['d33'];
//   $a18 = $row['d41'];
//   $a19 = $row['d42'];
//   $a20 = $row['d43'];
//   $a21 = $row['d51'];
//   $a22 = $row['d52'];
//   $a23 = $row['d53'];
//   $a24 = $row['d61'];
//   $a25 = $row['d62'];
//   $a26 = $row['d63'];
//   $a27 = $row['d71'];
//   $a28 = $row['d72'];
//   $a29 = $row['d73'];
//   $a30 = $row['d81'];
//   $a31 = $row['d82'];
//   $a32 = $row['d83'];
//   $a33 = $row['d91'];
//   $a34 = $row['d92'];
//   $a35 = $row['d93'];
//   $a36 = $row['d101'];
//   $a37 = $row['d102'];
//   $a38 = $row['d103'];
//   $user_arr[] = array(
//     $a1, $a2, $a3, $a4, $a5, $a8, $a9, $a10,
//     $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20,
//     $a21, $a22, $a23, $a24, $a25, $a26, $a27, $a28, $a29, $a30,
//     $a31, $a32, $a33, $a34, $a35, $a36, $a37, $a38
//   );
// }
// $serialize_user_arr = serialize($user_arr);


require_once 'db_config.php';

$result1 = $conn->query("SELECT * FROM participant");
$user_arr[] = ['tboard', 'tplayer', 'pname', 'district', 'category', 'total', 'd11', 'd12', 'd13', 'd21', 'd22', 'd23', 'd31', 'd32', 'd33', 'd41', 'd42', 'd43', 'd51', 'd52', 'd53', 'd61', 'd62', 'd63', 'd71', 'd72', 'd73', 'd81', 'd82', 'd83', 'd91', 'd92', 'd93', 'd101', 'd102', 'd103'];

while ($row = mysqli_fetch_assoc($result1)) {
    $rowData = [];
    foreach ($user_arr[0] as $columnName) {
        $rowData[] = $row[$columnName];
    }
    $user_arr[] = $rowData;
}

$serialize_user_arr = serialize($user_arr);

echo $serialize_user_arr;
