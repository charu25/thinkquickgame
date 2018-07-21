<html>
<?php
include_once("config.lib.php");
$s="";
$sql = "SELECT x from position";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
$_SESSION['x']=$c['x'];
$sql = "SELECT y from position";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
$_SESSION['y']=$c['y'];
$sql = "SELECT cell1 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell1']==1){
$s=$s."H";}
$sql = "SELECT cell2 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell2']==1){
$s=$s."I";
}
$sql = "SELECT cell3 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell3']==1){
$s=$s."T";}
$sql = "SELECT cell4 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell4']==1){
$s=$s."C";}
$sql = "SELECT cell5 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell5']==1){
$s=$s."H";}
$sql = "SELECT cell6 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell6']==1){
$s=$s."O";}
$sql = "SELECT cell7 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell7']==1){
$s=$s."C";}
$sql = "SELECT cell8 from cell";
$b=mysqli_query($con,$sql);
$c=mysqli_fetch_array($b);
if($c['cell8']==1){
$s=$s."K";}
?>
<head>
<title>maze</title>
<style>
#msg1,#msg2,#msg3,#msg4,#msg5,#msg6,#msg7,#msg8{
color:maroon;
font-family:chiller,Helvetica,Ariel,sans-seriff;
position:absolute;
font-size:80px;
text-align:center;
font-weight:300;
}
#msg1{
padding-left:20%;
top:13%;
}
#msg2{
padding-left:32%;
top:7%;
}
#msg8{
left:32%;
top:-3%;
}
#msg3,#msg4,#msg5,#msg6,#msg7{
top:10%;
left:32%;
}
#bcg1,#bcg2,#bcg3{
position:absolute;
top:0%;
}
#bcg5{
position:absolute;
top:1%;
left:20%;
}
#bcg6{
position:absolute;
top:3%;
left:20%;
}
#bcg4,#bcg7{
position:absolute;
top:5%;
left:5%;
}
#bcg8{
position:absolute;
top:0%;
left:0%;
}
body{
background-color:black;
}

div#floor {
 position : absolute;
 width : 100%;
 height : 100%;
 background-color:#221E1E;

 
}
p{
color:white;
font-family:chiller,Helvetica,Ariel,sans-seriff;}
div#ceiling {
 position : absolute;
 width : 100%;
 height : 50%;
 background-image:url('images/sky0.gif');
 background-color : rgb(96,96,96);
 background-repeat:no-repeat;
 background-size:100% 100%;
}


#screen {
 position : relative;
 width : 1000px;
 height : 800px;
 border : 1px solid black;
 overflow : hidden;
 margin-left:200px;
}
#pc1,#pc2,#pc3,#pc4,#pc5,#pc6,#pc8,#pc7{
visibility:hidden;
}
input{
width:150px;
height:50px;
position:absolute;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:35px;
background-color:maroon;
box-shadow:2px 2px 5px black;
color:black;
border:0;
}
#inventory
{font-weight:900;
 font-size:50px;
 font-color:red;
 background:color:transparent;
 background-position:center;
 background-image:url(images/scroll2.png);
 background-size:100% 100%;
 background-repeat:no-repeat;
 height:400px;
 width:800px;
 position:relative;
 left:100px;
 top:150px;
 z-index:-100;
 visibility:hidden; 
}
body {
        margin: 0px;
        padding: 0px;
      }
      #container {
	  position:relative;
	  top:-400px;
	  left:200px;
	  z-index:300px;
        background-color: transparent;
        display: inline-block;
        width: 1000px;
        height: 800px;
      }
#inventory1
{
 font-size:30px;
 color:white;
 background:color:transparent;
 background-position:center;
 background-image:url(images/scroll1.png);
 background-position:left bottom;
 background-size:50% 50%;
 background-repeat:no-repeat;
 height:100px;
 width:300px;
 position:relative;
 left:800px;
 top:290px;
 z-index:100; 
}
#inv{
font-size:20px;
font-weight:600;}
#ghost1{
visibility:hidden;
left:350px;
position:absolute;
top:250px;}
#ghost2,#ghost5{
visibility:hidden;
left:350px;
position:absolute;
top:280px;}
#ghost6{
visibility:hidden;
left:100px;
position:absolute;
top:60px;}
#ghost4{
visibility:hidden;
left:280px;
position:absolute;
top:100px;}
#ghost3{
visibility:hidden;
left:660px;
position:absolute;
top:470px;}
#score{
color:beige;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:40px;
position:absolute;
left:950px;
top:10px;}
#clap{
width:150px;
height:40px;
background-color:red;
position:absolute;
left:10px;
top:20px;
z-index:300;}
</style>

