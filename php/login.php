<?php

// Connect database
include 'connect.php';

// If click login button
if(isset($_POST['login'])){

    // Define variable based on user ipnut
    $userEmail=$_POST['email'];
    $userPass=$_POST['password'];

    // Hash input password
    $userHash=md5($userPass);

    // Login
    $query="SELECT * FROM users WHERE userEmail='$userEmail' AND userHash='$userHash'";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count==0){
        header('location ../login.php?password%not%match%or%user%not%exist');
        exit();
    }

    // get login information
    $row=mysqli_fetch_assoc($result);

    // Start session
    session_start();
    $_SESSION['userId']=$row['userId'];

    // Go to profile
    header('location: ../profile.php?login%successful');
    exit();
}