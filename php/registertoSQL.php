<?php
header('Content-type: text/html; charset=utf-8');
?>
<?php
include("connectoSQL.php");

$id = $_POST['id'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$FB = $_POST['FB'];
$sql = "SELECT name FROM test WHERE name = '$id'";
$check =  mysql_query($sql);
$row = mysql_fetch_array($check);
if($id!=NULL&&$password!=NULL&&$password2==$password)
{
    if($row[0]!=$id)
    {
        $sql = "INSERT INTO test(name,password,email,FB) VALUES('$id','$password','$email','$FB')";
        if(mysql_query($sql))
        {
            echo '1';
            
        }
        else
        {
            echo '4';
            
        }
    }
    else{
        echo '2';
    }
}
else
{
    echo '3';
}
?>