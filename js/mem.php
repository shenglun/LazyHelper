<?php
include ("connectoSQL.php");
header('Content-type: text/html; charset=utf-8');
session_start();
$timeoutseconds = 300; //存活時間，以秒計算  
$online_time = time(); //現在時間  
$timeout = $online_time-$timeoutseconds; //清除紀錄的時間差標準  

$check_select="SELECT `ip` FROM `online` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'";  
$result1=mysql_query($check_select);  
$check_nums=mysql_num_rows($result1);  

if($check_nums < 1){ //驗證回傳是否為空  
    $insert = "INSERT INTO `online`(`online_time`, `ip`) VALUES('$online_time','".$_SERVER['REMOTE_ADDR']."')";  
    $result2=mysql_query($insert);  
    if(!($result2)) {  
        echo "ERROR：語法執行失敗，請檢查是否與資料庫連結或語法是否錯誤";  
    }  
}else{  
    //不為空則更新在線時間  
    $update = "UPDATE `online` SET `online_time`='$online_time' WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'";  
    $result2=mysql_query($update);  
    if(!($result2)) {  
        echo "ERROR：語法執行失敗，請檢查是否與資料庫連結或語法是否錯誤";  
    }  
}  

$delete = "DELETE FROM `online` WHERE `online_time` < $timeout"; //清除小於$timeout的值  
$result3=mysql_query($delete);  
if(!($result3)) {  
    echo "ERROR：語法執行失敗，請檢查是否與資料庫連結或語法是否錯誤";  
}  

$select = "SELECT count(`ip`) FROM `online`"; //搜尋所有現存ip，統計人數  
$result4=mysql_query($select);  
if(!($result4)) {  
    echo "ERROR：語法執行失敗，請檢查是否與資料庫連結或語法是否錯誤";  
}  
while($row=mysql_fetch_array($result4)){  
    $user_nums=$row['count(`ip`)'];  
}  
mysql_close();  

  
if($_SESSION['id'] != NULL)
{
  
    $loginname = $_SESSION['id'];
   
        echo "
		<div class='ui grey massive label'>
		  hi! $loginname,welcome back!
		</div>
		<a class='item notice'>
		  <i class='announcement icon'></i> 
		  <div class='floating ui red label'></div>
		</a>
		<div class='ui notice popup'>
		   nothing
		</div>
		<input class='ui inverted button' type='button' id='logout' value='登出'>
        目前上線人數：$user_nums 人";

}
else{
    echo "<div class='ui form'>
			  <div class='fields'>
				<div class='field'>
				  <input id='id' placeholder='Username' type='text'>
				</div>
				<div class='field'>
				  <input id='password' type='password'>
				</div>
			  </div>
			</div>
			<input class='ui inverted button' type='button' id='login' value='登入'>
			<input class='ui register inverted button' type='button' id='register' value='註冊'>
             目前上線人數：$user_nums 人";
}
?>