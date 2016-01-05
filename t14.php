<!--mummy-->
<html>
<?php
include("config.lib.php");
if(!isset($_SESSION['check4'])){
$_SESSION['check4']=0;}
$sql="UPDATE position SET x='1'";
if(mysqli_query($con,$sql));
$sql="UPDATE position SET y='25'";
if(mysqli_query($con,$sql));
?>
<style>
body{
background-color:black;
}
img#w{
position:relative;
margin-top:-200px;
left:200px;
}
img#f{
position:relative;
margin-top:-150px;
opacity:0.5;
left:200px;
}
#back{
background-color:black;
color:red;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:30px;
font-weight:20px;
width:100px;
height:40px;
border:0;
position:absolute;
top:2%;
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
top:-700px;
color:red;
width:400px;
}
#c{
visibility:hidden;
}
input{
border-radius:5px;
}
#mummy{
position:relative;
left:800;
z-index:20;
margin-top:100px;
top:-130px;
}
#grave{
z-index=-10;
position:relative;
margin-top:20px;
}
#clue
{font-weight:900;
 font-size:50px;
 font-color:green;
 background-position:right bottom;
 background-image:url(images/whitebg.jpg);
 background-repeat:no-repeat;
 background-color:red;
 background-size:100% 100%;
 height:580px;
 width:800px;
 position:absolute;
 left:300px;
 top:-80px;
 margin-top:100px;
 visibility:hidden;
}
#rid{
z-index:150;}
.HL{
background: #ffff00;
}
</style>
<body>
<form action="fmaze2.php" method="post">
<input id="back" type="submit" value="back" name="back">
</form>
<audio id="au1">
<source src="sounds/mummy1.mp3" type="audio/mp3">
</audio>
<audio id="au2">
<source src="sounds/mummy2.mp3" type="audio/mp3">
</audio>
<img id="mummy" src="images/mummy.gif" width="200px" height="250px">
<img id="grave" src="images/graveyard.jpg" width="1000px" height="550px">
<div>
<img id="w" src="images/wood.jpg" alt="wood" width="1000px" height="150px">
<img id="f" src="images/frame.jpg" alt="frame" width="1000px" height="150px">
</div>
<div id="clue" ><pre>
   <img id="rid" src="images/riddle.png" style="height:70%;width:50%;"alt="cipher"/><form method="post" action="check.php">
   <input type="text"  style="height:40px;width:200px;font-size:30px;" id="ans" name="ans4"/> <input type="submit"  style="height:40px;width:200px;font-size:30px;" value="Submit" /> <input type="button" style="height:40px;width:200px;font-size:30px;" value="back" onclick="change()"/></pre></form>
  </div>
<p  id="a" style="top:-150px;" >Tell me about mummies.</p>
<p  id="b" style="top:-190px;" >Will you give me some information about the thief?</p>
<p  id="c" style="top:-240px;font-size:50px;" >Okay.</p>
<h3 id="msg"></h3>
<script src="jquery.js">
</script>
<script type="text/javascript">
var ind=0,ctr=0,s,q;
var cluehnd=document.getElementById("clue");
var msghnd=document.getElementById("msg");

setInterval(function(){move()},50);
var track=1000;
function move(){
document.getElementById("mummy").style.left=track;
track-=5;
if(track<5){
track=1000;
}
}
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
cluehnd.style.zIndex=200;
if(ctr==1){
clearInterval(q);
clearInterval(s);
ind=0;
ctr=0;}
var m=document.getElementById("au1");
m.autoplay=false;
m.load();
var m=document.getElementById("au2");
m.autoplay=true;
m.load();
msghnd.innerHTML="";
s=setInterval(function(){show("#msg","A mummy is a deceased human whose remains have been preserved by exposure to chemicals.The most famous Ancient Egyptian text is called The Ritual of Embalming and describes the process of bandaging the mummy.",ind++,0)},100);
});
$( "#b" ).click(function(){
cluehnd.style.zIndex=200;
if(ctr==1){
clearInterval(s);
clearInterval(q);
ind=0;
ctr=0;}
var m=document.getElementById("au2");
m.autoplay=false;
m.load();
var m=document.getElementById("au1");
m.autoplay=true;
m.load();
msghnd.innerHTML="";
q=setInterval(function(){show("#msg","Use what I dont have to get what you need.Its time to trick or treat.!!",ind++,1)},80);
document.getElementById("c").style.visibility="visible";
});
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
msghnd.innerHTML="";
cluehnd.style.visibility="visible";
cluehnd.style.zIndex=200;
});
function change(){
cluehnd.style.visibility="hidden";
cluehnd.style.zIndex=-50;
}
var chec="<?php echo $_SESSION['check4']; ?>";
if(chec=="1"){
alert("Clue obtained ! Added to inventory.");
}
</script>
</body>
</html>
