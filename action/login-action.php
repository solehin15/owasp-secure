<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* Connect to database */
include 'conn.php';

/* Define variable from input */
$userEmail=mysqli_real_escape_string($conn, $_POST['email']);
$userPass=mysqli_real_escape_string($conn, $_POST['password']);
$userPass=sha1($userPass);

/* Select user that match the case */
$sql="SELECT * FROM users WHERE userEmail=? AND userPass=?";

/* Create prepared statement */
$stmt=mysqli_stmt_init($conn);
/* Prepare statement */
mysqli_stmt_prepare($stmt,$sql);
/* Bind parameters to the placeholder  */
mysqli_stmt_bind_param($stmt, "ss", $userEmail, $userPass);
/* Run parametesr inside database */
mysqli_stmt_execute($stmt);
/* Query a result */
$result = mysqli_stmt_get_result($stmt);

/* Count number of rows */
$count=mysqli_num_rows($result);

/* If no results, go to `login` page */
if($count==0){
    $_SESSION['error-message']='User not existed or password not match';
    header('location: ../login.php');
    exit();
}

/* Login (fetch userid from database) */
$row=mysqli_fetch_assoc($result);

/* Get user Email */
$email=$row['userEmail'];

/* Get user IP */
$userIP=$row['userIP'];

/* Get client IP address */
$currentIP = $_SERVER['HTTP_CLIENT_IP'] 
    ?? $_SERVER["HTTP_CF_CONNECTING_IP"]
    ?? $_SERVER['HTTP_X_FORWARDED'] 
    ?? $_SERVER['HTTP_X_FORWARDED_FOR'] 
    ?? $_SERVER['HTTP_FORWARDED'] 
    ?? $_SERVER['HTTP_FORWARDED_FOR'] 
    ?? $_SERVER['REMOTE_ADDR'] 
    ?? '0.0.0.0';

if($userIP!=$currentIP){

    /* Generate Hashed Uniqe Id */
    $tfa=rand(100000,999999);

    /* Update into database */
    $sql="UPDATE users SET user2FA='$tfa' WHERE userEmail='$email'";
    $result=mysqli_query($conn,$sql);

    /* Set Email Content */
    $subject = 'Verify it is you!';
    $body    = 'Hi <b>'.$email.'</b>,<br>This is your verification code:<br><br><b>'.$tfa.'</b><br><br>If you did not make this request, you may ignore this message.<br />Regards,<br />FYP Solehin.';
    $altbody = '';

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
    $_SESSION['pending-userId']=$row['userId'];
    header('location: ../verify.php');
    exit();
}else{

    /* start a session for userId as login indicator */
    $_SESSION['userId']=$row['userId'];

    /* Display Welcome message */
    $_SESSION['welcome']=true;
}


/* Go to profile */
header('location: ../home.php');
exit();

