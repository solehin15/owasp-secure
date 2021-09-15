<?php

/* Connect to database */
include 'conn.php';

/* Define variables based on input */
$userName=$_POST['username'];
$userEmail=$_POST['email'];
$userPhone=$_POST['phone'];
$userPass=$_POST['password'];
$userConfirm=$_POST['confirm'];

/* Check if username is used */
$sql="SELECT * FROM users WHERE userName='$userName'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count!=0){
    $_SESSION['error-message']='Username already exist';
    header('location: ../register.php');
    exit();
}

/* Check if email is used */
$sql="SELECT * FROM users WHERE userEmail='$userEmail'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count!=0){
    $_SESSION['error-message']='Email already exsited';
    header('location: ../register.php');
    exit();
}

/* Check if username is used */
$sql="SELECT * FROM users WHERE userPhone='$userPhone'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count!=0){
    $_SESSION['error-message']='Phone already exist';
    header('location: ../register.php');
    exit();
}

/* Check if password not match */
if($userPass!=$userConfirm){
    $_SESSION['error-message']='Password not match';
    header('location: ../register.php');
    exit();
}

/* Hash password using sha1 */
$userPass=sha1($userPass);

/* If no problem, save user information */
$sql="INSERT INTO users (userName, userEmail, userPhone, userPass) VALUES ('$userName', '$userEmail', '$userPhone', '$userPass')";
$result=mysqli_query($conn,$sql);

/* Go to login page */
$_SESSION['success-message']='Register successful';
header('location: ../login.php?register%successful');
exit();
