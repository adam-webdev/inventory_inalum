<?php

$username = 'root';
$pw = '';
$servername = 'localhost';
$dbname = 'inventory_inalum';

$conn = new mysqli($servername, $username, $pw, $dbname);

if ($conn->connect_error) {
  die('Connection failed : ' . $conn->connect_error);
}