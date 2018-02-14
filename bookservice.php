<?php

$name  = $_GET['name'];
$surname  = $_GET['surname'];
$comment  = $_GET['comment'];
$model  = $_GET['model'];
$regNumber  = $_GET['regNumber'];
$date  = $_GET['date'];
$service  = $_GET['service'];
$email  = $_GET['email'];
$cell  = $_GET['cell'];


$arr=array();
$to = "aspham@toyota.co.zw";
         $subject = "Service Booking";
         $message = " I <b>" . $name . " </b> " . $surname 
                                        . " am requesting a service for my vehicle <b>" . $model . " </b> with registration Number "
                                        . "<b> <u>" . $regNumber . " </u> </b> . <br> <hr>"
                                        . "The serivice is to be on this date <strong> <u> " . $date  . " </u> </strong><br>"
                                        . "Service type :<strong> <u> " . $service . "</u> </strong><br><br>"
                                        . "My contact Details are :" . $email . " , ". $cell . "<br>" ;

         $header = "From:$email \r\n";
         $header .= "Cc:aspham@toyota.co.zw \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";

         $retval = mail ($to,$subject,$message,$header);

         if( $retval == true ) {
           $arr['message']="successful";
		
			echo json_encode($arr);
			exit();
         }else {
           $arr['message']="failed";
			
			echo json_encode($arr);
			exit();
         }


?>