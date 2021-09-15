<?php

/* Start a session */
session_start();

/* Clear a session */
session_unset();

/* Destro a session */
session_destroy();

/* Go to login page */
header('location: ../login/?logout%successful');