<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost";
$username = "debian-sys-maint";
$password = "CPpTUnmJ7snitWbL";
$dbname = "ahmmd"; 
/* Attempt to connect to MySQL database */
      session_start();
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

