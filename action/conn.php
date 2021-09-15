<?php
/*
    Universal function starts here
*/

/* Connect Database */
$conn=mysqli_connect('localhost', 'root', '', 'owasp-secure');

/* Start Session */
session_start();

/* Set default timezone to `Asia/Kuala Lumpur` */
date_default_timezone_set('Asia/Kuala_Lumpur');