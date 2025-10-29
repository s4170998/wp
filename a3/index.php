<?php
require_once __DIR__ . '/includes/tools.inc';
require_once __DIR__ . '/includes/db_connect.inc';
$title = 'Home';
require_once __DIR__ . '/includes/header.inc';
?>
<main class="container py-4">
  <div class="row align-items-center g-4">
    <div class="col-12 col-lg-6">
      <h1 class="mb-3">Welcome to <span class="fw-bold">SkillSwap</span></h1>
      <p class="lead">Share a skill. Learn a skill. Browse the gallery or add your own listing once you sign in.</p>
      <a class="btn btn-primary me-2" href="gallery.php">View Gallery</a>
      <a class="btn btn-outline-secondary" href="add.php">Add Skill</a>
    </div>
    <div class="col-12 col-lg-6">
      <div class="p-4 bg-white rounded-4 shadow-soft">
        <h3 class="mb-2">Commit 1 scaffold</h3>
        <ul class="mb-0">
          <li>Includes wired: header, nav, footer, tools, DB connect</li>
          <li>Bootstrap + Google fonts + base CSS</li>
          <li>Ready for Commit 2: DB-backed pages</li>
        </ul>
      </div>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.inc'; ?>