<script src="js/excanvas.js" type="text/javascript"></script>
<script src="js/jquery.js">
</script>
</head>
<body id="body">

<div id="screen">
<div id="floor"></div>
<div id="ceiling"></div><pre>
<div id="inventory"><input type="button" id="inv" style="position:relative;top:300px;left:650px;width:70px;height:30px;" value="BACK" onclick="makeinvisible()"/>

<p id="words">                   CODE OBTAINED:
                  </p></div></pre>
<div id="inventory1" onclick="makevisible()">INVENTORY</div>
<img id="ghost1" src="images/ghost.gif" alt="g" width="10" height="10">
<img id="ghost2" src="images/skeleton.gif" alt="s" width="260" height="260">
<img id="ghost3" src="images/bleedrose.gif" alt="s" width="250" height="200">
<img id="ghost4" src="images/bigeyes.gif" alt="s" width="10" height="10">
<img id="ghost5" src="images/bats.gif" alt="s" width="50" height="10">
<img id="ghost6" src="images/bats.gif" alt="s" width="50" height="10">
<input type="button" id="clap" onclick="clap()" value="Gimme a clap" name="Gimme a clap">
</div>
<div id="container"></div>
<p id="score">Target Hits:</p>
<div id="pc1" class="pc">
<audio id="audio" >
  <source src="sounds/howl.mp3" type="audio/mp3">
</audio>
<audio id="audio1" >
  <source src="sounds/clap1.mp3" type="audio/mp3">
</audio>
<audio id="audio2" >
  <source src="sounds/clap2.mp3" type="audio/mp3">
</audio>
<img id="bcg1" src="images/bw.jpg" alt="bck1" width="100px" height="100px">
<p id="msg1"></p>
<form name="form1" method="post" action="cells/t11.php">
<input type="submit" id="continue" style="top:80%;left:70%;" name="continue" value="continue"></form>
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</div>
<div id="pc2" class="pc">
<img id="bcg2" src="images/bw1.jpg" alt="bck2" width="100px" height="100px">
<p id="msg2"></p>
<form name="form2" method="post" action="cells/t12.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc3">
<img id="bcg3" src="images/dementor.jpg" alt="bck3" width="1400px" height="650px">
<p id="msg3"></p>
<form name="form3" method="post" action="cells/t13.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc4" class="pc">
<img id="bcg4" src="images/zombie1.jpg" alt="bck4" width="100px" height="100px">
<p id="msg4"></p>
<form name="form4" method="post" action="cells/t14.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc5" class="pc">
<img id="bcg5" src="images/dracula.gif" alt="bck5" width="100px" height="100px">
<p id="msg5"></p>
<form name="form5" method="post" action="cells/t15.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc6" class="pc">
<img id="bcg6" src="images/siren.jpg" alt="bck6" width="100px" height="100px">
<p id="msg6"></p>
<form name="form6" method="post" action="cells/t16.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc7" class="pc">
<img id="bcg7" src="images/beware.jpg" alt="bck7" width="100px" height="100px">
<p id="msg7"></p>
<form name="form7" method="post" action="cells/t17.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc8" class="pc">
<img id="bcg8" src="images/whitebcg.jpg" alt="bck8" width="100px" height="100px">
<p id="msg8"></p>
<form name="form8" method="post" action="cells/t18.php">
<input type="submit" id="continue" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<script>

var $ = function(id) { return document.getElementById(id); };
var dc = function(tag) { return document.createElement(tag); };

