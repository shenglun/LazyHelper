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
		$sql = "INSERT INTO accept(id,num,type) VALUES('$loginname',$num2,'$type')";
		if(mysql_query($sql))
		{
		$sql = "SELECT acceptnum FROM mission WHERE type = '$type' AND num = $num2 ";
		$result=mysql_query($sql);
		$row=mysql_fetch_row($result);
		$row[0]=$row[0]+1;
		$sql = "UPDATE mission SET acceptnum = $row[0] WHERE type = '$type' AND num = $num2 ";
		if(mysql_query($sql))
		echo'3';
		else
		echo'7';
		}
		else
		echo '1';
		}
		else
			echo '5';
	}	
	else{
		echo '0';
	}

?>