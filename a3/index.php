<?php
require_once "includes/tools.inc";
require_once "includes/db_connect.inc";
require_once "includes/header.inc";
?>

<div class="container mt-4">
  <div class="row align-items-center g-4">
    <div class="col-12 col-lg-6">
      <h1 class="mb-3">Welcome to <span class="fw-bold">SkillSwap</span></h1>
      <p class="lead">Share your skills and learn from others in the community.</p>
      <a href="gallery.php" class="btn btn-primary me-2">View Gallery</a>
      <a href="add.php" class="btn btn-outline-secondary">Add Skill</a>
    </div>

    <div class="col-12 col-lg-6">
      <div class="p-4 bg-white rounded-4">
        <h4 class="mb-2">How it works</h4>
        <ul class="mb-0">
          <li>Browse available skills</li>
          <li>View details and contact skill providers</li>
          <li>Add your own skill listing when logged in</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php require_once "includes/footer.inc"; ?>

