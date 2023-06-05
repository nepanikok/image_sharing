<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'savarankiskas';
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>