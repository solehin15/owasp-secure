<?php

/* Connect to database */
include 'conn.php';

/* Get User Pending Ip */
$pending=$_SESSION['pending-userId'];

/* Get Input Code */
$tfa=$_POST['tfa'];

/* Get User 2FA Code from Database */
$sql="SELECT * FROM users WHERE userId='$pending'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$user2FA=$row['user2FA'];

/* Check if 2FA is match */
if($tfa!=$user2FA){
    $_SESSION['error-message']='Please try again. Code does not match.';
    header('location ../verify.php');
    exit();
}

/* Get Current IP */
$currentIP = $_SERVER['HTTP_CLIENT_IP'] 
    ?? $_SERVER["HTTP_CF_CONNECTING_IP"]
    ?? $_SERVER['HTTP_X_FORWARDED'] 
    ?? $_SERVER['HTTP_X_FORWARDED_FOR'] 
    ?? $_SERVER['HTTP_FORWARDED'] 
    ?? $_SERVER['HTTP_FORWARDED_FOR'] 
    ?? $_SERVER['REMOTE_ADDR'] 
    ?? '0.0.0.0';

$sql="UPDATE users SET userIP='$currentIP', user2FA='' WHERE userId='$pending'";
$result=mysqli_query($conn,$sql);

$_SESSION['userId']=$pending;

$_SESSION['welcome']=true;

/* Go to profile */
header('location: ../home.php');
exit();