<!--whitewalkers-->
<html>
<?php
include("config.lib.php");
session_start();
if(!isset($_SESSION['check8'])){
$_SESSION['check8']=0;}
$sql="UPDATE position SET x='23'";
if(mysqli_query($con,$sql));
$sql="UPDATE position SET y='2.2'";
if(mysqli_query($con,$sql));
?>
<style>
body{
background-color:black;
}
img#w{
position:relative;
margin-top:-190px;
top:20px;
left:200px;
}
img#f{
position:relative;
margin-top:-130px;
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
#white{
position:relative;
left:200px;
top:20px;
}
#back{
background-color:lightblue;
color:black;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:30px;
font-weight:20px;
width:100px;
height:40px;
border:0;
position:absolute;
top:2%;
}
#clue
{font-weight:900;
 font-size:50px;
 font-color:green;
 background-position:right bottom;
 background-image:url(images/bluebg.jpg);
 background-repeat:no-repeat;
 background-color:red;
 background-size:100% 100%;
 height:570px;
 width:800px;
 position:absolute;
 left:300px;
 top:30px;
 visibility:hidden;
 z-index:200;
}
.HL{
background: #ffff00;
}
</style>
<body>
<div id="clue" ><pre>
   <img src="images/riddle2.jpg" alt="cipher"/>
  <form name="form1" method="post" action="check.php">
    <input type="text" style="height:50px;width:200px;font-size:30px;" id="ans" name="ans8"/> <input type="submit" style="height:50px;width:150px;font-size:30px;" value="Submit"/> <input type="button" style="height:50px;width:150px;font-size:30px;" value="back" onclick="change()"/></form>
 </pre>
  </div>
<audio id="au1">
<source src="sounds/whitewalker2.mp3" type="audio/mp3">
</audio>
<audio id="au2">
<source src="sounds/whitewalker1.mp3" type="audio/mp3">
</audio>
<img id="white" src="images/whitewalker.png" width="1000px" height="560px">
<div>
<img id="w" src="images/wood.jpg" alt="wood" width="1000px" height="150px">
<img id="f" src="images/frame.jpg" alt="frame" width="1000px" height="150px">
</div>
<p  id="a" style="top:-150px;" >Tell me about white walkers.</p>
<p  id="b" style="top:-190px;" >Can you give me some information about the thief?</p>
<p  id="c" style="top:-240px;font-size:50px;" >Okay.</p>
<h3 id="msg"></h3>
<form action="fmaze2.php" method="post">
<input id="back" type="submit" value="back" name="back">
</form>
<script src="jquery.js">
</script>
<script type="text/javascript">
var ind=0,ctr=0,s,q,mm=0;
var cluehnd=document.getElementById("clue");
var msghnd=document.getElementById("msg");
var whnd=document.getElementById("white");

				 var show=function(t,m,ind,i){
if(ind<m.length){
$(t).append(m[ind++]);
ctr=1;
}
else{if(i==0){
clearInterval(s);
}
else{
clearInterval(q);}}
}
$( "#a" ).click(function(){
cluehnd.style.zIndex=200;
clearInterval(q);
clearInterval(s);
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
s=setInterval(function(){show("#msg","The White Walkers, a mythological race mentioned in ancient legends from the time of the First Men and the Children of the Forest.",ind++,0)},120);
});
$( "#b" ).click(function(){

clearInterval(q);
clearInterval(s);
cluehnd.style.zIndex=200;
if(ctr==1){
clearInterval(mm);
clearInterval(q);
clearInterval(s);
ind=0;
ctr=0;}
var m=document.getElementById("au2");
m.autoplay=false;
m.load();
var m=document.getElementById("au1");
m.autoplay=true;
m.load();
msghnd.innerHTML="";
q=setInterval(function(){show("#msg","You see a glint of blue you stop seeing and start running for winter is coming.",ind++,1)},110);
document.getElementById("c").style.visibility="visible";
});
function check()
{var answer=document.getElementById("ans").value;
 if(answer=="fenrir greyback")
  alert("Right Answer!");
  
}
function change(){
cluehnd.style.visibility="hidden";
cluehnd.style.zIndex=-200;
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
msghnd.innerHTML="";
cluehnd.style.visibility="visible";
cluehnd.style.zIndex=200;
});
var chec="<?php echo $_SESSION['check8']; ?>";
if(chec=="1"){
alert("Clue obtained! Added to inventory.");
}

</script>
</body>
</html>
