<?php
require_once "includes/tools.inc";
require_once "includes/db_connect.inc";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['error'] = "Invalid request.";
  header("Location: login.php");
  exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username || !$password) {
  $_SESSION['error'] = "Please enter username and password.";
  header("Location: login.php");
  exit;
}

$stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
  $_SESSION['error'] = "Invalid username or password.";
  header("Location: login.php");
  exit;
}

if ($row['password'] !== $password) {
  $_SESSION['error'] = "Invalid username or password.";
  header("Location: login.php");
  exit;
}

$_SESSION['user_id'] = $row['user_id'];
$_SESSION['username'] = $row['username'];

$_SESSION['message'] = "Welcome, " . $row['username'] . "!";
header("Location: index.php");
exit;
?>
