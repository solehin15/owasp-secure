<?php

// Define variable for database
$dbHostName="localhost";
$dbUserName="root";
$dbPassword="";
$dbDatabase="owasp-secure";

// Connect database
$connect=mysqli_connect($dbHostName, $dbUserName, $dbPassword, $dbDatabase);