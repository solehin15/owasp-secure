<?php

/* Connect to database */
include 'conn.php';

/* Define variables userId */
$forgot=$_POST['forgot'];

/* Define variables based on input */
$NewPassword=$_POST['NewPassword'];
$ConfirmPassword=$_POST['ConfirmPassword'];

if($NewPassword!=$ConfirmPassword){
    $_SESSION['error-message']='Password does not updated.';
    header('location: ../home.php');
    exit();
}

/* Make hash for new password */
$NewHash=sha1($NewPassword);

$sql="UPDATE users SET userPass='$NewHash', userForgot='' WHERE userForgot='$forgot'";
$result=mysqli_query($conn,$sql);

$_SESSION['success-message']='Password updated.';
header('location: ../login.php');
exit();


