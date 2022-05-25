<?php 
require("../dist/includes/PHPMailer-master/PHPMailerAutoload.php");
include '../dist/includes/dbcon.php';  
$today=date("F d, Y");
$date=date("Y-m-d");    
              $i=0;
              $total=0;
              $grand=0;
$mail = new PHPMailer();


$message= "Good day! Below is the summary of SINHS Tracking System for today,             
";

// set mailer to use SMTP
//$mail->IsSMTP();

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = gethostbyname("smtp.gmail.com");  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication

// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "emoblazz14@gmail.com";  // SMTP username
$mail->Password = "july302011A!"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
$email = "emoblazz@gmail.com";
//$mail->From = "bsischmsc.gmail.com";
$mail->SetFrom("302685.sanjhs@deped.gov.ph", "San Isidro NHS, Pontevedra");
// below we want to set the email address we will be sending our email to.
$mail->AddAddress("$email");

// set word wrap to 50 characters
$mail->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "SINHS Tracking System Summary";

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

?>