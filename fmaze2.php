<html>
<?php
session_start();
$s="";
$con=mysqli_connect("localhost","root","","player");
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
 background-url : black;

 
}
p{
color:white;
font-family:chiller,Helvetica,Ariel,sans-seriff;}
div#ceiling {
 position : absolute;
 width : 100%;
 height : 50%;
 background-image:url('sky2.jpg');
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
 background-image:url(scroll2.png);
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
#inventory1
{
 font-size:30px;
 color:white;
 background:color:transparent;
 background-position:center;
 background-image:url(scroll1.png);
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
</style>

<script src="excanvas.js" type="text/javascript"></script>
<script src="jquery.js">
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
</div>
<div id="pc1" class="pc">
<audio id="audio" >
  <source src="howl.mp3" type="audio/mp3">
</audio>
<img id="bcg1" src="bw.jpg" alt="bck1" width="100px" height="100px">
<p id="msg1"></p>
<form name="form1" method="post" action="t11.php">
<input type="submit" id="continue" style="top:80%;left:70%;" name="continue" value="continue"></form>
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</div>
<div id="pc2" class="pc">
<img id="bcg2" src="bw1.jpg" alt="bck2" width="100px" height="100px">
<p id="msg2"></p>
<form name="form2" method="post" action="t12.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc3" class="pc">
<img id="bcg3" src="dementor.jpg" alt="bck3" width="1400px" height="650px">
<p id="msg3"></p>
<form name="form3" method="post" action="t13.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc4" class="pc">
<img id="bcg4" src="zombie1.jpg" alt="bck4" width="100px" height="100px">
<p id="msg4"></p>
<form name="form4" method="post" action="t14.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc5" class="pc">
<img id="bcg5" src="dracula.gif" alt="bck5" width="100px" height="100px">
<p id="msg5"></p>
<form name="form5" method="post" action="t15.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc6" class="pc">
<img id="bcg6" src="siren.jpg" alt="bck6" width="100px" height="100px">
<p id="msg6"></p>
<form name="form6" method="post" action="t16.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc7" class="pc">
<img id="bcg7" src="beware.jpg" alt="bck7" width="100px" height="100px">
<p id="msg7"></p>
<form name="form7" method="post" action="t17.php">
<input type="submit" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<div id="pc8" class="pc">
<img id="bcg8" src="whitebcg.jpg" alt="bck8" width="100px" height="100px">
<p id="msg8"></p>
<form name="form8" method="post" action="t18.php">
<input type="submit" id="continue" style="top:80%;left:70%;" name="continue" value="continue">
<input type="button" style="top:80%;left:85%;" name="back" value="back" onclick="moveback()">
</form>
</div>
<script>

var $ = function(id) { return document.getElementById(id); };
var dc = function(tag) { return document.createElement(tag); };

var map = [
	[1,2,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,2,1,1],
	[1,4,1,3,4,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,3,0,1,1],
	[1,0,0,3,4,0,0,0,0,0,0,0,0,1,1,0,0,1,1,0,0,0,0,0,0,1,4,0,3,0,0,1],
	[1,0,0,3,4,0,0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,3,0,0,1],
	[1,0,0,3,4,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,0,0,1],
	[1,0,0,3,4,0,0,0,0,0,0,1,0,3,3,3,3,3,3,0,0,0,0,0,0,0,0,0,3,0,0,1],
	[1,0,0,0,4,0,0,0,0,0,0,1,3,1,1,1,2,1,1,3,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,0,0,0,4,0,0,0,0,0,0,1,3,0,0,0,0,0,0,3,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,0,0,0,4,0,1,0,0,1,0,0,3,3,0,0,0,0,3,3,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,0,0,0,0,0,1,0,0,1,0,0,0,3,3,0,0,3,3,0,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,0,0,0,0,0,1,0,0,1,0,0,0,0,3,0,0,3,0,0,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,0,0,0,0,0,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1],
	[1,0,0,3,4,0,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,0,0,1],
	[1,0,0,3,0,0,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,0,0,1],
	[1,0,0,3,0,0,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,0,0,1],
	[1,0,0,3,1,1,1,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,0,0,1],
	[1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,0,1,1],
	[1,2,1,1,1,1,2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,1,2,1,1]
];
var a="<?php echo $_SESSION['x']; ?>";
var b="<?php echo $_SESSION['y']; ?>";
var player = {
	x : parseInt(a),			// current x, y position
	y : parseInt(b),
	dir : 0,		// the direction that the player is turning, either -1 for left or 1 for right.
	rot : 0,		// the current angle of rotation
	speed : 0,		// is the playing moving forward (speed = 1) or backwards (speed = -1).
	moveSpeed : 0.2,	// how far (in map units) does the player move each step/update
	rotSpeed : 6 * Math.PI / 180	// how much does the player rotate each step/update (in radians)
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
function moveback(){
ct=0;
for(var i=1;i<9;i++){
document.getElementById("pc"+i).style.visibility="hidden";
document.getElementById("bcg"+i).width="100";
document.getElementById("bcg"+i).height="100";}
document.getElementById("screen").style.visibility="visible";
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
if(player.x>16 && player.x<17 && player.y>7 && player.y<8){
window.location.replace("finalcell.php");
}
if(player.x>1 && player.x<2 && player.y>1 && player.y<2){ct=1;
clearInterval(z);
player.y+=2;
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
if(player.x>6 && player.x<7 && player.y>1 && player.y<2){ct=1;
clearInterval(z);
player.y+=2;
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
if(player.x>25 && player.x<26 && player.y>1 && player.y<2){ct=1;
player.y+=2;
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
document.getElementById("bcg3").src="dementors.jpg";
}
}
if(player.x>29 && player.x<30 && player.y>1 && player.y<2){ct=1;
clearInterval(z);
player.y+=2;
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
if(player.x>1&& player.x<2 && player.y>16 && player.y<17){ct=1;
clearInterval(z);
player.y-=2;
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
if(player.x>6&& player.x<7 && player.y>16 && player.y<17){ct=1;
clearInterval(z);
player.y-=2;
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
if(player.x>25&& player.x<26 && player.y>16 && player.y<17){ct=1;
clearInterval(z);
player.y-=2;
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
if(player.x>29&& player.x<30 && player.y>16 && player.y<17){ct=1;
clearInterval(z);
player.y-=2;
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
		img.src = (window.opera ? "walls_19color.png" : "capture5.png");
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

		switch (e.keyCode) { // which key was pressed?

			case 38: // up, move player forward, ie. increase speed
				player.speed = 1;
				if(track==1){
				player.speed = 1.5;
				}
				break;
				
		     case 82: // up, move player forward, ie. increase speed
				player.speed = 1.5;
				track=1;
				break;

			case 40: // down, move player backward, set negative speed
				player.speed = -1;
				if(track==1){
				player.speed = -1.5;
				}
				break;

			case 37: // left, rotate player left
				player.dir = -1;
				break;

			case 39: // right, rotate player right
				player.dir = 1;
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
		if (map[wallY][wallX] > 0 && map[wallY][wallX]!=4) {
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
		if (map[wallY][wallX] > 0 && map[wallY][wallX]!=4) {
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
<audio autoplay="autoplay" loop="loop">
  
  <source src="hp.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>

</body>
</html>