var map=[
    [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1],
	[1,0,0,0,0,4,0,0,0,0,0,0,0,0,0,0,0,1,2,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1],
	[1,0,0,0,0,4,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,1,0,1,0,0,1],
	[1,0,0,0,0,4,0,0,0,0,1,1,1,1,1,0,0,1,1,1,1,1,1,1,1,1,0,0,1,0,1,0,0,1],
	[1,0,0,0,0,4,0,0,0,0,0,0,0,0,1,0,0,1,0,0,0,0,0,0,0,1,0,0,1,0,1,0,0,1],
	[1,4,4,4,4,4,0,0,0,0,0,0,0,0,1,1,2,1,0,0,0,0,0,0,0,1,0,0,1,0,1,0,0,1],
	[1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,0,1,0,0,1,0,0,1,0,1,0,0,1],
	[1,1,1,0,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,0,0,1,0,0,0,0,1],
	[1,2,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,0,0,1,0,0,0,0,1],
	[1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,1,1,1],
	[1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,0,0,1,0,0,1,1,0,0,0,1],
	[1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,1,0,0,1,2,0,0,0,1],
	[1,0,0,1,1,1,0,0,0,0,0,0,1,1,1,0,0,1,0,0,0,1,1,1,1,1,0,0,1,1,1,0,0,1],
	[1,0,0,1,0,0,0,0,0,0,0,0,1,2,1,1,0,1,0,4,4,4,4,4,4,1,0,0,0,0,0,0,0,1],
	[1,0,0,1,0,0,1,1,1,1,0,0,1,0,0,1,0,1,0,4,0,0,0,0,0,1,1,1,1,1,1,0,0,1],
	[1,0,0,1,0,0,1,0,0,0,0,0,1,0,0,1,0,1,0,4,0,0,0,0,0,1,0,0,0,0,1,0,0,1],
	[1,0,0,1,0,0,1,0,0,0,0,0,1,0,0,1,0,1,0,4,0,0,0,0,0,1,0,0,0,0,1,0,0,1],
	[1,0,0,1,0,0,1,0,0,0,1,1,1,0,0,1,0,1,0,4,1,2,1,0,0,1,2,1,0,0,1,0,0,1],
	[1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,4,1,1,1,1,1,1,1,1,0,0,1,0,0,1],
	[1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1],
	[1,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,0,0,0,0,1,0,0,1],
	[1,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,1,0,0,0,0,1,0,0,1],
	[1,1,1,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,1,0,0,1],
	[1,2,1,1,0,0,1,2,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,0,0,1,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]
];
var a="<?php echo $_SESSION['x']; ?>";
var b="<?php echo $_SESSION['y']; ?>";
var player = {
	x : parseInt(a),			// current x, y position
	y : parseInt(b),
	dir : 0,		// the direction that the player is turning, either -1 for left or 1 for right.
	rot : 0,		// the current angle of rotation
	speed : 0,		// is the playing moving forward (speed = 1) or backwards (speed = -1).
	moveSpeed : 0.4,	// how far (in map units) does the player move each step/update
	rotSpeed : 7 * Math.PI / 180	// how much does the player rotate each step/update (in radians)
}

var mapWidth = 0;
var mapHeight = 0;

var miniMapScale = 8;

var screenWidth = 1000;
var screenHeight = 800;

var stripWidth = 2;
var fov = 60 * Math.PI / 180;

var numRays = Math.ceil(screenWidth / stripWidth);
var fovHalf = fov / 2;

var viewDist = (screenWidth/2) / Math.tan((fov / 2));
var twoPI = Math.PI * 2;

