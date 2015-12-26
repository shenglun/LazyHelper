<?php
include("connectoSQL.php");
$sql = "SELECT * FROM test";
$result = mysql_query($sql);//以後存經驗值 等級顯示在MISSION網頁
$id = $_SESSION["id"];
echo "$id";
?>