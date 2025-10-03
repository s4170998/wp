<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<h2>Add a Skill</h2>

<?php if (isset($_GET['err'])): ?>
  <div class="alert alert-danger"><?= htmlspecialchars($_GET['err']) ?></div>
<?php endif; ?>

<form action="process_add.php" method="post" enctype="multipart/form-data" class="mb-4">
  <div class="mb-3">
    <label class="form-label">Title *</label>
    <input type="text" name="title" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Description *</label>
    <textarea name="description" rows="5" class="form-control" required></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Category *</label>
    <input type="text" name="category" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Rate per hour ($) *</label>
    <input type="number" step="0.01" name="rate_per_hr" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Level *</label>
    <select name="level" class="form-select" required>
      <option value="">Please select</option>
      <option>Beginner</option>
      <option>Intermediate</option>
      <option>Expert</option>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">Skill image *</label>
    <input type="file" name="image" accept=".jpg,.jpeg,.png,.gif,.webp" class="form-control" required>
    <div class="form-text">Images are saved under assets/images/skills/</div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php require __DIR__ . '/includes/footer.inc'; ?>