var numTextures = 4;
var aa=0,bb=0,cc=0,dd=0,ee=0,ff=0,gg=0,hh=0;
var a1=0,a2=0,a4=0,a5=0,a6=0,a7=0,a8=0,ct=0,z=0;
var target=0,incell=0;
function moveback(){

incell=0;
ct=0;
document.getElementById("screen").style.visibility="visible";
for(var i=1;i<9;i++){
document.getElementById("pc"+i).style.visibility="hidden";
document.getElementById("bcg"+i).width="100";
document.getElementById("bcg"+i).height="100";}
clearInterval(a1);
clearInterval(a2);
clearInterval(a4);
clearInterval(a5);
clearInterval(a6);
clearInterval(a8);
clearInterval(a7);
clearTimeout(aa);
clearTimeout(bb);
clearTimeout(cc);
clearTimeout(dd);
clearTimeout(ee);
clearTimeout(ff);
clearTimeout(gg);
clearTimeout(hh);
z=setInterval(function(){cell()},50);
}
z=setInterval(function(){cell()},50);
function cell(){
if(player.x>21 && player.x<22 && player.y>16 && player.y<17){incell=1;
window.location.replace("finalcell.php");
}
if(player.x>7 && player.x<8 && player.y>22 && player.y<23){blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);ct=1;incell=1;
clearInterval(z);
player.y-=1;
var m=document.getElementById("audio");
m.autoplay=true;
m.load();
document.getElementById("pc1").style.visibility="visible";
document.getElementById("screen").style.visibility="hidden";
 var show=function(t,m,ind,i){
if(ind<m.length){
jQuery(t).append(m[ind++]);
aa=setTimeout(function() {show(t,m,ind,i);},i);
}
}
jQuery(function(){
document.getElementById("msg1").innerHTML="";
show("#msg1","LAIR OF THE SHAPESHIFTERS",0,25);
});
a1=setInterval(function(){inc1()},90);
function inc1(){
document.getElementById("bcg1").height+=50;
document.getElementById("bcg1").width+=120;
if(document.getElementById("bcg1").height>=700){
clearInterval(a1);
}
}
}
if(player.x>13 && player.x<14 && player.y>14 && player.y<15){blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);ct=1;incell=1;
clearInterval(z);
player.y+=1;
var m=document.getElementById("audio");
m.autoplay=true;
m.load();
document.getElementById("pc2").style.visibility="visible";
document.getElementById("screen").style.visibility="hidden";
 var show=function(t,m,ind,i){
if(ind<m.length){
jQuery(t).append(m[ind++]);
bb=setTimeout(function() {show(t,m,ind,i);},i);
}
}
jQuery(function(){
document.getElementById("msg2").innerHTML="";
show("#msg2","FIREBREATHERS",0,25);
});
a2=setInterval(function(){inc2()},90);
function inc2(){
document.getElementById("bcg2").height+=50;
document.getElementById("bcg2").width+=130;
if(document.getElementById("bcg2").height>=600){
clearInterval(a2);
}
}
}
if(player.x>1 && player.x<2 && player.y>9 && player.y<10){blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);ct=1;incell=1;
player.y+=1;
document.getElementById("bcg3").src="images/dementor.jpg";
document.getElementById("bcg3").style.width="1400px";
document.getElementById("bcg3").style.height="650px";
clearInterval(z);
var m=document.getElementById("audio");
m.autoplay=true;
m.load();
document.getElementById("pc3").style.visibility="visible";
document.getElementById("screen").style.visibility="hidden";
 var show=function(t,m,ind,i){
if(ind<m.length){
jQuery(t).append(m[ind++]);
cc=setTimeout(function() {show(t,m,ind,i);},i);
}
}
jQuery(function(){
document.getElementById("msg3").innerHTML="";
show("#msg3","SOUL COLLECTORS",0,25);
});
setTimeout(function(){swap()},6000);
function swap(){
document.getElementById("bcg3").src="images/dementors.jpg";
}
}
if(player.x>1 && player.x<2 && player.y>24 && player.y<25){blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);ct=1;incell=1;
clearInterval(z);
player.y+=1;
var m=document.getElementById("audio");
m.autoplay=true;
m.load();
document.getElementById("pc4").style.visibility="visible";
document.getElementById("screen").style.visibility="hidden";
 var show=function(t,m,ind,i){
if(ind<m.length){
jQuery(t).append(m[ind++]);
dd=setTimeout(function() {show(t,m,ind,i);},i);
}
}
jQuery(function(){
document.getElementById("msg4").innerHTML="";
show("#msg4","WALKING DEAD",0,25);
});
a4=setInterval(function(){inc4()},90);
function inc4(){
document.getElementById("bcg4").height+=50;
document.getElementById("bcg4").width+=110;
if(document.getElementById("bcg4").height>=500){
clearInterval(a4);
}
}
}
if(player.x>16 && player.x<17 && player.y>4 && player.y<5){blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);ct=1;incell=1;
clearInterval(z);
player.y-=1;
var m=document.getElementById("audio");
m.autoplay=true;
m.load();
document.getElementById("pc5").style.visibility="visible";
document.getElementById("screen").style.visibility="hidden";
 var show=function(t,m,ind,i){
if(ind<m.length){
jQuery(t).append(m[ind++]);
ee=setTimeout(function() {show(t,m,ind,i);},i);
}
}
jQuery(function(){
document.getElementById("msg5").innerHTML="";
show("#msg5","HOUSE OF THE UNDEAD",0,25);
});
a5=setInterval(function(){inc5()},90);
function inc5(){
document.getElementById("bcg5").height+=50;
document.getElementById("bcg5").width+=110;
if(document.getElementById("bcg5").height>=500){
clearInterval(a5);
}
}
}
if(player.x>30 && player.x<31 && player.y>11 && player.y<12){blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);ct=1;incell=1;
clearInterval(z);
player.x+=1;
var m=document.getElementById("audio");
m.autoplay=true;
m.load();
document.getElementById("pc6").style.visibility="visible";
document.getElementById("screen").style.visibility="hidden";
 var show=function(t,m,ind,i){
if(ind<m.length){
jQuery(t).append(m[ind++]);
ff=setTimeout(function() {show(t,m,ind,i);},i);
}
}
jQuery(function(){
document.getElementById("msg6").innerHTML="";
show("#msg6","SONG OF DEATH",0,25);
});
a6=setInterval(function(){inc6()},90);
function inc6(){
document.getElementById("bcg6").height+=50;
document.getElementById("bcg6").width+=100;
if(document.getElementById("bcg6").height>=500){
clearInterval(a6);
}
}
}
if(player.x>26 && player.x<27 && player.y>16 && player.y<17){blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);ct=1;incell=1;
clearInterval(z);
player.y-=1;
var m=document.getElementById("audio");
m.autoplay=true;
m.load();
document.getElementById("pc7").style.visibility="visible";
document.getElementById("screen").style.visibility="hidden";
 var show=function(t,m,ind,i){
if(ind<m.length){
jQuery(t).append(m[ind++]);
hh=setTimeout(function() {show(t,m,ind,i);},i);
}
}
jQuery(function(){
document.getElementById("msg7").innerHTML="";
show("#msg7","AN OMEN OF ILL LUCK",0,25);
});
a7=setInterval(function(){inc7()},90);
function inc7(){
document.getElementById("bcg7").height+=50;
document.getElementById("bcg7").width+=100;
if(document.getElementById("bcg7").height>=500){
clearInterval(a7);
}
}
}
if(player.x>19 && player.x<20 && player.y>1 && player.y<2){blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);ct=1;incell=1;
clearInterval(z);
player.x+=1;
var m=document.getElementById("audio");
m.autoplay=true;
m.load();
document.getElementById("pc8").style.visibility="visible";
document.getElementById("screen").style.visibility="hidden";
 var show=function(t,m,ind,i){
if(ind<m.length){
jQuery(t).append(m[ind++]);
gg=setTimeout(function() {show(t,m,ind,i);},i);
}
}
jQuery(function(){
document.getElementById("msg8").innerHTML="";
show("#msg8","WINTER IS COMING",0,25);
});
a8=setInterval(function(){inc8()},90);
function inc8(){
document.getElementById("bcg8").height+=50;
document.getElementById("bcg8").width+=120;
if(document.getElementById("bcg8").height>=650){
clearInterval(a8);
}
}
}
}
function clap(){
var a=-1;
var b=[7,13,1,1,16,30,26,19];
var c=[22,14,9,24,4,11,16,1];
for(var i=0;i<7;i++){
if(b[i]>(player.x-3) && b[i]<(player.x+3)){
if(c[i]>(player.y-3) && c[i]<(player.y+3)){a=0;var m=document.getElementById("audio2");
m.autoplay=true;
m.load();var m=document.getElementById("audio3");
m.autoplay=false;
m.load();break;}}}
if(a==-1){
for(var i=0;i<7;i++){
if(b[i]>(player.x-5) && b[i]<(player.x+5)){
if(c[i]>(player.y-5) && c[i]<(player.y+5)){var m=document.getElementById("audio1");
m.autoplay=true;
m.load();var m=document.getElementById("audio3");
m.autoplay=false;
m.load();break;}}}}
var m=document.getElementById("audio3");
m.autoplay=true;
m.load();
}
function init() {

	mapWidth = map[0].length;
	mapHeight = map.length;

	bindKeys();

	initScreen();

	gameCycle();
}

