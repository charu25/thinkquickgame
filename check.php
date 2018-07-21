<?php
include_once("config.lib.php");
if(isset($_POST["ans1"])){
$sql = "SELECT cell1 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell1']==0){$ans=mysql_real_escape_string($_POST["ans1"]);
if($ans=="fenrir greyback"){
$_SESSION['check1']=1;
$sql="UPDATE cell SET cell1='1'";
if(mysqli_query($con,$sql));
}
else{
$_SESSION['check1']=0;}}
echo $ans;
header("Location:t11.php");
exit;
}
if(isset($_POST["ans2"])){
$sql = "SELECT cell2 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell2']==0){$ans=mysql_real_escape_string($_POST["ans2"]);
if($ans=="noberta"){
$_SESSION['check2']=1;
$sql="UPDATE cell SET cell2='1'";
if(mysqli_query($con,$sql));
}
else{
$_SESSION['check2']=0;}}
header("Location:t12.php");
exit;
}
if(isset($_POST["ans31"])){
$sql = "SELECT cell3 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell3']==0){$ans1=mysql_real_escape_string($_POST["ans31"]);$ans2=mysql_real_escape_string($_POST["ans32"]);$ans3=mysql_real_escape_string($_POST["ans33"]);$ans4=mysql_real_escape_string($_POST["ans34"]);$ans5=mysql_real_escape_string($_POST["ans35"]);$ans6=mysql_real_escape_string($_POST["ans36"]);
if($ans1=="neville" && $ans2=="cho" && $ans3=="expelliarmus" && $ans4=="draco" && $ans5=="hermione" && $ans6=="impedimenta"){
$_SESSION['check3']=1;
$sql="UPDATE cell SET cell3='1'";
if(mysqli_query($con,$sql));
}
else{
$_SESSION['check3']=0;}}
header("Location:t13.php");
exit;}
if(isset($_POST["ans4"])){
$sql = "SELECT cell4 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell4']==0){$ans=mysql_real_escape_string($_POST["ans4"]);
if($ans=="baby"){
$_SESSION['check4']=1;
$sql="UPDATE cell SET cell4='1'";
if(mysqli_query($con,$sql));
}
else{
$_SESSION['check4']=0;}}
header("Location:t14.php");
exit;}
if(isset($_POST["ans5"])){
$sql = "SELECT cell5 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell5']==0){$ans=mysql_real_escape_string($_POST["ans5"]);
if($ans=="i only have porphyria"){
$_SESSION['check5']=1;
$sql="UPDATE cell SET cell5='1'";
if(mysqli_query($con,$sql));
}
else{
$_SESSION['check5']=0;}}
header("Location:t15.php");
exit;}
if(isset($_POST["ans6"])){
$sql = "SELECT cell6 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell6']==0){$ans=mysql_real_escape_string($_POST["ans6"]);
if($ans=="muses"){
$_SESSION['check6']=1;
$sql="UPDATE cell SET cell6='1'";
if(mysqli_query($con,$sql));
}
else{
$_SESSION['check6']=0;}}
header("Location:t16.php");
exit;}
if(isset($_POST["ans7"])){
$sql = "SELECT cell7 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell7']==0){$ans=mysql_real_escape_string($_POST["ans7"]);
if($ans=="shipwreck"){
$_SESSION['check7']=1;
$sql="UPDATE cell SET cell7='1'";
if(mysqli_query($con,$sql));
}
else{
$_SESSION['check7']=0;}}
header("Location:t17.php");
exit;}
if(isset($_POST["ans8"])){
$sql = "SELECT cell8 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell8']==0){$ans=mysql_real_escape_string($_POST["ans8"]);
if($ans=="dragonglass"){
$_SESSION['check8']=1;
$sql="UPDATE cell SET cell8='1'";
if(mysqli_query($con,$sql));
}
else{
$_SESSION['check8']=0;}}
header("Location:t18.php");
exit;}
?>