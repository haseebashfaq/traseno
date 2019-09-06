<?php
if(isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userMessage'])) {
	include('PHPMailer/class.smtp.php');
	include('PHPMailer/class.phpmailer.php');
	include('PHPMailer/PHPMailerAutoload.php');
	//PHPMailer Object
	$mail = new PHPMailer;

	$name = $_POST['userName'];
	$email = $_POST['userEmail'];
	$phone = $_POST['userTelephone'];
	$message = $_POST['userMessage'];

	//From email address and name
	$mail->From = "haseebashfaqkhanzada@gmail.com";
	$mail->FromName = "Traseno Contact Form";

	//To address and name
	$mail->addAddress("haseeb.khanzada@ymail.com", "Haseeb");
	$mail->addAddress("info@traseno.com", "Traseno Admin"); //Recipient name is optional

	//Address to which recipient will reply
	$mail->addReplyTo($email, $name);

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = "Traseno Contact Form Message";
	$mail->Body = "Hello Traseno Admin,<br><br>You have got a new message from Traseno contact form. Please have a look at the details:<br><br>Name: ".$name."<br>Email Address: ".$email."<br>Phone Number: ".$phone."<br>Message: ".$message."";
	// $mail->AltBody = "This is the plain text version of the email content";

	if(!$mail->send()) 
	{
	   echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
	   echo "sent";
	}
} else {
	return false;
}
?>