var screenStrips = [];

function initScreen() {

	var screen = $("screen");

	for (var i=0;i<screenWidth;i+=stripWidth) {
		var strip = dc("div");
		strip.style.position = "absolute";
		strip.style.left = i + "px";
		strip.style.width = stripWidth+"px";
		strip.style.height = "0px";
		strip.style.overflow = "hidden";

		strip.style.backgroundColor = "transparent";

		var img = new Image();
		img.src = (window.opera ? "images/walls_19color.png" : "images/wall.png");
		img.style.position = "absolute";
		img.style.left = "0px";

		strip.appendChild(img);
		strip.img = img;	// assign the image to a property on the strip element so we have easy access to the image later

		screenStrips.push(strip);
		screen.appendChild(strip);
	}

}

// bind keyboard events to game functions (movement, etc)
var track=0;
function bindKeys() {

	document.onkeydown = function(e) {
		e = e || window.event;
        e.preventDefault();
		switch (e.keyCode) { // which key was pressed?

			case 38: // up, move player forward, ie. increase speed
				player.speed = .5;
				if(track==1){
				player.speed = 1.5;
				}
				break;
				
		     case 82: // up, move player forward, ie. increase speed
				player.speed = 1.5;
				track=1;
				break;

			case 40: // down, move player backward, set negative speed
				player.speed = -.5;
				if(track==1){
				player.speed = -1.5;
				}
				break;

			case 37: // left, rotate player left
				player.dir = -.5;
				break;

			case 39: // right, rotate player right
				player.dir = .5;
				break;
		}
	}

	document.onkeyup = function(e) {
		e = e || window.event;
          
		switch (e.keyCode) {
			case 38:
			case 40:
			if(track==0){
				player.speed = 0;	}// stop the player movement when up/down key is released
				break;
				case 82:
				  player.speed = 0;	// stop the player movement when up/down key is released
				  track=0;
				break;
			case 37:
			case 39:
				player.dir = 0;
				break;
		}
	}
}

