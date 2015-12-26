<?php
header('Content-type: text/html; charset=utf-8');
?>
<?php
include("connectoSQL.php");
$output_dir = "/upload";
$id =strip_tags($_POST['id']);/*//*/
$password =strip_tags( $_POST['password']);
$password2 =strip_tags( $_POST['password2']);
$email =strip_tags( $_POST['email']);
$FB =strip_tags( $_POST['FB']);
if((!preg_match('/^[0-9a-z]+$/i',$id))||(!preg_match('/^[0-9a-z]+$/i',$password))||(!preg_match('/^[0-9a-z]+$/i',$password2))||(!preg_match('/^[0-9a-z]+$/i',$email))||(!preg_match('/^[0-9a-z]+$/i',$FB)))
{
  echo '請勿輸入特殊字元';
  exit;
}
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
	   move_uploaded_file($_FILES["head"]["tmp_name"],$output_dir/$_FILES['head']['name']);
            echo '成功註冊';//1 資安期間先不用AJAX
        }
        else
        {
            echo '失敗';//4
        }
    }
    else{
        echo '有人註冊過';//2
    }
}
else
{
    echo '不得為空';//3
}
?>
