
<?php

include '../../config/config_path.php';
require_once '../libs/class.phpmailer.php';
require_once '../libs/class.pop3.php';
require_once '../libs/class.smtp.php';

//GET PARAMS
$name=$_GET['name'];
$email=$_GET['email'];
$subject=$_GET['subject'];
$message=$_GET['menssage'];
$mode=$_GET['mode'];

//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//DEBUG MODE
// 0 = off (Production)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 2;
//HOST SERVER
$mail->Host       ='smtp.gmail.com';
//587 or 465
$mail->Port       =  '587';
//TLS or SSL
$mail->SMTPSecure =  'tls';
//IF GMAIL SET TRUE
$mail->SMTPAuth   =  'true';
//EMAIL ADDRESS
$mail->Username   =  '';
//EMAIL PASSWORD
$mail->Password   =  '';
//FROM EMAIL AND FROM NAME
$mail->SetFrom('email@gmail.com', 'Oliver');

//IF YOUR NEED TO SEND A COPY USE THE NEXT LINE
//$mail->AddReplyTo('replyto@example.com','name reply');
//TO EMAIL AND NAME
$mail->AddAddress($email, $name);
//

$prueba=app_dir;

$mail->Subject = 'SUBJECT';
$file=str_replace('[NAME]',  $name,file_get_contents(app_dir.'application/views/emailTemplates/email.php'));
$file=str_replace('[EMAIL]',  $email,$file);
$file=str_replace('[SUBJECT]',  $subject,$file);
$file=str_replace('[MESSAGE]',  $message,$file);

$mail->MsgHTML($file);
$mail->CharSet = 'UTF-8';
//$mail->AltBody = 'This is a plain-text message body';
//Send email
if(!$mail->Send()) {
         echo $mail->ErrorInfo;
} else {
         echo 1;
}


