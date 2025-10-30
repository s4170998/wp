<?php
require_once "includes/tools.inc";
require_once "includes/db_connect.inc";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['error'] = "Invalid request.";
  header("Location: register.php");
  exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username || !$password) {
  $_SESSION['error'] = "Please fill in all fields.";
  header("Location: register.php");
  exit;
}

$stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $_SESSION['error'] = "Username already taken.";
  header("Location: register.php");
  exit;
}

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
  $_SESSION['message'] = "Account created successfully. Please log in.";
  header("Location: login.php");
  exit;
} else {
  $_SESSION['error'] = "Error creating account.";
  header("Location: register.php");
  exit;
}
?>
