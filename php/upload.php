<?php
header('Content-type: text/html; charset=utf-8');
?>
<?php
include("connectoSQL.php");
$file_name = $_FILES['file']['name'];
$file_tmp_name = $_FILES['file']['tmp_name'];
$imagetmp=addslashes(file_get_contents($file_tmp_name));
$result="INSERT INTO test(head) VALUES('$imagetmp')";
mysql_query($result);
?>