function gameCycle() {

	move();


	castRays();

	setTimeout(gameCycle,1000/30); // aim for 30 FPS
}


function castRays() {

	var stripIdx = 0;

	for (var i=0;i<numRays;i++) {
		// where on the screen does ray go through?
		var rayScreenPos = (-numRays/2 + i) * stripWidth;

		// the distance from the viewer to the point on the screen, simply Pythagoras.
		var rayViewDist = Math.sqrt(rayScreenPos*rayScreenPos + viewDist*viewDist);

		// the angle of the ray, relative to the viewing direction.
		// right triangle: a = sin(A) * c
		var rayAngle = Math.asin(rayScreenPos / rayViewDist);

		castSingleRay(
			player.rot + rayAngle, 	// add the players viewing direction to get the angle in world space
			stripIdx++
		);
	}
}

function castSingleRay(rayAngle, stripIdx) {

	// first make sure the angle is between 0 and 360 degrees
	rayAngle %= twoPI;
	if (rayAngle < 0) rayAngle += twoPI;

	// moving right/left? up/down? Determined by which quadrant the angle is in.
	var right = (rayAngle > twoPI * 0.75 || rayAngle < twoPI * 0.25);
	var up = (rayAngle < 0 || rayAngle > Math.PI);

	var wallType = 0;

	// only do these once
	var angleSin = Math.sin(rayAngle);
	var angleCos = Math.cos(rayAngle);

	var dist = 0;	// the distance to the block we hit
	var xHit = 0; 	// the x and y coord of where the ray hit the block
	var yHit = 0;

	var textureX;	// the x-coord on the texture of the block, ie. what part of the texture are we going to render
	var wallX;	// the (x,y) map coords of the block
	var wallY;

	var wallIsHorizontal = false;

	// first check against the vertical map/wall lines
	// we do this by moving to the right or left edge of the block we're standing in
	// and then moving in 1 map unit steps horizontally. The amount we have to move vertically
	// is determined by the slope of the ray, which is simply defined as sin(angle) / cos(angle).

	var slope = angleSin / angleCos; 	// the slope of the straight line made by the ray
	var dXVer = right ? 1 : -1; 	// we move either 1 map unit to the left or right
	var dYVer = dXVer * slope; 	// how much to move up or down

	var x = right ? Math.ceil(player.x) : Math.floor(player.x);	// starting horizontal position, at one of the edges of the current map block
	var y = player.y + (x - player.x) * slope;			// starting vertical position. We add the small horizontal step we just made, multiplied by the slope.

	while (x >= 0 && x < mapWidth && y >= 0 && y < mapHeight) {
		var wallX = Math.floor(x + (right ? 0 : -1));
		var wallY = Math.floor(y);

		// is this point inside a wall block?
		if (map[wallY][wallX] > 0) {
			var distX = x - player.x;
			var distY = y - player.y;
			dist = distX*distX + distY*distY;	// the distance from the player to this point, squared.

			wallType = map[wallY][wallX]; // we'll remember the type of wall we hit for later
			textureX = y % 1;	// where exactly are we on the wall? textureX is the x coordinate on the texture that we'll use later when texturing the wall.
			if (!right) textureX = 1 - textureX; // if we're looking to the left side of the map, the texture should be reversed

			xHit = x;	// save the coordinates of the hit. We only really use these to draw the rays on minimap.
			yHit = y;

			wallIsHorizontal = true;

			break;
		}
		x += dXVer;
		y += dYVer;
	}



	// now check against horizontal lines. It's basically the same, just "turned around".
	// the only difference here is that once we hit a map block, 
	// we check if there we also found one in the earlier, vertical run. We'll know that if dist != 0.
	// If so, we only register this hit if this distance is smaller.

	var slope = angleCos / angleSin;
	var dYHor = up ? -1 : 1;
	var dXHor = dYHor * slope;
	var y = up ? Math.floor(player.y) : Math.ceil(player.y);
	var x = player.x + (y - player.y) * slope;

	while (x >= 0 && x < mapWidth && y >= 0 && y < mapHeight) {
		var wallY = Math.floor(y + (up ? -1 : 0));
		var wallX = Math.floor(x);
		if (map[wallY][wallX] > 0) {
			var distX = x - player.x;
			var distY = y - player.y;
			var blockDist = distX*distX + distY*distY;
			if (!dist || blockDist < dist) {
				dist = blockDist;
				xHit = x;
				yHit = y;

				wallType = map[wallY][wallX];
				textureX = x % 1;
				if (up) textureX = 1 - textureX;
			}
			break;
		}
		x += dXHor;
		y += dYHor;
	}

	if (dist) {
		//drawRay(xHit, yHit);

		var strip = screenStrips[stripIdx];

		dist = Math.sqrt(dist);

		// use perpendicular distance to adjust for fish eye
		// distorted_dist = correct_dist / cos(relative_angle_of_ray)
		dist = dist * Math.cos(player.rot - rayAngle);

		// now calc the position, height and width of the wall strip

		// "real" wall height in the game world is 1 unit, the distance from the player to the screen is viewDist,
		// thus the height on the screen is equal to wall_height_real * viewDist / dist

		var height = Math.round(viewDist / dist);
		// width is the same, but we have to stretch the texture to a factor of stripWidth to make it fill the strip correctly
		var width = height * stripWidth;

		// top placement is easy since everything is centered on the x-axis, so we simply move
		// it half way down the screen and then half the wall height back up.
		var top = Math.round((screenHeight - height) / 2);
		strip.style.height = height+"px";
		strip.style.top = top+"px";

		strip.img.style.height = Math.floor(height * numTextures) + "px";
		strip.img.style.width = Math.floor(width*2) +"px";
		strip.img.style.top = -Math.floor(height * (wallType-1)) + "px";

		var texX = Math.round(textureX*width);

		if (texX > width - stripWidth)
			texX = width - stripWidth;

		strip.img.style.left = -texX + "px";

	}

}


