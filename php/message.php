<?php
include("connectoSQL.php");
$num = $_POST["num"];
$type = $_POST["types"];
$name = $_SESSION["id"];
$content = $_POST["content"];

    $sql = "INSERT INTO message(num,name,content,type) VALUES('$num','$name','$content','$type')";
    $result = mysql_query($sql);
    if($result)
	echo "";
	else
	echo "��";//�令�@�Ӹ�Ʈwmessage�s�d�� �d���|�stype,num�ӿ��ѬO���ӥ��Ȫ��d��
	
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
    echo "��";
}*/
?>