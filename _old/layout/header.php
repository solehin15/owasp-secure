<?php

/*
    Make all pages running the same database and session
*/

include '../action/connect.php';    // Connect Database

session_start();                    // Start Session

/*
    Layout for header
*/
print('
    <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>
                    Kedai Komputer
                </title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="../style/main.css">
            </head>
            <body>
');

/* Check if user is logged in */
if(isset($_SESSION['userId'])){
    /* Print default navigation with `logout`  and `profile` if user logged in */
    print('
        <nav>
            <div class="container">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="../home">Home</a>
                    <a href="../product">Product</a>
                    <a href="../contact">Contact</a>
                    <a href="../profile">Profile</a>
                    <a href="../logout">Logout</a>
                </div>
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Kedai Komputer</span>
            </div>
        </nav>
    ');
}else{
    /* Print default navigation with `login` and `register` if user not logged in */
    print('
        <nav>
            <div class="container">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="../home">Home</a>
                    <a href="../product">Product</a>
                    <a href="../contact">Contact</a>
                    <a href="../register">Register</a>
                    <a href="../login">Login</a>
                </div>
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Kedai Komputer</span>
            </div>
        </nav>
    ');
}