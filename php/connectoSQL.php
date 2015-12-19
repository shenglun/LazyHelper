<?php
header('Content-type: text/html; charset=utf-8');
$Link = mysql_connect('localhost', 'team6', 'e2402');
mysql_query("SET NAMES 'UTF8'");
mysql_select_db("team6",$Link);
if (!$Link)
{
  die('連線失敗，輸出錯誤訊息 : ' . mysql_error($Link));
}
?>