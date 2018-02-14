<?php
 // $con = require"db.php";


if(isset($_FILES['file_']) && isset($_POST['eventTitle'])  ){

	$fileName = $_FILES["file_"]["name"]; // The file name
	$fileTmpLoc = $_FILES["file_"]["tmp_name"]; // File in the PHP tmp folder	
	$fileSize = $_FILES["file_"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["file_"]["error"]; // 0 for false... and 1 for true   
    
    $eventTitle = $_POST['eventTitle'];
    $eventTime = $_POST['eventTime'];
    $eventDate = $_POST['eventDate'];
    $eventDescription = $_POST['eventDescription'];
	
	require 'db.php';
	if(mysqli_num_rows(mysqli_query($con , "SELECT * FROM toyota_events WHERE title='$eventTitle' "))>0){
		echo "exists";exit;
	}

	if(move_uploaded_file($fileTmpLoc, "uploads/$fileName")){
		if(mysqli_query($con , "INSERT INTO toyota_events ( title , postsdate , posttime , description ,image  ) VALUES ('$eventTitle','$eventDate','$eventTime','$eventDescription' , '$fileName') ")){
			echo "Complete";exit;

		}else{
			echo "failed";exit;
		}	
		
	}else{
		echo "failed";exit;
	}
	
}

if(isset($_POST['id'])){
    require 'db.php';
    $id = $_POST['id'];

     //get the list of id or token ids
$regIDS=array();
$sql=mysqli_query($con,"SELECT * FROM tokens");
		while($row=mysqli_fetch_assoc($sql)){
		$regIDS[]=$row['token'];		

		}

     $url = 'https://fcm.googleapis.com/fcm/send';
     $apiKey = "AIzaSyDWBPylL7B8dfkuOsvVgFHTNG9eWzZwb4I";
       $fields = array(
                'registration_ids'  => $regIDS,
                'data'     =>array("id_data" => $id)
                );  
                $headers = array( 
                    'Authorization: key=' . $apiKey,
                    'Content-Type: application/json'
                );

		$ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
			 
			echo $result;                                  
}

function sendFCM_news_toallUsers($tokens,$titleArticle){

	$url = 'https://fcm.googleapis.com/fcm/send';
		$fields = array(
			 'registration_ids' => $tokens,
			 'data' => $titleArticle
			);
$apiKey = "AIzaSyDWBPylL7B8dfkuOsvVgFHTNG9eWzZwb4I";
		$headers = array(
			'Authorization:key = '.$apiKey,
			'Content-Type: application/json'
			);

	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;

}



?>