<?php

/* Connect to database */
include '../main/database.php';

// If click register button
if(isset($_POST['register'])){

    // Define variables based on input
    $userName=$_POST['username'];
    $userEmail=$_POST['email'];
    $userPhone=$_POST['phone'];
    $userPass=$_POST['password'];
    $userConfirm=$_POST['confirm'];

    // Check if email is used
    $query="SELECT * FROM users WHERE userEmail='$userEmail'";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count!=0){
        header('location: ../register.php?email%already%exist');
        exit();
    }

    // Check if password not match
    if($userPass!=$userConfirm){
        header('location: ../register.php?password%not%match');
        exit();
    }

    // If no problem, save user information
    $query="INSERT INTO users (userName, userEmail, userPhone, userPass) VALUES ('$userName', '$userEmail', '$userPhone', '$userPass')";
    $result=mysqli_query($connect,$query);

    // Go to login page
    header('location: ../login.php?register%successful');
    exit();
}