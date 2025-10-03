<?php
$pageTitle = 'SkillSwap | Home';
$active = 'home';
require __DIR__ . '/includes/header.inc';
require __DIR__ . '/includes/db_connect.inc';
?>

<div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/skills/1.png" class="d-block w-100 rounded shadow-sm" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="assets/images/skills/2.png" class="d-block w-100 rounded shadow-sm" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="assets/images/skills/3.png" class="d-block w-100 rounded shadow-sm" alt="Slide 3">
    </div>
    <div class="carousel-item">
      <img src="assets/images/skills/4.png" class="d-block w-100 rounded shadow-sm" alt="Slide 4">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<h2 class="mb-3">Latest Skills</h2>

<?php
$latest = $mysqli->query("SELECT skill_id, title, description, category, level, rate_per_hr, image_path FROM skills ORDER BY created_at DESC LIMIT 4");
?>

<?php if ($latest && $latest->num_rows): ?>
  <div class="row g-4">
    <?php while ($row = $latest->fetch_assoc()): ?>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm">
          <img src="<?php echo 'assets/images/skills/' . htmlspecialchars($row['image_path']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
            <p class="card-text small mb-2"><?php echo htmlspecialchars($row['description']); ?></p>
            <div class="d-flex justify-content-between small">
              <span><?php echo htmlspecialchars($row['level']); ?></span>
              <span>$<?php echo number_format((float)$row['rate_per_hr'], 2); ?>/hr</span>
            </div>
          </div>
          <div class="card-footer bg-transparent border-0">
            <a href="details.php?id=<?php echo (int)$row['skill_id']; ?>" class="btn btn-sm btn-outline-secondary w-100">View</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php else: ?>
  <p class="text-muted">No skills to display yet.</p>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.inc'; ?>


