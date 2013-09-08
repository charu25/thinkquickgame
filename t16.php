<!--Sirens-->
<html>
<?php
session_start();
if(!isset($_SESSION['check6'])){
$_SESSION['check6']=0;}
$con=mysqli_connect("localhost","root","","player");
$sql="UPDATE position SET x='6'";
if(mysqli_query($con,$sql));
$con=mysqli_connect("localhost","root","","player");
$sql="UPDATE position SET y='14'";
if(mysqli_query($con,$sql));
?>
<style>
body{
background-color:black;
}
img#w{
position:relative;
margin-top:-600px;
left:200px;
top:-314px;
}
img#f{
position:relative;
margin-top:-470px;
opacity:0.5;
left:200px;
}
p{
position:relative;
font-family:chiller,Helvetica,Ariel,sans-seriff;
left:400px;
margin-top:40px;
z-index:100;
color:red;
font-size:25px;
font-weight:15px;
}
img{
z-index:-10;
}
h3{
position:relative;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:35px;
text-align:left;
left:250px;
top:-1000px;
color:red;
width:400px;
}
#c{
visibility:hidden;
}
input{
border-radius:5px;
}
#siren{
position:relative;
left:200px;
top:-450px;
}
#ocean{
z-index:10;
opacity:0.5;
position:relative;
left:200px;
top:8px;
}
#back{
background-color:blue;
color:black;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:30px;
font-weight:20px;
width:100px;
height:40px;
border:0;
position:absolute;
top:2%;
z-index:10;
}
#clue
{font-weight:900;
 font-size:30px;
 font-color:green;
 background-position:right bottom;
 background-image:url(skybg.jpg);
 background-repeat:no-repeat;
 background-color:red;
 background-size:100% 100%;
 height:530px;
 width:800px;
 position:absolute;
 left:350px;
 top:80px;
 visibility:hidden;
}
</style>
<body>
<div id="clue" ><pre>
  USE THE FIRST LETTER OF EACH 
  SOLUTION TO GET THE ANSWER..
   <img src="rebuspuz1.png" alt="cipher"/><form name="form1" method="post" action="check.php">
  <input type="text" style="height:50px;width:300px;font-size:30px;" id="ans" name="ans6"/> <input type="submit" style="height:50px;width:200px;font-size:30px;" value="Submit" /></form>
  <input type="button" style="height:50px;width:200px;font-size:30px;left:70%;position:absolute;top:84%" value="Back" onclick="change()"/>
 </pre>
  </div>
<audio id="au1">
<source src="wolf1.wav" type="audio/wav">
</audio>
<audio id="au2">
<source src="wolf2.wav" type="audio/wav">
</audio>
<img id="ocean" src="ocean.gif" width="1000px" height="454px">
<img id="siren" src="siren4.jpg" width="1000px" height="454px">
<div>
<img id="w" src="wood.jpg" alt="wood" width="1000px" height="150px">
<img id="f" src="frame.jpg" alt="frame" width="1000px" height="150px">
</div>
<p  id="a" style="top:-480px;" >Tell me about sirens.</p>
<p  id="b" style="top:-520px;" >Can you give me some information about the thief?</p>
<p  id="c" style="top:-555px;" >Okay.</p>
<h3 id="msg"></h3>
<form action="fmaze2.php" method="post">
<input id="back" type="submit" value="back" name="back">
</form>
<script src="jquery.js">
</script>
<script type="text/javascript">
var ind=0,ctr=0,s,q;
				 var show=function(t,m,ind,i){
if(ind<m.length){
$(t).append(m[ind++]);
ctr=1;
}
else{if(i==0){
clearInterval(s);}
else{
clearInterval(q);}}
}
$( "#a" ).click(function(){
document.getElementById("clue").style.zIndex=200;
if(ctr==1){
clearInterval(q);
clearInterval(s);
ind=0;
ctr=0;}
/*var m=document.getElementById("au1");
m.autoplay=false;
m.load();
var m=document.getElementById("au2");
m.autoplay=true;
m.load();*/
document.getElementById("msg").innerHTML="";
s=setInterval(function(){show("#msg","A werewolf, also known as a lycanthrope, is a mythological or folkloric human with the ability to shapeshift into a wolf or an therianthropic hybrid wolf-like creature, either purposely or after being placed under a curse or affliction",ind++,0)},70);
});
$( "#b" ).click(function(){
document.getElementById("clue").style.zIndex=200;
if(ctr==1){
clearInterval(s);
clearInterval(q);
ind=0;
ctr=0;}
/*var m=document.getElementById("au2");
m.autoplay=false;
m.load();
var m=document.getElementById("au1");
m.autoplay=true;
m.load();*/
document.getElementById("msg").innerHTML="";
q=setInterval(function(){show("#msg","Distracting is my song.Use your head to move along.",ind++,1)},70);
document.getElementById("c").style.visibility="visible";
});
function check()
{var answer=document.getElementById("ans").value;
 if(answer=="fenrir greyback")
  alert("Right Answer!");
  
}
function change(){
document.getElementById("clue").style.visibility="hidden";
document.getElementById("clue").style.zIndex=-200;
}
$( "#c" ).click(function(){
var m=document.getElementById("au2");
m.autoplay=false;
m.load();
var m=document.getElementById("au1");
m.autoplay=false;
m.load();
if(ctr==1){
clearInterval(s);
clearInterval(q);
ind=0;
ctr=0;}
document.getElementById("msg").innerHTML="";
document.getElementById("clue").style.visibility="visible";
document.getElementById("clue").style.zIndex=200;
});
var chec="<?php echo $_SESSION['check6']; ?>";
if(chec=="1"){
alert("Clue obtained ! Added to inventory.");
}
</script>
</body>
</html>
