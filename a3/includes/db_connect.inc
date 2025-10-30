<?php
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "s4170998";
} else {
  $servername = "talsprddb02.int.its.rmit.edu.au";
  $username   = "s4170998";
  include("/home/s4/s4170998/public_html/.htdb_pass");
  $dbname     = "s4170998";
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
