<?php

require_once 'vendor/autoload.php';
if($_SERVER['SERVER_NAME']=='localhost'){
  $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
  ->setUsername('1f0967eefcca56')
  ->setPassword('636f74335f3d6a');
  
}else{
	$transport = Swift_MailTransport::newInstance();
}

if (isset($_POST["submit"])) 
{

	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$body = $_POST["message"];

	$mailer= Swift_Mailer::newInstance($transport);


	$message = Swift_Message::newInstance('Contact')
		-> setFrom([$email => 'Sahar FRIKHA'])
		-> setTo(['sahar.frikha@etudiant-enit.utm.tn'])
		-> setBody("Dear : UniQ Soft Technology Administrator \nKindly be informed that you have recieved a contact demande you will find the needed info and message below : \nName  :".$name. " \nPhone  :".$phone." \nEmail adresse :".$email." \nDemand : ".$body." \n \nBest regards,");

	$result = $mailer->send($message);


	$mailer= Swift_Mailer::newInstance($transport);


	$message = Swift_Message::newInstance('Contact')
		-> setFrom(['sahar.frikha@etudiant-enit.utm.tn' => 'Sahar FRIKHA'])
		-> setTo([$email])
		-> setBody("Dear :".$name." \nKindly be informed that we have recieved your contact demande. Our Administrator will contact you in the brief delay.\n \nBest regards,");

	$result = $mailer->send($message);

	header('Location: index.html');
	exit();

}

?>


	