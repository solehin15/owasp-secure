<?php

/* Connect to database */
include 'conn.php';

/* Get User Email Info */
$email=$_POST['email'];

/* Generate Hashed Uniqe Id */
$forgot=sha1(uniqid());

/* Update into database */
$sql="UPDATE users SET userForgot='$forgot' WHERE userEmail='$email'";
$result=mysqli_query($conn,$sql);

/* Set Email Content */
$subject = 'Forgot your password? We have got you covered!';
$body    = 'Hi <b>'.$email.'</b>,<br>Click on the button below to reset your password.<br><div class="button-container"><a style="margin: 10px;padding: 10px; display: inline-block;background: #04aa6d;color: #fff;cursor: pointer; text-decoration: none; border-radius: 5px;" href="http://localhost/dir/owasp-secure-fyp-2021-sep/retrive.php?forgot='.$forgot.'">Reset Password</a></div><br>If the button above does not appear to be clickable, please copy this URL:<br /><br />http://localhost/dir/owasp-secure-fyp-2021-sep/retrive.php?forgot='.$forgot.'<br><br>and paste it in your web browser.<br><br>If you did not make this request, you may ignore this message and your password will remain the same.<br />Regards,<br />FYP Solehin.';
$altbody = '';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'fyp.solehin@gmail.com';                     //SMTP username
    $mail->Password   = 'solehin95';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('fyp.solehin@gmail.com', 'FYP Solehin');
    $mail->addAddress($email);     //Add a recipient
    $mail->addReplyTo('fyp.solehin@gmail.com', 'FYP Solehin');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $altbody;

    $mail->send();
    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    header('location: ..');
    exit();