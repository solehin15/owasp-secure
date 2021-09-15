<?php

/* Start a session */
session_start();

/* Connect to database */
include '../main/database.php';

/* Define variable from input */
$userEmail=$_POST['email'];
$userPass=$_POST['password'];

/* Select user that match the case */
$sql="SELECT * FROM users WHERE userEmail='$userEmail' AND userPass='$userPass'";
$result=mysqli_query($db,$sql);

/* Count number of rows */
$count=mysqli_num_rows($result);

/* If no results, go to `login` page */
if($count==0){
    header('location: ../login/?user%not%existed%or%password%not%match');
    exit();
}

/* Login (fetch userid from database) */
$row=mysqli_fetch_assoc($result);

/* start a session for userId as login indicator */
$_SESSION['userId']=$row['userId'];

/* Go to profile */
header('location: ../profile/?login%successful');
exit();

