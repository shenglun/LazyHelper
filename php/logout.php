<?php
header('Content-type: text/html; charset=utf-8');
include("connectoSQL.php");
session_start();
unset($_SESSION['id']);
$sql = "SELECT token FROM online ";
$result = mysql_query($sql);
$sql = "UPDATE online SET token=token-1 ";
$result = mysql_query($sql);
?>