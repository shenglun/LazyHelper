<?php
header('Content-type: text/html; charset=utf-8');
include("connectoSQL.php");
session_start();
$id=$_SESSION["id"];
if($id==NULL)
{
    echo '';
}
else 
{	
	$total=0;
	$str='';
    $sql = "SELECT  num,name FROM mission WHERE who='$id'";
    $result = mysql_query($sql);
    while($row = mysql_fetch_row($result))
	{
		$sql = "SELECT id FROM accept WHERE num = $row[0]";
		$result2 = mysql_query($sql);
		while($row2 = mysql_fetch_row($result2))
		{
		$total++;
		$str=$str."<p>$row2[0] accept your mission $row[1].</p>";
		}
	}
	echo $total;
	echo $str;
}
?>
