<?php
require_once "includes/tools.inc";
require_once "includes/header.inc";

if (!isset($_GET['skill_id'])) {
  $_SESSION['error'] = "Invalid request.";
  header("Location: gallery.php");
  exit;
}

$skill_id = $_GET['skill_id'];

$stmt = $conn->prepare("SELECT skill_id, title, description, category, rate_per_hr, level, image FROM skills WHERE skill_id = ?");
$stmt->bind_param("i", $skill_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
  $_SESSION['error'] = "Skill not found.";
  header("Location: gallery.php");
  exit;
}
?>

<div class="container mt-4">
  <h2><?= htmlspecialchars($row['title']) ?></h2>

  <div class="row mt-3">
    <div class="col-md-5 mb-3">
      <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" class="img-fluid rounded" alt="">
    </div>

    <div class="col-md-7">
      <p><strong>Category:</strong> <?= htmlspecialchars($row['category']) ?></p>
      <p><strong>Level:</strong> <?= htmlspecialchars($row['level']) ?></p>
      <p><strong>Rate per Hour:</strong> $<?= htmlspecialchars($row['rate_per_hr']) ?></p>
      <p><strong>Description:</strong><br><?= nl2br(htmlspecialchars($row['description'])) ?></p>

      <a href="gallery.php" class="btn btn-secondary">Back</a>
      <a href="update_form.php?skill_id=<?= $row['skill_id'] ?>" class="btn btn-warning">Edit</a>
      <a href="delete_confirm.php?skill_id=<?= $row['skill_id'] ?>" class="btn btn-danger">Delete</a>
    </div>
  </div>
</div>

<?php require_once "includes/footer.inc"; ?>
