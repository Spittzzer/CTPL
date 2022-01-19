<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}
$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));







$mail = new PHPMailer(True);
$mail->isSMTP();
$mail->Host = 'smtp.ionos.fr';
$mail->SMTPAuth = true;
$mail->Username = 'contact@bilel-aoun.me';
$mail->Password = '********';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

$mail->setFrom($email); 
$mail->Body= "Nom: $name\nEmail: $email\nSujet: $m_subject\nMessage: $message";
$mail->addAddress('billaoun@gmail.com');
if($mail->send()){
    echo 'ok';
}else{  
    echo 'error';
};

$mail->smtpClose();




























?>
