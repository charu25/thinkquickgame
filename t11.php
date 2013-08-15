<html>
<style>
img#w{
margin-top:-12%;
}
img#f{
margin-top:-12%;
opacity:0.5;
}
p{
position:absolute;
font-family:chiller,Helvetica,Ariel,sans-seriff;
left:40%;
z-index:100;
color:red;
font-size:25px;
font-weight:15px;
}
img{
z-index:-10;
}
h3{
position:absolute;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:35px;
text-align:left;
padding-left:200px;
top:20%;
color:red;
width:450px;
}
#c{
visibility:hidden;
}
#clue
{font-weight:900;
 font-size:50px;
 font-color:red;
 background-position:right bottom;
 background-image:url(halloween1.jpg);
 background-repeat:no-repeat;
 background-color:red;
 height:400px;
 width:800px;
 position:absolute;
 left:350px;
 top:150px;
 visibility:hidden;
 
}
input{
border-radius:5px;
}
</style>
<body>
<canvas id="canv" width="1334px" height="720px"></canvas>
<div id="clue" style="border-style:double;color:red;border-width:5px;"><pre>WHO AM I?
     Rhiqeq oqhlacnd</br></br>
 <input type="text" style="height:40px;width:200px;font-size:30px;" id="ans" /> 
 <input type="button" style="height:40px;width:200px;font-size:30px;" value="Submit" onclick="check()"/>
 <input type="button" style="height:40px;width:200px;font-size:30px;left:70%;position:absolute;top:85%" value="back" onclick="change()"/>
 </pre>
  </div>
<div>
<img id="w" src="wood.jpg" alt="wood" width="100%" height="25%">
<img id="f" src="frame.jpg" alt="frame" width="100%" height="25%">
</div>
<p  id="a" style="top:90%;" >Tell me about werewolves.</p>
<p  id="b" style="top:95%;" >Can you give me some Info about the Thief.</p>
<p  id="c" style="top:99%;" >yes.</p>
<h3 id="msg"></h3>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script type="text/javascript">
        var canvas = document.getElementById('canv');
        var ctx = canvas.getContext('2d');

		var myimage = new Image();
myimage.src = 'wolfs.png';
myimage.onload = function() {
                     ctx.drawImage(myimage, 0, 0,1334,560);
                 }
				 var imageone = new Image();
				 
				 var show=function(t,m,ind,i){
if(ind<m.length){
$(t).append(m[ind++]);
setTimeout(function() {show(t,m,ind,i);},i);
}
}
$( "#a" ).click(function(){
document.getElementById("msg").innerHTML="";
show("#msg","A werewolf, also known as a lycanthrope, is a mythological or folkloric human with the ability to shapeshift into a wolf or an therianthropic hybrid wolf-like creature, either purposely or after being placed under a curse or affliction",0,15);
});
$( "#b" ).click(function(){
document.getElementById("msg").innerHTML="";
show("#msg","Help shall be given to those who earn it.Are you ready to Trick or Treat?!!",0,15);
document.getElementById("c").style.visibility="visible";
});
function check()
{var answer=document.getElementById("ans").value;
 if(answer=="fenrir greyback")
  alert("Right Answer!");
}
function change(){
document.getElementById("clue").style.visibility="hidden";
}
$( "#c" ).click(function(){
document.getElementById("msg").innerHTML="";
document.getElementById("clue").style.visibility="visible";
});
</script>
</body>
</html>
