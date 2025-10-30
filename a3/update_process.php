<?php
require_once "includes/tools.inc";
require_once "includes/db_connect.inc";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['error'] = "Invalid request.";
  header("Location: gallery.php");
  exit;
}

$skill_id    = $_POST['skill_id'] ?? '';
$title       = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$category    = $_POST['category'] ?? '';
$rate        = $_POST['rate_per_hr'] ?? '';
$level       = $_POST['level'] ?? '';

if (!$skill_id || !$title || !$description || !$category || !$rate || !$level) {
  $_SESSION['error'] = "Please fill in all fields.";
  header("Location: update_form.php?skill_id=" . urlencode($skill_id));
  exit;
}

$newImage = null;
if (isset($_FILES['image']) && !empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
  $filename = basename($_FILES['image']['name']);
  $target   = "assets/images/" . $filename;
  if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $_SESSION['error'] = "Image upload failed.";
    header("Location: update_form.php?skill_id=" . urlencode($skill_id));
    exit;
  }
  $newImage = $filename;
}

if ($newImage) {
  $stmt = $conn->prepare("UPDATE skills SET title=?, description=?, category=?, rate_per_hr=?, level=?, image=? WHERE skill_id=?");
  $stmt->bind_param("sssissi", $title, $description, $category, $rate, $level, $newImage, $skill_id);
} else {
  $stmt = $conn->prepare("UPDATE skills SET title=?, description=?, category=?, rate_per_hr=?, level=? WHERE skill_id=?");
  $stmt->bind_param("sssssi", $title, $description, $category, $rate, $level, $skill_id);
}

if ($stmt->execute()) {
  $_SESSION['message'] = "Skill updated.";
  header("Location: details.php?skill_id=" . urlencode($skill_id));
  exit;
} else {
  $_SESSION['error'] = "Update failed.";
  header("Location: update_form.php?skill_id=" . urlencode($skill_id));
  exit;
}
