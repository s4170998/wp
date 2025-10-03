<?php
require __DIR__ . '/includes/db_connect.inc';

function fail($msg){
  header("Location: add.php?err=" . urlencode($msg));
  exit;
}

$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
$category = trim($_POST['category'] ?? '');
$rate = trim($_POST['rate_per_hr'] ?? '');
$level = trim($_POST['level'] ?? '');

if ($title==='' || $description==='' || $category==='' || $rate==='' || $level==='') {
  fail('All fields are required.');
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
  fail('Image upload failed.');
}

$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png','gif','webp','ico'];
if (!in_array($ext, $allowed)) {
  fail('Invalid image type.');
}


$dir = __DIR__ . '/assets/images/skills';
if (!is_dir($dir)) {
  mkdir($dir, 0777, true);
}

$basename = bin2hex(random_bytes(8)) . '.' . $ext;
$dest_abs = $dir . '/' . $basename;
$dest_rel = 'assets/images/skills/' . $basename;

if (!move_uploaded_file($_FILES['image']['tmp_name'], $dest_abs)) {
  fail('Could not save file.');
}


$skill_id = 'S' . time();

$stmt = $mysqli->prepare("
  INSERT INTO skills (skill_id, title, description, category, image_path, rate_per_hr, level, created_at)
  VALUES (?,?,?,?,?,?,?, NOW())
");
$stmt->bind_param("sssssss", $skill_id, $title, $description, $category, $dest_rel, $rate, $level);
$stmt->execute();


header("Location: details.php?skill_id=" . urlencode($skill_id));
exit;
