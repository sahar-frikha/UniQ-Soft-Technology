<?php

require 'forms/PHPMailerAutoload.php';

if (isset($_POST["submit"])) 
{

	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	

	//Create a new PHPMailer instance
	$mail = new PHPMailer;

	$mail->CharSet = 'UTF-8';
	$mail->From = $email;
	$mail->FromName = $name;
	$mail->addAddress('solutions@uniqfst.com');
	$mail->addCC('');
	$mail->addReplyTo($email);
	$mail->isHTML(true); 
	$mail->Subject = 'Contact me';
	$mail->Body    = '';
	$mail->Body    .= '<p>Dear <strong>: UniQ Soft Technology Administrator</strong> </p>';
	$mail->Body    .= '<p>Kindly be informed that you have recieved a contact demande you will find the needed info and message below :</p>';
	$mail->Body    .= '<p>*		Name  : <strong>'.$name.'</strong> </p>';
	$mail->Body    .= '<p>*		Phone  : <strong>'.$phone.'</strong> </p>';
	$mail->Body    .= '<p>*		Email adresse : <strong>'.$email.'</strong> </p>';
	$mail->Body    .= '<p>*		Demand : <strong>'.$message.'</strong> </p>';
	$mail->Body    .= '<p>Best regards,</p>';
	//


	//Create a new PHPMailer instance
	$mailR = new PHPMailer;

	$mailR->CharSet = 'UTF-8';
	$mailR->From = 'solutions@uniqfst.com';
	$mailR->FromName = 'UniQ Solutions';
	$mailR->addAddress($email);
	$mailR->addCC('');
	$mailR->addReplyTo('solutions@uniqfst.com');
	$mailR->isHTML(true); 
	$mailR->Subject = 'Contact me';
	$mailR->Body    = '';
	$mailR->Body    .= '<p>Dear'.$name.',';
	$mailR->Body    .= '<p>Kindly be informed that we have recieved your contact demande. <br> We will contact you back.</p>';
	$mailR->Body    .= '<p>Best regards,</p>';
	//


	
	if(!$mail->send()) {
	    echo '<strong style="color: red;" >Message not sent! Try again another time</strong>';
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		header('Location: index.html');
		exit();
	    //echo 'Message has been sent';
	}

	if(!$mailR->send()) {
	    echo '<strong style="color: red;" >Message not sent! Try again another time</strong>';
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		header('Location: index.html');
		exit();
	    //echo 'Message has been sent';
	}

}

?>