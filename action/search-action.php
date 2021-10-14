<?php

/* Connect to database */
include 'conn.php';

/* Define variables userId */
$search=mysqli_real_escape_string($conn,$_POST['search']);

/* Redirect to product.php */
header('location: ../product.php?search='.$search);