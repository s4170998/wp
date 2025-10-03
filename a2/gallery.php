<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<h2>Skill Gallery</h2>

<div class="row row-cols-2 row-cols-md-4 g-3">
  <?php
  $res = $mysqli->query("
    SELECT skill_id, title, image_path
    FROM skills
    WHERE image_path IS NOT NULL AND image_path <> ''
    ORDER BY created_at DESC
  ");
  if ($res && $res->num_rows):
    while ($row = $res->fetch_assoc()):
      $mid = 'm' . $row['skill_id'];
  ?>
    <div class="col">
      <a href="#" data-bs-toggle="modal" data-bs-target="#<?= $mid ?>">
        <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['title']) ?>" class="img-fluid rounded">
      </a>
      <p class="small mt-2">
        <a href="details.php?skill_id=<?= urlencode($row['skill_id']) ?>">
          <?= htmlspecialchars($row['title']) ?>
        </a>
      </p>
    </div>

    <div class="modal fade" id="<?= $mid ?>" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <button type="button" class="btn-close ms-auto me-2 mt-2" data-bs-dismiss="modal"></button>
          <div class="modal-body">
            <a href="details.php?skill_id=<?= urlencode($row['skill_id']) ?>">
              <img src="<?= htmlspecialchars($row['image_path']) ?>" class="img-fluid" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php
    endwhile;
  else:
    echo '<p>No images yet.</p>';
  endif;
  ?>
</div>

<?php require __DIR__ . '/includes/footer.inc'; ?>
