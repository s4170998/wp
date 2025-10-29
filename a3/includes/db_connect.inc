<?php
if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
  
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "s4170998"; 
} else {
  
  $servername = "talsprddb02.int.its.rmit.edu.au";
  $username   = "s4170998"; 
  
  include("/home/s417/s4170998/public_html/.htdb_pass");
  $dbname     = "s4170998"; 
}
$conn = @new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  if (strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
    die("Database connection failed: " . $conn->connect_error);
  } else {
    die("Database connection failed.");
  }
}
?>