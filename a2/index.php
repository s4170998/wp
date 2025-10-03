<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<h2>Welcome</h2>
<p>Browse the latest skills below.</p>

<section class="row row-cols-1 row-cols-md-4 g-4">
  <?php
  $res = $mysqli->query("
    SELECT skill_id, title, image_path, category
    FROM skills
    ORDER BY created_at DESC
    LIMIT 4
  ");
  if ($res && $res->num_rows):
    while ($c = $res->fetch_assoc()):
  ?>
    <div class="col">
      <div class="card h-100">
        <img src="<?= htmlspecialchars($c['image_path']) ?>" class="card-img-top" alt="">
        <div class="card-body">
          <h3 class="h6 mb-1"><?= htmlspecialchars($c['title']) ?></h3>
          <p class="text-muted small mb-2"><?= htmlspecialchars($c['category']) ?></p>
          <a class="stretched-link" href="details.php?skill_id=<?= urlencode($c['skill_id']) ?>">View Details</a>
        </div>
      </div>
    </div>
  <?php
    endwhile;
  else:
    echo "<p>No skills to display yet.</p>";
  endif;
  ?>
</section>

<?php require __DIR__ . '/includes/footer.inc'; ?>
