<html>
<?php 
$i=1;
$sum=0;
while($i<9){
$con=mysqli_connect("localhost","root","","player");
$a="cell".$i;
$sql = "SELECT $a from cell";
$b=mysqli_query($con,$sql);
while($c=mysqli_fetch_array($b)){
if($c[$a]==1){
$sum++;}
$i++;}
$score=$sum*94;
}
?>
<style>
body{
background-color:black;
background-image:url(vilbg1.jpg);
background-size:100% 100%;
}
img{
z-index:-10;
width:300px;
height:500px;
}

h3{
position:absolute;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:90px;
font-weight:200;
text-align:left;
padding-left:200px;
top:100px;
color:red;
width:600px;
text-shadow:1px 1px 10px 5px black;
}
h2{
position:absolute;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:90px;
font-weight:200;
text-align:left;
padding-left:250px;
top:250px;
color:red;
width:600px;}

#vill
{height:600px;
 width:400px;
 position:relative;
 top:150px;
 left:800px;
}
</style>
<body>
<img id="vill" src="one.png" alt="villain"/>
<h3 id="msg"></h3>
<h2 id="msg1"></h2>
<audio autoplay="autoplay">
<source src="villian.mp3" type="audio/wav">
</audio>
<script src="jquery.js">
</script>
<script type="text/javascript">

var ind=0;
var show=function(t,m,ind){
if(ind<m.length){
$(t).append(m[ind++]);
}
else{
clearInterval(q);
document.getElementById("msg1").innerHTML="Score : "+"<?php echo $score ;?>";
}
}
var q=setInterval(function(){show("#msg","GAME OVER!!!!!",ind++)},100);
</script>
</body>
</html>
