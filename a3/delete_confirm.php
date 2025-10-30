<?php
require_once "includes/tools.inc";
require_once "includes/header.inc";

if (!isset($_GET['skill_id'])) {
  $_SESSION['error'] = "Invalid request.";
  header("Location: index.php");
  exit;
}

$skill_id = $_GET['skill_id'];

$stmt = $conn->prepare("SELECT skill_id, title FROM skills WHERE skill_id = ?");
$stmt->bind_param("i", $skill_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
  $_SESSION['error'] = "Skill not found.";
  header("Location: index.php");
  exit;
}
?>

<div class="container mt-4">
  <h2>Delete Skill</h2>
  <p>Are you sure you want to delete <strong><?=
    htmlspecialchars($row['title']) ?></strong>?</p>

  <form method="post" action="delete_process.php" class="d-inline">
    <input type="hidden" name="skill_id" value="<?= $row['skill_id'] ?>">
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>

  <a href="details.php?skill_id=<?= $row['skill_id'] ?>" class="btn btn-secondary">
    Cancel
  </a>
</div>

<?php require_once "includes/footer.inc"; ?>
