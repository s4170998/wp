<?php
require __DIR__ . '/includes/db_connect.inc';

$required = ['title','description','category','rate','level'];
foreach ($required as $f) { if (!isset($_POST[$f]) || $_POST[$f]==='') { exit('Missing required field'); } }

$title = trim($_POST['title']);
$description = trim($_POST['description']);
$category = trim($_POST['category']);
$rate = (float)$_POST['rate'];
$level = trim($_POST['level']);

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) { exit('Image upload failed.'); }

$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png','gif','webp'];
if (!in_array($ext, $allowed, true)) { exit('Invalid image type.'); }

$base = preg_replace('/[^a-z0-9]+/i','-', strtolower($title));
$filename = $base . '-' . time() . '.' . $ext;

$targetDir = __DIR__ . '/assets/images/skills';
if (!is_dir($targetDir)) { mkdir($targetDir, 0777, true); }

$dest = $targetDir . '/' . $filename;
if (!move_uploaded_file($_FILES['image']['tmp_name'], $dest)) { exit('Failed to save uploaded file.'); }

$relPath = 'assets/images/skills/' . $filename;

$sql = "INSERT INTO skills (title, description, category, rate_per_hr, level, image_path) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss dss", $title, $description, $category, $rate, $level, $relPath);
$stmt->execute();
$newId = $stmt->insert_id;
$stmt->close();

header('Location: details.php?id='.(int)$newId);
exit;



