<?php require __DIR__ . '/includes/header.inc'; ?>

<h2 class="mb-4">Add a Skill</h2>

<form class="needs-validation" action="process_add.php" method="post" enctype="multipart/form-data" novalidate>
  <div class="row g-3">
    <div class="col-lg-6">
    <label class="form-label" for="title">Title *</label>
    <input required class="form-control" id="title" name="title" placeholder="Enter skill title">
    <div class="invalid-feedback">Please enter a title.</div>
    </div>

    <div class="col-lg-6">
      <label class="form-label" for="category">Category *</label>
      <input required class="form-control" id="category" name="category" placeholder="Enter category">
      <div class="invalid-feedback">Please enter a category.</div>
    </div>

    <div class="col-12">
      <label class="form-label" for="description">Description *</label>
      <textarea required class="form-control" id="description" name="description" rows="5" placeholder="Describe the skill"></textarea>
      <div class="invalid-feedback">Please enter a description.</div>
    </div>

    <div class="col-lg-4">
      <label class="form-label" for="rate">Rate per hour ($) *</label>
      <input required class="form-control" id="rate" name="rate" type="number" step="0.01" min="0" placeholder="e.g. 25.00">
      <div class="invalid-feedback">Please enter a valid rate.</div>
    </div>

    <div class="col-lg-4">
      <label class="form-label" for="level">Level *</label>
      <select required class="form-select" id="level" name="level">
        <option value="">Please select</option>
        <option>Beginner</option>
        <option>Intermediate</option>
        <option>Expert</option>
      </select>
      <div class="invalid-feedback">Please select a level.</div>
    </div>

    <div class="col-lg-4">
      <label class="form-label" for="image">Skill image *</label>
      <input required
             class="form-control"
             id="image"
             name="image"
             type="file"
             accept=".jpg,.jpeg,.png,.gif,.webp"
             data-allowed="jpg,jpeg,png,gif,webp">
      <div class="invalid-feedback">Only JPG, JPEG, PNG, GIF or WEBP files up to 4MB are allowed.</div>
      <div class="form-text">Images are saved under <code>assets/images/skills/</code></div>
    </div>

    <div class="col-12">
    <button type="submit" class="btn btn-brand mt-2">Submit</button>
    </div>
  </div>
</form>

<?php require __DIR__ . '/includes/footer.inc'; ?>


