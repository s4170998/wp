<?php
require_once "includes/tools.inc";
require_once "includes/db_connect.inc";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['error'] = "Invalid request.";
  header("Location: login.php");
  exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
  $_SESSION['error'] = "Please enter username and password.";
  header("Location: login.php");
  exit;
}

$stmt = $conn->prepare("SELECT user_id, username, password_hash FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user || !password_verify($password, $user['password_hash'])) {
  $_SESSION['error'] = "Invalid username or password.";
  header("Location: login.php");
  exit;
}

$_SESSION['user_id'] = (int)$user['user_id'];
$_SESSION['username'] = $user['username'];

$_SESSION['message'] = "Welcome, " . $user['username'] . "!";
header("Location: index.php");
exit;