function move() {
	var moveStep = player.speed * player.moveSpeed;	// player will move this far along the current direction vector

	player.rot += player.dir * player.rotSpeed; // add rotation if player is rotating (player.dir != 0)

	// make sure the angle is between 0 and 360 degrees
	//while (player.rot < 0) player.rot += twoPI;
	//while (player.rot >= twoPI) player.rot -= twoPI;

	var newX = player.x + Math.cos(player.rot) * moveStep;	// calculate new player position with simple trigonometry
	var newY = player.y + Math.sin(player.rot) * moveStep;

	if (isBlocking(newX, newY)) {	// are we allowed to move to the new position?
		return; // no, bail out.
	}

	player.x = newX; // set new position
	player.y = newY;
}

function isBlocking(x,y) {

	// first make sure that we cannot move outside the boundaries of the level
	if (y < 0 || y >= mapHeight || x < 0 || x >= mapWidth)
		return true;

	// return true if the map block is not 0, ie. if there is a blocking wall.
	return (map[Math.floor(y)][Math.floor(x)] != 0 && map[Math.floor(y)][Math.floor(x)] != 4); 
}


setTimeout(init, 1);
function makevisible()
{document.getElementById("inventory").style.visibility="visible";
 document.getElementById("inventory").style.zIndex=200;
 document.getElementById("words").innerHTML+="<?php echo $s ;?>";
}
function makeinvisible()
{document.getElementById("inventory").style.visibility="hidden";
 document.getElementById("inventory").style.zIndex=-200;
}

