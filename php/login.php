<?php
    session_start();
    header('Content-type: text/html; charset=utf-8');
    include("connectoSQL.php");
    $id = $_POST['id'];
    $password = $_POST['password'];   
    $sql = "SELECT name,password FROM test where name = '$id'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);   
    if($id!=NULL&&$password!=NULL&&$row[0]==$id&&$row[1]==$password)
    {
        $_SESSION["id"] = $id;
        $sql = "UPDATE online SET token=token+1 ";
        $result = mysql_query($sql);
        echo '1';
    }
    else
    {
        echo '0';        
    }
?>