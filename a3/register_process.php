<?php
require_once "includes/tools.inc";
require_once "includes/db_connect.inc";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['error'] = "Invalid request.";
  header("Location: register.php");
  exit;
}

$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $email === '' || $password === '') {
  $_SESSION['error'] = "Please fill in all fields.";
  header("Location: register.php");
  exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$exists = $stmt->get_result()->fetch_assoc();

if ($exists) {
  $_SESSION['error'] = "Username or email already exists.";
  header("Location: register.php");
  exit;
}

$stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $hash);

if ($stmt->execute()) {
  $_SESSION['message'] = "Account created successfully. Please log in.";
  header("Location: login.php");
  exit;
} else {
  $_SESSION['error'] = "Error creating account.";
  header("Location: register.php");
  exit;
}

