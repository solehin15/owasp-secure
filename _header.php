<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ini Tajuk</title>
    <link rel="stylesheet" type="text/css" href="test.css">
    <style>
        *{
            margin: 0;
        }
        body{
            font-family: Arial;
        }

        .container{
            max-width: 1200px;
            margin: auto;
        }
        nav{
            background: #111;
        }
        nav a{
            display: inline-block;
            background: #111;
            padding: 10px;
            text-decoration: none;
            color: #fff;
        }
        nav a:hover{
            background: #333;
        }
        .login-button{
            float: right;
        }
        .center{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
        }
        .card{
            padding: 50px;
            border: solid 1px #ccc;
        }
        .card h2{
            margin-bottom: 5px;
        }
        .card label{
            display: inline-block;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .card input{
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 10px;
            border: none;
            border-radius: 0;
            background: #eee;
            width: 280px;
        }
        .card button{
            margin-top: 10px;
            border: none;
            border-radius: 0;
            padding: 10px;
            background: #4CAF50;
            width: 300px;
            color: #fff;
            cursor: pointer;
        }
        .card button:hover{
            background: #333;
        }
        footer{
            position: fixed;
            bottom: 0;
            background: #111;
            color: #fff;
            width: 100%;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        footer a{
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <nav>
        <div class="container">
            <a href="index.php">Home</a>
            <a href="product.php">Products</a>
            <a href="contact.php">Contacts</a>
            <?php
                if(!isset($_SESSION['userId'])){
                    echo '<a href="login.php" class="login-button">Login</a>';
                    echo '<a href="register.php" class="login-button">Register</a>';
                }else{
                    echo '<a href="logout.php" class="login-button">Logout</a>';
                    echo '<a href="profile.php" class="login-button">Profile</a>';
                }
            ?>
        </div>
    </nav>
