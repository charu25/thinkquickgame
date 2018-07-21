<!--chimera-->
<html>
<?php
include("config.lib.php");
session_start();
if(!isset($_SESSION['check7'])){
$_SESSION['check7']=0;}
$sql="UPDATE position SET x='25'";
if(mysqli_query($con,$sql));
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
top:-300px;
left:200px;
}
img#f{
position:relative;
margin-top:-550px;
top:100px;
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
font-size:20px;
text-align:left;
left:250px;
top:-1100px;
color:red;
width:400px;
}
#c{
visibility:hidden;
}
input{
border-radius:5px;
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
 font-color:green;
 background-position:right bottom;
 background-image:url(images/whitebg.jpg);
 background-repeat:no-repeat;
 background-color:red;
 background-size:100% 100%;
 height:500px;
 width:800px;
 position:absolute;
 left:350px;
 top:80px;
 visibility:hidden;
 z-index:200;
}
#chimera,#chimeraopen{
position:relative;
left:700px;
z-index:10;
top:100px;
}
#cave{
z-index:-10;
position:relative;
left:200px;
top:-300px;
}
.HL{
background: #ffff00;
}
#chimeraopen{
display:none;}
</style>
<body>
<audio id="au1">
<source src="../sounds/chimera2.mp3" type="audio/mp3">
</audio>
<audio id="au2">
<source src="../sounds/chimera1.mp3" type="audio/mp3">
</audio>
<div id="clue" ><pre>
   <img src="../images/cipher3.png" alt="cipher"/><form method="post" action="check.php">
  <input type="text" style="height:50px;width:200px;font-size:30px;" name="ans7" id="ans" /> <input type="submit" style="height:50px;width:150px;font-size:30px;" value="Submit"/> <input type="button" style="height:50px;width:150px;font-size:30px;" value="Back" onclick="change()"/></form>
 </pre>
  </div>
<img id="chimera" src="../images/chimera.png" width="500px" height="400px">
<img id="chimeraopen" src="../images/chimera_open.png" width="500px" height="400px">
<img id="cave" src="../images/cave1.jpg" width="1000px" height="480px">
<div>
<img id="w" src="../images/wood.jpg" alt="wood" width="1000px" height="150px">
<img id="f" src="../images/frame.jpg" alt="frame" width="1000px" height="150px">
</div>
<p  id="a" style="top:-450px;" >Tell me about a chimera.</p>
<p  id="b" style="top:-490;" >Can you give me some Info about the Thief.</p>
<p  id="c" class="HL" style="top:-540;" >yes.</p>
<h3 id="msg"></h3>
<form name="form7" action="../fmaze2.php" method="post">
<input type="submit" id="back" value="back" name="back">
</form>
<script src="../js/jquery.js">
</script>
<script type="text/javascript">
var ind=0,ctr=0,s,q,mm=0;
var chnd=document.getElementById("chimera");
var cohnd=document.getElementById("chimeraopen");
var cluehnd=document.getElementById("clue");

				 var show=function(t,m,ind,i){
if(ind<m.length){
$(t).append(m[ind++]);
ctr=1;

}
else{if(i==0){
clearInterval(s);
clearInterval(mm);}
else{
clearInterval(q);
clearInterval(mm);}}
}
$( "#a" ).click(function(){
cluehnd.style.zIndex=200;
clearInterval(mm);
clearInterval(q);
clearInterval(s);
if(ctr==1){
clearInterval(q);
clearInterval(mm);
ind=0;
ctr=0;}
var m=document.getElementById("au1");
m.autoplay=false;
m.load();
var m=document.getElementById("au2");
m.autoplay=true;
m.load();
document.getElementById("msg").innerHTML="";
s=setInterval(function(){show("#msg","The chimera is a monstrous fire-breathing creature  usually depicted as a lion, with the head of a goat arising from its back, and a tail that ended in a snake's head.Sighting a chimera is usually associated with bad luck.",ind++,0)},75);
mm=setInterval(function(){movemouth()},200);
});
$( "#b" ).click(function(){
clearInterval(mm);
clearInterval(q);
clearInterval(s);
cluehnd.style.zIndex=200;
if(ctr==1){
clearInterval(s);
clearInterval(mm);
ind=0;
ctr=0;}
var m=document.getElementById("au2");
m.autoplay=false;
m.load();
var m=document.getElementById("au1");
m.autoplay=true;
m.load();
document.getElementById("msg").innerHTML="";
q=setInterval(function(){show("#msg","I'm not one but of many.Put together many you get one.confused yet?",ind++,1)},75);
mm=setInterval(function(){movemouth()},200);
document.getElementById("c").style.visibility="visible";
});
function check()
{var answer=document.getElementById("ans").value;
 if(answer=="fenrir greyback")
  alert("Right Answer!");
  
}
function change(){
cluehnd.style.visibility="hidden";
cluehnd.style.zIndex=-50;
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
clearInterval(mm);
ind=0;
ctr=0;}
document.getElementById("msg").innerHTML="";
cluehnd.style.visibility="visible";
cluehnd.style.zIndex=200;
});
var chec="<?php echo $_SESSION['check7']; ?>";
if(chec=="1"){
alert("Clue obtained! Added to inventory.");
}
function movemouth(){
console.log(mm);
if(chnd.style.display=="none"){
chnd.style.display="block";
cohnd.style.display="none";
}
else {
chnd.style.display="none";
cohnd.style.display="block";}
}
</script>
</body>
</html>
