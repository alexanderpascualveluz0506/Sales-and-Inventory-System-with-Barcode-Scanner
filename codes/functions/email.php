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
	$mail->Username = "xanderpascual2018@gmail.com";
//Set gmail password
	$mail->Password = "foracademic";
//Email subject
	$mail->Subject = "Purchase Order";
//Set sender email
	$mail->setFrom('xanderpascual2018@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addStringAttachment($pdfString,$filename);
//Email body
	$mail->Body = "<h1>Erlinda's Grocery Store</h1>";
//Add recipient
	$mail->addAddress('xanderpascual2018@gmail.com');
//Finally send email
	if ( $mail->send() ) {
		
	}else{
	
	}
//Closing smtp connection
	$mail->smtpClose();
?>
