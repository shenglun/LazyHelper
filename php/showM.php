<?php
header('Content-type: text/html; charset=utf-8');
include("connectoSQL.php");
session_start();
$id=$_SESSION["id"];
$mission=$_POST["value"];
if($mission=="accept")
{
    $sql = "SELECT * FROM $mission WHERE id = '$id'";
    $result = mysql_query($sql);    
    $emparray = array();
    while($row =mysql_fetch_array($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else 
{
    $sql = "SELECT *FROM mission WHERE type='$mission'";
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