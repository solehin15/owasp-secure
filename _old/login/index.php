<?php

session_start();

if(!isset($_SESSION['userId'])){
    include('login.php');
}else{
    include('logout.php');
}