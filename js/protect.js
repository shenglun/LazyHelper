var alarm=false;
var totalert = new Array("<",">",",",".","!");
var check//傳到後端檢查
var ch;
function check(str)
{
for (var i=0;i<totalert.length;i++){
for (var j=0;j<str.length;i++){
ch = str.substr(j,1);
if(ch==totalert[i]){
alarm=true;
}
}}
if(alarm){
check=1
}//有怪字元的話 後端收到1
else{
check=0
}
