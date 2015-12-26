<?php
header('Content-type: text/html; charset=utf-8');
include("connectoSQL.php");
session_start();
$id=$_SESSION["id"];
$type=$_POST["value"];
if($type=="accept")
{
    $sql = "SELECT num,type FROM $type WHERE id = '$id'";//取出此id接受的任務編號
    $result = mysql_query($sql);
	$emparray = array();
	while($row =mysql_fetch_row($result))
    {
		$sql = "SELECT * FROM mission WHERE num = $row[0] AND type = '$row[1]'";//搜尋此任務編號的內容
		$result2 = mysql_query($sql);
		while($row2 =mysql_fetch_assoc($result2))
		{$emparray[] = $row2;}
	}
    echo json_encode($emparray);//統一到message找留言
}
else if($type=="mymission")
{
    $sql = "SELECT *FROM mission WHERE who='$id'";
    $result = mysql_query($sql);
    $emparray = array();
    while($row=mysql_fetch_array($result)) 
    { 
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else 
{
    $sql = "SELECT *FROM mission WHERE type='$type' AND who!='$id'";
    $result = mysql_query($sql);
    $emparray = array();
    while($row=mysql_fetch_array($result)) 
    { 
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
/*if($_POST["value"]=="buy")
{
    $sql = "SELECT *FROM buy";
    $result = mysql_query($sql);
    $emparray = array();
    while($row=mysql_fetch_array($result)) 
    { 
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else if($_POST["value"]=="work")
{
    $sql = "SELECT *FROM work";
    $result = mysql_query($sql);
    $emparray = array();
    while($row=mysql_fetch_array($result)) 
    { 
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else if($_POST["value"]=="others")
{
    $sql = "SELECT *FROM others";
    $result = mysql_query($sql);
    $emparray = array();
    while($row=mysql_fetch_array($result)) 
    { 
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else{
    
}*/
?>
