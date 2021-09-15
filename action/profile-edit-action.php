<?php

/* Connect to database */
include 'conn.php';

/* Define variables based on input */
$userEmail=$_POST['userEmail'];

/* Define variables userId */
$userId=$_SESSION['userId'];

/* Search from users list, make sure there's no used username */
$sql="SELECT * FROM users WHERE userEmail='$userEmail'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count!=0){
    $_SESSION['error-message']='Email not updated';
    header('location: ../profile.php');
    exit();
}

/* Update username */
$sql="UPDATE users SET userEmail='$userEmail' WHERE userId='$userId'";
$result=mysqli_query($conn,$sql);


/* Go to profile */
$_SESSION['success-message']='Profile updated';
header('location: ../profile.php');
exit();