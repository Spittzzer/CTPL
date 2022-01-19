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
$mail->Password = 'Bilel22580928';
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


////////////////////////////////works but not hosted/////////////////////////////////////////////////

// if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
//   http_response_code(500);
//   exit();
//   }
 
//  $name = strip_tags(htmlspecialchars($_POST['name']));
//    $email = strip_tags(htmlspecialchars($_POST['email']));
//   $m_subject = strip_tags(htmlspecialchars($_POST['subject']));
//   $message = strip_tags(htmlspecialchars($_POST['message']));
 
//   $to = "billaoun@gmail.com";
//   $subject = "$m_subject: $name";
//  $body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName:
//  $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
//  $header = "From: $email";
//  $header .= "Reply-To: $email";
 
 
 
//  if(!mail($to, $subject, $body, $header)){
//  http_response_code(500);
 
//  }
//  header('Access-Control-Allow-Origin: *');
 
//  header('Access-Control-Allow-Methods: GET, POST');
 
//  header("Access-Control-Allow-Headers: X-Requested-With");


///////////////////not working/////////////////////////////////////////////////////////////



// if(isset($_POST["name"]) && !empty($_POST["name"])&&isset($_POST["subject"])&&
//!empty($_POST["subject"])&&isset($_POST["message"])&&!empty($_POST["message"])){
// $to = 'billaoun@gmail.com';
// $first= $_POST['firstname'];
// $last = $_POST['lastname'];
// $email = $_POST['email'];
// $message = $_POST['message'];


// $data = array(
// 'first' => $first,
// 'last' => $last,
// 'email' => $email
// );

// $result = mail($to,$first, $message, $data);


// header('Content-type:application/json;charset=utf-8');
// echo json_encode($result);

























?>