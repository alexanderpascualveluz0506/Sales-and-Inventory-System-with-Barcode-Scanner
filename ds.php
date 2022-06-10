<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "hagonoyj@gmail.com";
//Set gmail password
	$mail->Password = "02051992joy";
//Email subject
	$mail->Subject = "Purchase Order";
//Set sender email
	$mail->setFrom('hagonoyj@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
//Email body
	$mail->Body = "<h1>Erlinda's Grocery Store</h1>";
//Add recipient
	$mail->addAddress('hagonoyj@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		echo "send";
	}else{
		echo "not";
	}
//Closing smtp connection
	$mail->smtpClose();
?>
