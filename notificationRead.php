<?php

$id  = $_GET['id'];
define("DATABASE" , "c571_db");
define("USERS" , "toyota_users");
define("EVENTS" , "toyota_events");
define("ACCESS_PASSWORD" , "H3w3SNjl5VcYX");
define("ACCESS_USER" , "c571_user");

$con = mysqli_connect("localhost"  ,ACCESS_USER , ACCESS_PASSWORD , DATABASE);

$arr=array();

$q=mysqli_query($con,"SELECT * FROM toyota_events WHERE id = '$id' ");
	while($qw=mysqli_fetch_assoc($q)){
	
	$arr[]=$qw;	

	}


	echo json_encode($arr);
mysqli_close($con);
	exit();

?>