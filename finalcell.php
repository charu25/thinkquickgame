<html>
<?php
if(isset($_POST["ans"])){
if($_POST["ans"]=="hitchock"){
header("Location:finalcell2.php");
exit;
}
}
?>
<style>
body{
background-color:black;
background-image:url(images/fcell.jpg);
background-size:100% 100%;
background-repeat:no-repeat;
}
img{
z-index:-10;
}
#fintext
{margin-top:35%;
 margin-left:38%;
 height:62px;
 width:500px;
 font-size:50px;
background-color:#3B240B;
color:#F7D358;
text-shadow:5px 5px 3px 1px black;
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
input[type=submit]{
border-radius:5px;
width:100px;
height:40px;
background-color:black;
color:red;
font-family:chiller,Helvetica,Ariel,sans-seriff;
font-size:30px;
}
</style>
<body>
<form name="form1" action="finalcell.php" method="post">
<input type="text" id="fintext" value="Passkey" name="ans">
<input type="submit" name="Enter" value="Enter">
</form>
<form name="form2" action="fmaze2.php" method="post">
<input id="back" type="submit" value="back" name="back">
</form>
</body>
</html>
