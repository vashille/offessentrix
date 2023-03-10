<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//require 'db.php';
require '../phpmailer/vendor/autoload.php';

$email = 'erardme@gmail.com';
$otp = '11222';
 sendEmail($email, $otp);
 
 
function sendEmail($email, $otp){
   
$mail = new PHPMailer(true);

try{
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Username ='hanserard@gmail.com';
$mail->Password = 'pfopazebeljsahcd';
$mail->SMTPAuth=true;
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->setFrom('hanserard@gmail.com', 'TUTS');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject='Your OTP Code';
$mail->Body = "Here is your OTP code: <br> $otp";
$mail->send();
}catch(Exception $e)
    {echo $e;}
	
	
	
}


?>