<!--demntor-->
<html>
<?php
include("config.lib.php");
if(!isset($_SESSION['check3'])){
$_SESSION['check3']=0;}
$sql="UPDATE position SET x='1.5'";
if(mysqli_query($con,$sql));
$sql="UPDATE position SET y='11.3'";
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
p{
position:relative;
font-family:chiller,Helvetica,Ariel,sans-seriff;
left:400px;
margin-top:40px;
z-index:50;
color:red;
font-size:25px;
font-weight:15px;
}
img{
z-index:-10;
}
#clue
{font-weight:900;
 font-size:20px;
 font-color:red;
 background-color:black;
 height:600px;
 width:1400px;
 position:relative;
 margin-top:-900px;
 visibility:hidden;
 z-index:100;
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
input{
border-radius:5px;
}
#dementor{
position:relative;
z-index:10;
padding-left:700px;
margin-top:150px;
}
#dem{
z-index:-10;
position:relative;
margin-top:-500px;
left:200px;
}
.HL{
background: #ffff00;
}
</style>
<body>
<audio id="au1">
<source src="sounds/dem2.mp3" type="audio/mp3">
</audio>
<audio id="au2">
<source src="sounds/dem1.mp3" type="audio/mp3">
</audio>
<img id="dementor" src="images/dem2.png" width="340px" height="350px">
<img id="dem" src="images/dem.gif" width="1000px" height="600px">
<div>
<img id="w" src="images/wood.jpg" alt="wood" width="1000px" height="150px">
<img id="f" src="images/frame.jpg" alt="frame" width="1000px" height="150px">
</div>
<div id="words">
<p  id="a" style="top:-150px;" >Tell me about dementors.</p>
<p  id="b" style="top:-190px;" >Can you give me some information about the thief?</p>
<p  id="c" style="top:-240px;font-size:50px;" >Yes.</p>
</div>
<h3 id="msg"></h3>
<div id="clue" style="border-style:double;color:red;border-width:5px;"><pre>
<form name="form" action="check.php" method="post">
In the final battle against He-Who-Must-Not-Be-Named, Harry,Ron, Neville, Bill and 
Draco must,in some order, cast one of 5 spells. Additionally, they must cast their 
spells in sync with their girlfriends to increase the potency of the only tool against Dark Magic: Love
The boys are dating either Cho, Fleur , Hermione , Ginny  or Luna. 
They each cast one of the following spells: Expelliarmus, Reparo , Impendimenta 
, Silencio, or Scourgify. 
Neville doesn't know how to cast a Reparo spell.The 5 girls are the one dating Ron, the one who cast first, 
the one who used the Impendimenta spell, the one dating Harry, and the one who cast third. Ron first began 
to realize just how wonderful his girlfriend, Luna (who is superstitious and therefore won't be the last to
cast a spell), was when she was a substitute commentator at a Quidditch game.mDraco and his girlfriend cast 
fourth.Bill has always been fond of his girlfriend's ability to cast the Scourgify spell,and so chose to 
cast that spell.The five boys are Draco, the one dating Cho, the one who cast second, the one using the 
Scourgify spell, and the one who cast fifth.None of boys cast a spell with the same first initial as their
name.Hermione is known for her skill in casting an Impendimenta spell, so her date picked that spell to cast.
Ron thought it would be "bloody brilliant" if he could make someone else keep quiet,so he cast the Silencio 
spell.Fleur refused to allow her boyfriend and herself to cast their spell in any place but third.
On the  first  turn <input type="text"  name="ans31"/> along with his girlfriend , <input type="text" name="ans32" /> cast a <input type="text" name="ans33" /> spell.</br> 
On the  fourth turn <input type="text" name="ans34" /> along with his girlfriend,  <input type="text" name="ans35" /> cast a <input type="text"  name="ans36" /> spell. 
 <input type="submit" style="height:40px;width:200px;font-size:30px;" value="Submit" onclick="check()"/>   <input type="button" style="height:40px;width:200px;font-size:30px;" value="back" onclick="change()"/></pre>
  </form></div>
<form action="fmaze2.php" method="post">
<input id="back" type="submit" value="back" name="back">
</form>
<script src="jquery.js">
</script>
<script type="text/javascript">
var ind=0,ctr=0,s,q;
var cluehnd=document.getElementById("clue");
var msghnd=document.getElementById("msg");
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
cluehnd.style.zIndex=50;
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
s=setInterval(function(){show("#msg","Dementors are among the foulest creatures that walk this earth. They infest the darkest, filthiest places, they glory in decay and despair, they drain peace, hope, and happiness out of the air around them.",ind++,0)},110);
});
$( "#b" ).click(function(){
cluehnd.style.zIndex=50;
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
q=setInterval(function(){show("#msg","Souls are required as payment.Do you have what it takes?",ind++,1)},110);
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
cluehnd.style.zIndex=50;
});
function change(){
cluehnd.style.visibility="hidden";
cluehnd.style.zIndex=-50;
}
var chec="<?php echo $_SESSION['check3']; ?>";
if(chec=="1"){
alert("Clue obtained ! Added to inventory.");
}
</script>
</body>
</html>
