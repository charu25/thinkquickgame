<!--dragon-->
<html>
<?php
include("config.lib.php");
if(!isset($_SESSION['check2'])){
$_SESSION['check2']=0;}
$sql="UPDATE position SET x='13'";
if(mysqli_query($con,$sql));
$sql="UPDATE position SET y='15'";
if(mysqli_query($con,$sql));
?>
<style>
body{
background-color:black;
}
.HL{
background: #ffff00;
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
#drag{
position:relative;
left:550px;
margin-top:100px;
z-index:20;
}
#fire{
z-index=-10;
position:relative;
margin-top:-500px;
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
#clue
{font-weight:900;
 font-size:50px;
 font-color:red;
 background-position:right bottom;
 background-image:url(dragonbg1.jpg);
 background-size:100% 100%;
 background-repeat:no-repeat;
 background-color:red;
 height:400px;
 width:800px;
 position:absolute;
 left:350px;
 top:100px;
 z-index:200;
 visibility:hidden;
 }

</style>
<body>
<div id="clue" style="border-style:double;color:red;border-width:5px;"> WHO AM I?</br>

 <img src="dragon.jpg"/></br>
 <form name="form1" method="post" action="check.php"></br>
 <input type="text" style="height:50px;width:300px;font-size:30px;" name="ans2" id="ans2" /> 
 <input type="submit" style="height:50px;width:200px;font-size:30px;top:85%" value="Submit"/></form>   
 <input type="button" style="height:50px;width:200px;font-size:30px;left:65%;position:absolute;top:83%" value="Back" onclick="change()"/>
  </div>
<form action="fmaze2.php" method="post">
<input id="back" type="submit" value="back" name="back">
</form>
<audio id="au1">
<source src="dragon2.mp3" type="audio/mp3">
</audio>
<audio id="au2">
<source src="dragon1.mp3" type="audio/mp3">
</audio>
<img id="drag" src="dragon.gif" width="60%" height="70%">
<img id="fire" src="fire.jpg" width="1000px" height="400px">
<div>
<img id="w" src="wood.jpg" alt="wood" width="1000px" height="150px">
<img id="f" src="frame.jpg" alt="frame" width="1000px" height="150px">
</div>
<p  id="a" style="top:-150px;" >Tell me about dragons.</p>
<p  id="b" style="top:-190px;" >Will you give me some information about the thief?</p>
<p  id="c" style="top:-240px;font-size:50px;" >Okay.</p>
<h3 id="msg"></h3>
<script src="jquery.js">
</script>
<script type="text/javascript">
var ind=0,ctr=0,s,q;
var cluehnd=document.getElementById("clue");
var show=function(t,m,ind,i){
if(ind<m.length)
{
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
document.getElementById("msg").innerHTML="";
s=setInterval(function(){show("#msg","A dragon is a legendary creature, typically with serpentine or reptilian traits,that features in many myths.",ind++,0)},80);
});
$( "#b" ).click(function(){
cluehnd.style.zIndex=200;
if(ctr==1)
{
clearInterval(s);
clearInterval(q);
ind=0;
ctr=0;
}
var m=document.getElementById("au2");
m.autoplay=false;
m.load();
var m=document.getElementById("au1");
m.autoplay=true;
m.load();
document.getElementById("msg").innerHTML="";
q=setInterval(function(){show("#msg","Use the fire in you to see the light!",ind++,1)},100);
document.getElementById("c").style.visibility="visible";
});
function check()
{var answer=document.getElementById("ans").value;
 if(answer=="norbert")
  alert("Right Answer!");
  
}
function change()
{
cluehnd.style.visibility="hidden";
cluehnd.style.zIndex=-200;
}
$( "#c" ).click(function()
{
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
cluehnd.style.visibility="visible";
cluehnd.style.zIndex=200;
});
$("#back").click(function(){
window.location.replace("fmaze2.php");
});		
var chec="<?php echo $_SESSION['check2']; ?>";
if(chec=="1"){
alert("Clue obtained ! Added to inventory.");
}		
</script>
</body>
</html>
