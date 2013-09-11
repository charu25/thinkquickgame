<!--vampire-->
<html>
<?php
include("config.lib.php");
if(!isset($_SESSION['check5'])){
$_SESSION['check5']=0;}
$sql="UPDATE position SET x='16'";
if(mysqli_query($con,$sql));
$sql="UPDATE position SET y='2'";
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
top:-370px;
}
img#f{
position:relative;
margin-top:-520px;
opacity:0.5;
left:200px;
}
p{
position:relative;
font-family:chiller,Helvetica,Ariel,sans-seriff;
left:400px;
margin-top:-180px;
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
top:-500px;
color:red;
width:400px;
z-index:40;
}
#c{
visibility:hidden;
}
input{
border-radius:5px;
}
#vampire,#vampireopen{
position:relative;
left:450px;
top:-40px;
z-index:30;
}
#vamp{
position:relative;
left:200px;
top:-500px;
z-index:20;}
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
 background-image:url(vamp2.jpg);
 background-repeat:no-repeat;
 background-color:red;
 background-size:100% 100%;
 height:400px;
 width:800px;
 position:absolute;
 left:350px;
 top:60px;
 visibility:hidden;
 z-index:200;
 
}
.HL{
background: #ffff00;
}
#vampireopen{
display:none;}
</style>
<body>
<audio id="au1">
<source src="vamp2.mp3" type="audio/mp3">
</audio>
<audio id="au2">
<source src="vamp1.mp3" type="audio/mp3">
</audio>
<div id="clue" style="border-style:double;color:#64FE2E;border-width:5px;"><pre> ARE YOU A VAMPIRE?

 ILAPHA NYHV OPYIO ERR<form method="post" action="check.php">
  <input type="text" style="height:50px;width:600px;font-size:30px;" id="ans5" name="ans5" /> 
 <input type="submit" style="height:50px;width:200px;font-size:30px;" value="Submit"/>            <input type="button" style="height:50px;width:150px;font-size:30px;" value="Back" onclick="change()"/></form>
 </pre>
  </div>
<img id="vampire" src="vampireopen1.jpg" width="750px" height="500px">
<img id="vampireopen" src="vampireopen2.jpg" width="750px" height="500px">
<img id="vamp" src="vampirebcg.jpg" width="1000px" height="460px">
<div>
<img id="w" src="wood.jpg" alt="wood" width="1000px" height="150px">
<img id="f" src="frame.jpg" alt="frame" width="1000px" height="150px">
</div>
<p  id="a" style="top:-310px;" >Tell me about vampires.</p>
<p  id="b" style="top:-150px;" >Will you give me some information about the thief?</p>
<p  id="c" style="top:-4px;font-size:50px;" >Okay.</p>
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
var vhnd=document.getElementById("vampire");
var vohnd=document.getElementById("vampireopen");


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
cluehnd.style.zIndex=50;
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
msghnd.innerHTML="";
s=setInterval(function(){show("#msg","Vampires are mythological or folkloric beings who survive by feeding on the blood of living creatures.Count Dracula is a centuries-old vampire, sorcerer, and Transylvanian nobleman.",ind++,0)},90);
mm=setInterval(function(){movemouth()},200);
});
$( "#b" ).click(function(){
cluehnd.style.zIndex=50;
clearInterval(mm);
clearInterval(q);
clearInterval(s);
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
msghnd.innerHTML="";
q=setInterval(function(){show("#msg","Master of disguise is what defines me.Remember that the non-existant exists.",ind++,1)},80);
mm=setInterval(function(){movemouth()},200);
document.getElementById("c").style.visibility="visible";
});
$( "#c" ).click(function(){
clearInterval(mm);
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
cluehnd.style.zIndex=50;
});
function change(){
cluehnd.style.visibility="hidden";
cluehnd.style.zIndex=-50;
}
var chec="<?php echo $_SESSION['check5']; ?>";
if(chec=="1"){
alert("Clue obtained ! Added to inventory.");
}
function movemouth(){
console.log(mm);
if(vhnd.style.display=="none"){
vhnd.style.display="block";
vohnd.style.display="none";
}
else {
vhnd.style.display="none";
vohnd.style.display="block";}
}
</script>
</body>
</html>
