<?php
header('Content-type: text/html; charset=utf-8');
include("connectoSQL.php");
$sql = "SELECT name,totscore,avgscore,completenum FROM test ORDER BY totscore,avgscore,completenum";
$result=mysql_query($sql);
$data=array();
while($rank=$mysql_fetch_assoc($result));
{
    $data[]=$rank;
}
echo json_encode($data);
?>
