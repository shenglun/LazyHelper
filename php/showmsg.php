<?php
include("connectoSQL.php");
$value = $_POST["value"];
$id=$_SESSION["id"];

if($value=='accept')
{  
    $sql = "SELECT num,type FROM $value WHERE id = '$id'";//取出此id接受的任務編號
    $result = mysql_query($sql);
    $emparray = array();
    while($row =mysql_fetch_row($result))
    {
		$sql = "SELECT * FROM message WHERE num = $row[0] AND type = '$row[1]'";//搜尋此任務編號的留言
		$result2 = mysql_query($sql);
		while($row2 =mysql_fetch_assoc($result2))
		{$emparray[] = $row2;}
    }
    echo json_encode($emparray);//統一到message找留言
}
else if($value=='mymission')
{  
    $sql = "SELECT num,type FROM mission WHERE who = '$id'";//取出此id接受的任務編號
    $result = mysql_query($sql);
    $emparray = array();
    while($row =mysql_fetch_row($result))
    {
		$sql = "SELECT * FROM message WHERE num = $row[0] AND type = '$row[1]'";//搜尋此任務編號的留言
		$result2 = mysql_query($sql);
		while($row2 =mysql_fetch_assoc($result2))
		{$emparray[] = $row2;}
    }
    echo json_encode($emparray);//統一到message找留言`
}
else
{
    $sql = "SELECT * FROM message WHERE type = '$value'";
    $result = mysql_query($sql);
    $emparray = array();
    while($row =mysql_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);//統一到message找留言
}
/*else if($value=="buy"){
    $sql = "SELECT * FROM buymessage";
    $result = mysql_query($sql);
    $emparray = array();
    while($row =mysql_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else if($value=="food"){
    $sql = "SELECT * FROM foodmessage";
    $result = mysql_query($sql);
    $emparray = array();
    while($row =mysql_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else if($value=="work"){
    $sql = "SELECT * FROM workmessage";
    $result = mysql_query($sql);
    $emparray = array();
    while($row =mysql_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else if($value=="others"){
    $sql = "SELECT * FROM othersmessage";
    $result = mysql_query($sql);
    $emparray = array();
    while($row =mysql_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else{}*/
?>
