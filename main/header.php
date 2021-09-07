<?php

/* Start a session */
session_start();

/* Print main layout for header */
print('
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>
                Kedai Komputer
            </title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                *{
                    margin: 0;
                }
                body {
                    font-family: "Lato", sans-serif;
                }
                .container{
                    max-width: 1000px;
                    margin: auto;
                }
                nav{
                    background: #04AA6D;
                    padding: 10px;
                    color: #fff;
                }
                .sidenav {
                    height: 100%;
                    width: 0;
                    position: fixed;
                    z-index: 1;
                    top: 0;
                    left: 0;
                    background-color: #111;
                    overflow-x: hidden;
                    transition: 0.5s;
                    padding-top: 60px;
                }  
                .sidenav a {
                    padding: 8px 8px 8px 32px;
                    text-decoration: none;
                    font-size: 25px;
                    color: #818181;
                    display: block;
                    transition: 0.3s;
                }  
                .sidenav a:hover {
                    color: #f1f1f1;
                }  
                .sidenav .closebtn {
                    position: absolute;
                    top: 0;
                    right: 25px;
                    font-size: 36px;
                    margin-left: 50px;
                }
                .center{
                    border: solid 1px #ccc;
                    background: #fff;
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    transform: translateX(-50%) translateY(-50%);
                }
                .card{
                    padding: 20px;
                }
                .card h2{
                    margin: 5px 0 5px 0;
                }
                .card label{
                    margin: 5px 0 5px 0;
                    display: inline-block;
                }
                .card input{
                    margin: 5px 0 5px 0;
                    padding: 10px;
                    width: 280px;
                    border: none;
                    background: #eee;
                }
                .card button{
                    margin: 5px 0 5px 0;
                    padding: 10px;
                    width: 300px;
                    border: none;
                    background: #04AA6D;
                    color: #fff;
                    cursor: pointer;
                }
                .card button:hover{
                    background: #333;
                }





                footer{
                    width: 100%;
                    position: fixed;
                    bottom: 0;
                    text-align: center;
                    padding: 20px 0 20px 0;
                    background: #333;
                    color: #fff;
                }
                .footer-bottom{
                    padding: 5px;
                }
                footer a{
                    color: #04AA6D;
                    text-decoration: none;
                }
                @media screen and (max-height: 450px) {
                    .sidenav {padding-top: 15px;}
                    .sidenav a {font-size: 18px;}
                }
            </style>
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