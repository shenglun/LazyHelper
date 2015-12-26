<?php
include ("connectoSQL.php");
header('Content-type: text/html; charset=utf-8');
$type = $_POST['type'];//原本為mission
$num = $_POST['num'];
$score = $_POST['score'];
$num2 = (int)$num;
$score = (int)$score;
$sql = "SELECT id FROM accept WHERE num=$num";
$result = mysql_query($sql);
$user = mysql_fetch_row($result);
$user = $user[0];
$sql = "SELECT totscore FROM test WHERE name = '$user'";
$result = mysql_query($sql);
$totscore =(int)mysql_fetch_row($result);
$totscore = $totscore[0]+$score;
$sql = "SELECT completenum FROM test WHERE name = '$user'";
$result = mysql_query($sql);
$completenum = mysql_fetch_row($result);
$completenum = $completenum[0]+1;
$avgscore = $totscore/$completenum;
$sql = "UPDATE test SET completenum  = $completenum WHERE name = '$user'";
mysql_query($sql);
$sql = "UPDATE test SET totscore = $totscore WHERE name = '$user'";
mysql_query($sql);
$sql = "UPDATE test SET avgscore  = $avgscore WHERE name = '$user'";
mysql_query($sql);
$sql = "DELETE FROM accept WHERE type = '$type' AND num = $num2 ";
mysql_query($sql);
$sql = "DELETE FROM message WHERE type = '$type' AND num = $num2 ";
mysql_query($sql);
$sql = "DELETE FROM mission WHERE type = '$type' AND num = $num2 ";
mysql_query($sql);
echo "$totscore";///**/
?>
