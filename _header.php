<?php
    include 'action/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>
            Kedai Komputer
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style/main.css">
    </head>
    <body>


<?php



if(isset($_GET['search'])){
    $search=$_GET['search'];
}else{
    $search='';
}

    /* Check if user is logged in */
if(isset($_SESSION['userId'])){
    /* Print default navigation with `logout`  and `profile` if user logged in */
    print('
        <nav>
            <div class="container">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="home.php">Home</a>
                    <a href="product.php">Product</a>
                    <a href="contact.php">Contact</a>
                    <a href="profile.php">Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Kedai Komputer</span>            
                <form class="search-container" action="action/search-action.php" method="post">
                    <input type="text" name="search" placeholder="Search..." value="'.$search.'"/><button type="submit">Search</button>
                </form>
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
                    <a href="home.php">Home</a>
                    <a href="product.php">Product</a>
                    <a href="contact.php">Contact</a>
                    <a href="register.php">Register</a>
                    <a href="login.php">Login</a>
                </div>
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Kedai</span>            
                <form class="search-container" action="action/search-action.php" method="post">
                    <input type="text" name="search" placeholder="Search..." value="'.$search.'"/><button type="submit">Search</button>
                </form>
            </div>
        </nav>
    ');
}

?>