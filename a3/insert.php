<?php
require_once __DIR__ . '/includes/tools.inc';
require_once __DIR__ . '/includes/db_connect.inc';
require_login();

if (!is_post()) { $_SESSION['error'] = 'Invalid request.'; header('Location: add.php'); exit; }

$title       = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$category    = trim($_POST['category'] ?? '');
$rate        = trim($_POST['rate_per_hr'] ?? '');
$level       = trim($_POST['level'] ?? '');

if ($title === '' || $description === '' || $category === '' || $rate === '' || $level === '' || !isset($_FILES['image'])) {
  $_SESSION['error'] = 'All fields are required.'; header('Location: add.php'); exit;
}

$relDir  = 'assets/images/';
$absDir  = __DIR__ . '/' . $relDir;
if (!is_dir($absDir) || !is_writable($absDir)) {
  $_SESSION['error'] = 'Upload folder not writable: assets/images'; header('Location: add.php'); exit;
}

$f = $_FILES['image'];
if ($f['error'] !== UPLOAD_ERR_OK) { $_SESSION['error'] = 'Image upload failed.'; header('Location: add.php'); exit; }

$orig = $f['name'];
if (!allowed_image($orig)) { $_SESSION['error'] = 'Only jpg, jpeg, png, gif, webp allowed.'; header('Location: add.php'); exit; }

$clean = sanitize_filename($orig);
$final = unique_name($clean);
$dest  = $absDir . $final;

if (!move_uploaded_file($f['tmp_name'], $dest)) { $_SESSION['error'] = 'Could not save uploaded image.'; header('Location: add.php'); exit; }

$stmt = $conn->prepare("INSERT INTO skills (title, description, category, rate_per_hr, level, image) VALUES (?,?,?,?,?,?)");
$rateFloat = (float)$rate;
$stmt->bind_param("sssdss", $title, $description, $category, $rateFloat, $level, $final);

if ($stmt->execute()) {
  $_SESSION['message'] = 'Skill added successfully.'; header('Location: gallery.php'); exit;
} else {
  $_SESSION['error'] = 'Error adding skill.'; header('Location: add.php'); exit;
}

