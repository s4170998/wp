<?php
require_once "includes/tools.inc";
require_once "includes/header.inc";

if (!isset($_POST['skill_id'])) {
  $_SESSION['error'] = "Invalid request.";
  header("Location: index.php");
  exit;
}

$skill_id = $_POST['skill_id'];

$stmt = $conn->prepare("DELETE FROM skills WHERE skill_id = ?");
$stmt->bind_param("i", $skill_id);

if ($stmt->execute()) {
  $_SESSION['message'] = "Skill deleted successfully.";
} else {
  $_SESSION['error'] = "Error deleting skill.";
}

header("Location: gallery.php");
exit;
?>
