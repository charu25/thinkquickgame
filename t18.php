<!--whitewalkers-->
<html>
<?php
session_start();
if(!isset($_SESSION['check8'])){
$_SESSION['check8']=0;}
$con=mysqli_connect("localhost","root","","player");
$sql="UPDATE position SET x='29'";
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
 background-image:url(bluebg.jpg);
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

</style>
<body>
<div id="clue" ><pre>
   <img src="riddle2.png" alt="cipher"/>
  <form name="form1" method="post" action="check.php">
    <input type="text" style="height:50px;width:200px;font-size:30px;" id="ans" name="ans8"/> <input type="submit" style="height:50px;width:150px;font-size:30px;" value="Submit"/> <input type="button" style="height:50px;width:150px;font-size:30px;" value="back" onclick="change()"/></form>
 </pre>
  </div>
<audio id="au1">
<source src="whitewalker2.wav" type="audio/wav">
</audio>
<audio id="au2">
<source src="whitewalker1.wav" type="audio/wav">
</audio>
<img id="white" src="whitewalker.png" width="1000px" height="560px">
<div>
<img id="w" src="wood.jpg" alt="wood" width="1000px" height="150px">
<img id="f" src="frame.jpg" alt="frame" width="1000px" height="150px">
</div>
<p  id="a" style="top:-150px;" >Tell me about white walkers.</p>
<p  id="b" style="top:-190px;" >Can you give me some information about the thief?</p>
<p  id="c" style="top:-240px;" >Okay.</p>
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
var m=document.getElementById("au1");
m.autoplay=false;
m.load();
var m=document.getElementById("au2");
m.autoplay=true;
m.load();
document.getElementById("msg").innerHTML="";
s=setInterval(function(){show("#msg","The White Walkers, a mythological race mentioned in ancient legends from the time of the First Men and the Children of the Forest.",ind++,0)},120);
});
$( "#b" ).click(function(){
document.getElementById("clue").style.zIndex=200;
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
document.getElementById("msg").innerHTML="";
q=setInterval(function(){show("#msg","You see a glint of blue you stop seeing and start running for winter is coming.",ind++,1)},110);
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
var chec="<?php echo $_SESSION['check8']; ?>";
if(chec=="1"){
alert("Clue obtained! Added to inventory.");
}
</script>
</body>
</html>