</script>
    <script src="js/kinetic.js"></script>
    <script>
       var anim=0,flag=0,i=0,mv;
	var blob;
      var stage = new Kinetic.Stage({
        container: 'container',
        width: 1000,
        height: 800
      });
	  var layer = new Kinetic.Layer();
      var animations = {
        idle0: [{
          x: 2,
          y: 2,
          width: 70,
          height: 119
        }, {
          x: 71,
          y: 2,
          width: 74,
          height: 119
        }, {
          x: 146,
          y: 2,
          width: 81,
          height: 119
        }, {
          x: 226,
          y: 2,
          width: 76,
          height: 119
        }],
		 punch0: [{
          x: 2,
          y: 138,
          width: 74,
          height: 122
        }, {
          x: 76,
          y: 138,
          width: 84,
          height: 122
        }, {
          x: 346,
          y: 138,
          width: 120,
          height: 122
        }],
		idle1: [{
          x: 6,
          y: 7,
          width: 100,
          height: 96
        }, {
          x: 116,
          y: 10,
          width: 98,
          height: 96
        }, {
          x: 220,
          y: 11,
          width: 100,
          height: 96
        }, {
          x: 327,
          y: 15,
          width: 127,
          height: 93
        },{
          x: 125,
          y: 252,
          width: 131,
          height: 96
        },{
          x: 263,
          y: 253,
          width: 163,
          height: 96
        },{
          x: 740,
          y: 251,
          width: 131,
          height: 96
        }],
		punch1:[{
		x: 5,
          y: 368,
          width: 92,
          height: 98
		  },{
		x: 110,
          y: 410,
          width: 164,
          height: 71
		  }],
		
      };var blobmove=0;
	  setInterval(function(){
	  if(anim==0 && incell==0){clearInterval(blobmove);
	  i=Math.floor(Math.random()*2);
      var imageObj = new Image();
      imageObj.onload = function() {
        blob = new Kinetic.Sprite({
          x: 0,
          y: 40,
          image: imageObj,
          animation: 'idle'+i,
          animations: animations,
          frameRate: 7,
          index: 0
        });
        layer.add(blob);
		flag=1;
        stage.add(layer);
        blob.start();
		anim=1;
		};
		switch(i){
		case 0:imageObj.src = 'images/blob2.png';blobw=20;document.getElementById("container").style.top=-400;mv=150;break;
		case 1:imageObj.src = 'images/snake2.png';blobw=20;document.getElementById("container").style.top=-800;mv=250;break;}}
	  if(flag==1){clearInterval(blobmove);
blobmove=setInterval(function(){move1()},mv);
var count=0;
function move1(){
blob.setX(blob.getX()+10);
if(blob.getX()==1000 || count==5 || incell==1){
blob.stop();
anim=0;
blob.remove();
layer.remove();
clearInterval(blobmove);
}
if(i==1){
blob.setY(blob.getY()+5);}
document.onclick=function(evt) {
    evt = (evt || event);
    if(evt.clientX>(blob.getX()+200-blobw) && evt.clientX<(blob.getX()+200+blobw)){
	count++;
	target++;
	document.getElementById("score").innerHTML="TargetHits:"+target;
	blob.setAnimation('punch'+i);
          var fr;
		  if(i==0){fr=2;}
		  else{fr=1;}
          blob.afterFrame(fr, function() {
            blob.setAnimation('idle'+i);
          });
}
}}
flag=0;}
},12000);
	  var change=30,change1=50,change2=30,ganim=0,g,j;
	  setInterval(function(){
	  if(ganim==0 && incell==0){
	  j=Math.floor(Math.random()*5+1);
	  if(j==1){
	ghost= setInterval(function(){
	g=document.getElementById("ghost1");
	  g.style.visibility="visible";
	  g.style.zIndex=700;
	  g.height+=change;
	  g.width+=change;
	  if(g.height>=550){
	  change=-30;}
	  if(g.height==10 && change==-30){
	  change=30;
	  g.style.visibility="hidden";
	  g.style.zIndex=-100;
	  g.style.top=250;
	  g.style.left=350;
	  g.height=10;
	  g.width=10;
	  ganim=0;
	  clearInterval(ghost);
	  }
	  },200);ganim=1;}
	  if(j==2){
	g=document.getElementById("ghost2");
	  g.style.visibility="visible";
	  g.style.zIndex=700;ganim=1;}
	  if(j==4){
	  ghost= setInterval(function(){
	g=document.getElementById("ghost4");
	  g.style.visibility="visible";
	  g.style.zIndex=700;
	  g.height+=change1;
	  g.width+=change1;
	  if(g.height>=500){
	  change1=-50;}
	  if(g.height==10 && change1==-50){
	  change1=50;
	  g.style.visibility="hidden";
	  g.style.zIndex=-100;
	  g.height=10;
	  g.width=10;
	  ganim=0;
	  clearInterval(ghost);
	  }
	  },200);ganim=1;}
	  if(j==3){
	  g=document.getElementById("ghost3");
	  g.style.visibility="visible";
	  g.style.zIndex=700;ganim=1;}
	  if(j==5){ghost= setInterval(function(){var g1;
	g=document.getElementById("ghost5");
	  g.style.visibility="visible";
	  g.style.zIndex=700;
	  g.height+=30;
	  g.width+=30;
	  g1=document.getElementById("ghost6");
	  g1.style.visibility="visible";
	  g1.style.zIndex=700;
	  g1.height+=30;
	  g1.width+=30;
	  if(g.height>=650){
	  g.style.visibility="hidden";
	  g.style.zIndex=-100;
	  g.height=10;
	  g.width=50;
	  g1.style.visibility="hidden";
	  g1.style.zIndex=-100;
	  g1.height=10;
	  g1.width=50;
	  ganim=0;
	  clearInterval(ghost);
	  }
	  },200);ganim=1;}
	 
	  }
	  else if((j==2 || j==3)&& ganim==1){
	  g.style.visibility="hidden";
	  g.style.zIndex=-100;ganim=0;}
	 },10000);
    </script>
<audio id="audio3" autoplay="autoplay" loop="loop">
  
  <source src="sounds/conjuring.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>

</body>
</html>