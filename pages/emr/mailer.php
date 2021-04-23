<?php
require 'phpmailer/PHPMailerAutoload.php';

$risk            = $_GET['risk'];
$chief_complaint = $_GET['chief_complaint'];
$caller_no       = $_GET['caller_no'];
$patient_name    = $_GET['patient_name'];
$is_email_to     = $_GET['is_email_to'];
$is_email_cc     = $_GET['is_email_cc'];
$ssid            = $_GET['ssid'];
$key             = $_GET['key'];
$alias           = $_GET['alias'];

//$mail->SMTPDebug = 3;
$mail            = new PHPMailer;
$mail->isSMTP();
$mail->Host 		= 'smtp.gmail.com';
$mail->SMTPAuth 	= true;
$mail->Username 	= $ssid;
$mail->Password 	= $key;
$mail->SMTPSecure 	= 'ssl';
$mail->Port 		= 465;
$mail->SMTPOptions  = array( // enforce smtp
			 'ssl'  => array('verify_peer'       => false,
					         'verify_peer_name'  => false,
					         'allow_self_signed' => true));

$mail->From 		= $ssid;
$mail->FromName 	= $alias;
$mail->addAddress($is_email_to);
$mail->AddCC($is_email_cc);
$mail->addAddress($ssid, $alias );
$mail->WordWrap 	= 150;
$mail->isHTML(true);
$mail->Subject      = $risk.$chief_complaint.' - '.$caller_no.' - '.$patient_name;

ob_start();
include('body.php');
$content = ob_get_clean();
$mail->Body = $content;

$mail->AddEmbeddedImage('../../img/emr/email-logo2.png', 'logo');

if(!$mail->send())
    {
        header("Location: index.php?create=fail");
        echo 'Mailer error: '.$mail->ErrorInfo;
    }

else
    
    {
        header("Location: index.php?create=ok");
    }
?>