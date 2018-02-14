<?php

define("DATABASE" , "c571_db");
define("USERS" , "toyota_users");
define("EVENTS" , "toyota_events");
define("ACCESS_PASSWORD" , "H3w3SNjl5VcYX");
define("ACCESS_USER" , "c571_user");

$con = mysqli_connect("localhost"  , "root" , "" , DATABASE);

$id = $_GET['token'];
 $arr=array();
if(mysqli_num_rows(mysqli_query($con , "SELECT token FROM tokens WHERE token = '$id' "))<1){
   
   $arr['message'] = mysqli_query($con , "INSERT INTO tokens (token)  VALUES ('$id')") ? "done" : "failed";
}else{
    $arr['message'] = "done";
}
echo json_encode($arr);
	exit();

?>