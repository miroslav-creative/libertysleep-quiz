<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$data = json_decode(file_get_contents('php://input'), true);

if($data["name"] && $data["email"]) {
	//PHPMailer Object
	$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

	//From email address and name
	$mail->From = "info@libertysleep.ca";
	$mail->FromName = "Liberty Sleep";

	//To address and name
	$mail->addAddress("recepient1@example.com", "Recepient Name");
	$mail->addAddress("recepient1@example.com"); //Recipient name is optional

	//Address to which recipient will reply
	$mail->addReplyTo("info@libertysleep.ca", "Reply");

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = "Quiz Result";
	$mail->Body = "You have answered Yes to 0<br/>Therefore, you are at ";
	$mail->AltBody = "This is the plain text version of the email content";

	try {
	    $mail->send();
	    echo "Message has been sent successfully";
	} catch (Exception $e) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}
}