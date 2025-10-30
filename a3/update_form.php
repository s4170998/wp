<?php
require_once "includes/tools.inc";
require_once "includes/db_connect.inc";

if (!isset($_GET['skill_id'])) {
  $_SESSION['error'] = "Invalid request.";
  header("Location: gallery.php");
  exit;
}

$skill_id = $_GET['skill_id'];

$stmt = $conn->prepare("SELECT skill_id, title, description, category, rate_per_hr, level, image FROM skills WHERE skill_id=?");
$stmt->bind_param("i", $skill_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
  $_SESSION['error'] = "Skill not found.";
  header("Location: gallery.php");
  exit;
}

$title = "Edit Skill";
require_once "includes/header.inc";
?>

<main class="container py-4">
  <h2 class="mb-3">Edit Skill</h2>

  <form action="update_process.php" method="post" enctype="multipart/form-data" class="col-lg-8 mx-auto">
    <input type="hidden" name="skill_id" value="<?= $row['skill_id'] ?>">

    <div class="mb-3">
      <label class="form-label">Skill Title</label>
      <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($row['title']) ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($row['description']) ?></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Category</label>
      <select name="category" class="form-select" required>
        <option value="Art" <?= $row['category']=="Art" ? "selected" : "" ?>>Art</option>
        <option value="Music" <?= $row['category']=="Music" ? "selected" : "" ?>>Music</option>
        <option value="Cooking" <?= $row['category']=="Cooking" ? "selected" : "" ?>>Cooking</option>
        <option value="Coding" <?= $row['category']=="Coding" ? "selected" : "" ?>>Coding</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Rate per Hour ($)</label>
      <input type="number" name="rate_per_hr" step="0.01" min="0" class="form-control" value="<?= $row['rate_per_hr'] ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Skill Level</label>
      <select name="level" class="form-select" required>
        <option value="Beginner" <?= $row['level']=="Beginner" ? "selected" : "" ?>>Beginner</option>
        <option value="Intermediate" <?= $row['level']=="Intermediate" ? "selected" : "" ?>>Intermediate</option>
        <option value="Expert" <?= $row['level']=="Expert" ? "selected" : "" ?>>Expert</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Current Image</label><br>
      <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" width="150" class="rounded mb-2">
      <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-brand">Save Changes</button>
    <a href="details.php?skill_id=<?= $row['skill_id'] ?>" class="btn btn-secondary">Cancel</a>
  </form>
</main>

<?php require_once "includes/footer.inc"; ?>
