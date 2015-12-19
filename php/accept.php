<?php
include ("connectoSQL.php");
header('Content-type: text/html; charset=utf-8');
$type = $_POST['type'];//原本為mission
$num = $_POST['num'];
$num2 = (int)$num;
session_start();
	if($_SESSION['id'] != NULL)
	{	
		$loginname = $_SESSION['id'];
		$sql = "SELECT * FROM accept WHERE type = '$type' AND num = $num2 AND id = '$loginname'";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		if($row==NULL){
		$sql = "INSERT INTO accept(name,what,whereis,whenis,pay,who,num,type) SELECT name,what,whereis,whenis,pay,who,num,type FROM mission WHERE num=$num2 AND type='$type'";
		if(mysql_query($sql))
		echo'3';
		else
		echo '1';
		$sql = "UPDATE accept SET id = '$loginname' WHERE type = '$type' AND num = $num2";
		if(mysql_query($sql))
		echo '4';
		else
		echo '2';
		}
		else
			echo '5';
	}	
	else{
		echo '0';
	}

?>