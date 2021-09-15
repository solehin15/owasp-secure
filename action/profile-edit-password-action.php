<?php

/* Connect to database */
include 'conn.php';

/* Define variables userId */
$userId=$_SESSION['userId'];

/* Define variables based on input */
$OldPassword=$_POST['OldPassword'];
$NewPassword=$_POST['NewPassword'];
$ConfirmPassword=$_POST['ConfirmPassword'];

/* Make hash for old password */
$OldHash=sha1($OldPassword);

/* Search userpass */
$sql="SELECT * FROM users WHERE userId='$userId'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if($OldHash!=$row['userPass']){
    $_SESSION['error-message']='Old password does not match.';
    header('location: ../profile-edit-password.php');
    exit();
}

if($NewPassword!=$ConfirmPassword){
    $_SESSION['error-message']='New password does not match.';
    header('location: ../profile-edit-password.php');
    exit();
}

/* Make hash for new password */
$NewHash=sha1($NewPassword);

$sql="UPDATE users SET userPass='$NewHash' WHERE userId='$userId'";
$result=mysqli_query($conn,$sql);
$_SESSION['success-message']='Password updated.';
header('location: ../profile.php');
exit();


