<?php 
require_once 'php\db_config.php';


$result = $conn->query("SHOW COLUMNS FROM participant FROM archery");

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

$columnArr = array_column($data, 'Field');

$sql = "SELECT * FROM participant";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $data[] = $row;
}   
    
foreach ($columnArr as $a)
{
    $b = array_column($data, $a);
    foreach ($b as $c)
    {
        echo $c;
    }
}
    //$columnArr = array_column($data, 'pname');

//foreach($columnArr as $value){
//    echo $value . "<br>";}
?>


