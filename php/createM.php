<?php
header('Content-type: text/html; charset=utf-8');
include("connectoSQL.php");
$type = $_POST["type"];//原本是mission
$name = $_POST["name"];
$what = $_POST["what"];
$whereis = $_POST["whereis"];
$whenis = $_POST["whenis"];
$pay = $_POST["pay"];
$id=$_SESSION["id"];
if($id==NULL)
	{
	echo'0';
	}
else{
	if($name!=NULL&&$what!=NULL&&$whereis!=NULL&&$whenis!=NULL&&$pay!=NULL){
		if($type!=NULL)
		{	
			$sql = "SELECT *FROM mission ORDER BY num DESC";
			$result=mysql_query($sql);
			$row=mysql_fetch_row($result);
			$num=$row[0];
			if($num==NULL)
			{$num=0;}
			else{
			$num=$num+1;
			}
			$sql = "INSERT INTO mission(name,what,whereis,whenis,pay,who,num,type) VALUES('$name','$what','$whereis','$whenis','$pay','$id',$num,'$type')";
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