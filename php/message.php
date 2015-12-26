<?php
include("connectoSQL.php");
$num = strip_tags($_POST["num"]);
$type =strip_tags( $_POST["types"]);
$name =strip_tags( $_SESSION["id"]);
$content = strip_tags($_POST["content"]);///**/
$num = htmlspecialchars($num);
$content = htmlspecialchars($content);
if(!preg_match('/^[0-9a-z]+$/i',$content)){
  echo'3';
  exit;
}
if($name!=NULL)
{
  $sql = "INSERT INTO message(num,name,content,type) VALUES('$num','$name','$content','$type')";///**/
$result = mysql_query($sql);
if($result)
  echo "";
else
  echo "錯";//改成一個資料庫message存留言 留言會存type,num來辨識是哪個任務的留言
}
else
  echo'1';
/*
else if($types=="food"){
    $sql = "INSERT INTO foodmessage(num,name,content) VALUES('$num','$name','$content')";
    $result = mysql_query($sql);
}
else if($types=="buy"){
    $sql = "INSERT INTO buymessage(num,name,content) VALUES('$num','$name','$content')";
    $result = mysql_query($sql);
    echo "";
}
else if($types=="work"){
    $sql = "INSERT INTO workmessage(num,name,content) VALUES('$num','$name','$content')";
    $result = mysql_query($sql);
    echo "";
}
else if ($types=="others"){
    $sql = "INSERT INTO othersmessage(num,name,content) VALUES('$num','$name','$content')";
    $result = mysql_query($sql);
    echo "";
}
else{
    echo "錯";
}*/
?>
