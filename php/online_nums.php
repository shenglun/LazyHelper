<?php  
include ("connectoSQL.php");
mysql_query("SET NAMES UTF8"); 
$timeoutseconds = 300; //�s���ɶ��A�H��p��  
$online_time = time(); //�{�b�ɶ�  
$timeout = $online_time-$timeoutseconds; //�M���������ɶ��t�з�  

$check_select="SELECT `ip` FROM `online` WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'";  
$result1=mysql_query($check_select);  
$check_nums=mysql_num_rows($result1);  

if($check_nums < 1){ //���Ҧ^�ǬO�_����  
    $insert = "INSERT INTO `online`(`online_time`, `ip`) VALUES('$online_time','".$_SERVER['REMOTE_ADDR']."')";  
    $result2=mysql_query($insert);  
    if(!($result2)) {  
        echo "ERROR�G�y�k���楢�ѡA���ˬd�O�_�P��Ʈw�s���λy�k�O�_���~";  
    }  
}else{  
    //�����ūh��s�b�u�ɶ�  
    $update = "UPDATE `online` SET `online_time`='$online_time' WHERE `ip`='".$_SERVER['REMOTE_ADDR']."'";  
    $result2=mysql_query($update);  
    if(!($result2)) {  
        echo "ERROR�G�y�k���楢�ѡA���ˬd�O�_�P��Ʈw�s���λy�k�O�_���~";  
    }  
}  

$delete = "DELETE FROM `online` WHERE `online_time` < $timeout"; //�M���p��$timeout����  
$result3=mysql_query($delete);  
if(!($result3)) {  
    echo "ERROR�G�y�k���楢�ѡA���ˬd�O�_�P��Ʈw�s���λy�k�O�_���~";  
}  

$select = "SELECT count(`ip`) FROM `online`"; //�j�M�Ҧ��{�sip�A�έp�H��  
$result4=mysql_query($select);  
if(!($result4)) {  
    echo "ERROR�G�y�k���楢�ѡA���ˬd�O�_�P��Ʈw�s���λy�k�O�_���~";  
}  
while($row=mysql_fetch_array($result4)){  
    $user_nums=$row['count(`ip`)'];  
}  
mysql_close();  

echo("�ثe�W�u�H�ơG$user_nums �H");  
?>