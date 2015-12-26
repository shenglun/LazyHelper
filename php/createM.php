<?php
header('Content-type: text/html; charset=utf-8');
include("connectoSQL.php");
$type = strip_tags($_POST["type"]);
$name =strip_tags( $_POST["name"]);///**/
$what =strip_tags($_POST["what"]);///**/
$whereis =strip_tags( $_POST["whereis"]);///**/
$whenis =strip_tags( $_POST["whenis"]);///**/
$pay =strip_tags( $_POST["pay"]);///**/
$id=strip_tags($_SESSION["id"]);///**/
$name = htmlspecialchars($name);
$what = htmlspecialchars($what);
$whereis = htmlspecialchars($whereis);
$whenis = htmlspecialchars($whenis);
$pay = htmlspecialchars($pay);
if (!preg_match('/^[0-9a-z]+$/i',$name)||(!preg_match('/^[0-9a-z]+$/i',$what))||(!preg_match('/^[0-9a-z]+$/i',$whereis))||(!preg_match('/^[0-9a-z]+$/i',$whenis))||(!preg_match('/^[0-9a-z]+$/i',$pay))){
  echo '3';
  exit;
}
if($id==NULL)
{
  echo'0';
}
else{
  if($name!=NULL&&$what!=NULL&&$whereis!=NULL&&$whenis!=NULL&&$pay!=NULL){
    if($type!=NULL)
    {	
      $sql = "SELECT *FROM mission ORDER BY num DESC";///**/
$result=mysql_query($sql);
$row=mysql_fetch_row($result);
$num=$row[0];
if($num==NULL)
{$num=0;}
else{
  $num=$num+1;
}
$sql = "INSERT INTO mission(name,what,whereis,whenis,pay,who,num,type) VALUES('$name','$what','$whereis','$whenis','$pay','$id',$num,'$type')";///**/
if(mysql_query($sql))
{
  echo  '新增成功!';
}
else
{
  echo '新增失敗!';
}
    }
		/*else if($mission=="food")
		{
			$sql = "INSERT INTO food(name,what,whereis,whenis,pay,who) VALUES('$name','$what','$whereis','$whenis','$pay','$id')";
			if(mysql_query($sql))
			{
				echo  '新增成功!';
			}
			else
			{
				echo '新增失敗!';
			}
		}
		else if($mission=="buy")
		{
			$sql = "INSERT INTO buy(name,what,whereis,whenis,pay,who) VALUES('$name','$what','$whereis','$whenis','$pay','$id')";
			if(mysql_query($sql))
			{
				echo  '新增成功!';
			}
			else
			{
				echo '新增失敗!';
			}
		}
		else if($mission=="work")
		{
			$sql = "INSERT INTO work(name,what,whereis,whenis,pay,who) VALUES('$name','$what','$whereis','$whenis','$pay','$id')";
			if(mysql_query($sql))
			{
				echo  '新增成功!';
			}
			else
			{
				echo '新增失敗!';
			}
		}
		else if($mission=="others")
		{
			$sql = "INSERT INTO others(name,what,whereis,whenis,pay,who) VALUES('$name','$what','$whereis','$whenis','$pay','$id')";
			if(mysql_query($sql))
			{
				echo  '新增成功!';
			}
			else
			{
				echo '新增失敗!';
			}
		}*/
    else
    {
      echo '1';
    }
  }
  else
  {echo'1';}
}
?>
