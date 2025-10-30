<?php
require_once "includes/tools.inc";
require_once "includes/header.inc";
$title = "Add Skill";
?>

<div class="container mt-4">
  <h2>Add Skill</h2>

  <form action="insert.php" method="post" enctype="multipart/form-data" class="col-lg-8 px-0">

    <div class="mb-3">
      <label for="title" class="form-label">Skill Title</label>
      <input type="text" id="title" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select id="category" name="category" class="form-select" required>
        <option value="">Select Category</option>
        <option value="Art">Art</option>
        <option value="Music">Music</option>
        <option value="Cooking">Cooking</option>
        <option value="Coding">Coding</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="rate" class="form-label">Rate per Hour ($)</label>
      <input type="number" id="rate" name="rate_per_hr" class="form-control" step="0.01" min="0" required>
    </div>

    <div class="mb-3">
      <label for="level" class="form-label">Skill Level</label>
      <select id="level" name="level" class="form-select" required>
        <option value="Beginner">Beginner</option>
        <option value="Intermediate" selected>Intermediate</option>
        <option value="Expert">Expert</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Skill Image</label>
      <input type="file" id="image" name="image" class="form-control" accept=".jpg,.jpeg,.png,.gif,.webp" required>
    </div>

    <button type="submit" class="btn btn-primary">Add Skill</button>
  </form>
</div>

<?php require_once "includes/footer.inc"; ?>

