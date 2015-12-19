<?php  
include ("connectoSQL.php");
mysql_query("SET NAMES UTF8"); 
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

echo("目前上線人數：$user_nums 人");  
?>