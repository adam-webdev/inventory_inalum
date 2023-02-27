<?php

session_start();
session_destroy();
session_unset();
unset($_SESSION['name']);
// var_dump($_SESSION['name']);

header('location:login.php');
