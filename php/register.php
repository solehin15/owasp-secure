<?php

// Connect to database
include 'connect.php';

// If click register button
if(isset($_POST['register'])){

    // Define variables based on input
    $userName=$_POST['username'];
    $userEmail=$_POST['email'];
    $userPhone=$_POST['phone'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];

    // Check if email is used
    $query="SELECT * FROM users WHERE userEmail='$userEmail'";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count!=0){
        header('location: ../register.php?email%already%exist');
        exit();
    }

    // Check if password not match
    if($password!=$confirm){
        header('location: ../register.php?password%not%match');
        exit();
    }

    // Encrypt password
    $userHash=md5($password);

    // If no problem, save user information
    $query="INSERT INTO users (userName, userEmail, userPhone, userHash) VALUES ('$userName', '$userEmail', '$userPhone', '$userHash')";
    $result=mysqli_query($connect,$query);

    // Go to login page
    header('location: ../login.php?register%successful');
    exit();
}