<?php  
if (isset($_POST['submit'])) {

	# code...
	$user_name=$_POST['name'];
	$user_email=$_POST['email'];
	//$user_subject=$_POST['subject'];
	$user_message=$_POST['message'];


	$email_from = 'sahar.frikha9@gmail.com';
	$email_subject= "hello";
	$email_body="Name: $user_name. \n 
				User message : $user_message";

	$to_email="sahar.frikha1@gmail.com";
	$headers="From: $email_from \r \n";
	$headers .="Replay-To $user_email \r \n";


	$secretkey="6Ld177IZAAAAAN6yCpWZ7-GXFaoxCFhnAxbYwcNn";
	$responsekey=$_POST['g-recaptcha-response'];
	$UserIP=$_SERVER['REMOTE_ADDR'];
	$url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&resonse=$responsekey&remoteip=$UserIP";
	$response=file_get_contents($url);
	$response=json_decode($response);
	if ($response-> success) {
		# code...
		mail($to_email, $email_subject, $email_body,$headers);
		
	}


}



?>