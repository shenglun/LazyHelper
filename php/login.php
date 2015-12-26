<?php
    session_start();
    header('Content-type: text/html; charset=utf-8');
    include("connectoSQL.php");
    $id = htmlspecialchars($_POST['id']);
    $password = htmlspecialchars($_POST['password']);   
    if ((!preg_match('/^[0-9a-z]+$/i',$id))||(!preg_match('/^[0-9a-z]+$/i',$password))){
      echo '3';
      exit; 
    }
    $sql = "SELECT name,password FROM test where name = '$id'";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);   
    if($id!=NULL&&$password!=NULL&&$row[0]==$id&&$row[1]==$password)
    {
        $_SESSION["id"] = $id;
        echo '1';
    }
    else
    {
        echo '0';        
    }
?>
