<?php

/* Start a session */
session_start();

/* Clear a session */
session_unset();

/* Destro a session */
session_destroy();

/* Start a session */
session_start();

/* Set success message */
$_SESSION['success-message']='Logout successful';

/* Go to login page */
header('location: ../login.php');