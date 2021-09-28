<?php

/* Connect to database */
include 'conn.php';

/* Define variables userId */
$search=$_POST['search'];

/* Redirect to product.php */
header('location: ../product.php?search='.$search);