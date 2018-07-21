<?php

// establishing the connection with the database & consecutive checking.
$con = mysqli_connect(SERVER, USERNAME, SERVER_PASSWORD,DATABASE);
if(!$con){
	//die ("Database connection failed: " . mysqli_error());
}
//$db_select = mysqli_select_db(DATABASE,$con);
//if(!$db_select){
	//die ("Database connection failed: " . mysqli_error());
//}
session_start();

?>