<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<?php
$skill_id = $_GET['skill_id'] ?? '';
$item = null;

if ($skill_id !== '') {
  $stmt = $mysqli->prepare("
    SELECT title, description, category, image_path, rate_per_hr, level, created_at
    FROM skills
    WHERE skill_id = ?
  ");
  $stmt->bind_param("s", $skill_id);
  $stmt->execute();
  $item = $stmt->get_result()->fetch_assoc();
}
?>

<h2>Details</h2>

<?php if ($item): ?>
  <h3><?= htmlspecialchars($item['title']) ?></h3>
  <p><?= nl2br(htmlspecialchars($item['description'] ?? '')) ?></p>

  <?php if (!empty($item['image_path'])): ?>
    <a href="#" data-bs-toggle="modal" data-bs-target="#imgModal">
      <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="" class="img-fluid rounded">
    </a>

    <div class="modal fade" id="imgModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <button type="button" class="btn-close ms-auto me-2 mt-2" data-bs-dismiss="modal"></button>
          <div class="modal-body">
            <img src="<?= htmlspecialchars($item['image_path']) ?>" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <p><strong>Category:</strong> <?= htmlspecialchars($item['category']) ?></p>
  <p><strong>Level:</strong> <?= htmlspecialchars($item['level']) ?></p>
  <p><strong>Rate:</strong> $<?= htmlspecialchars($item['rate_per_hr']) ?>/hr</p>
  <p><small>Added: <?= htmlspecialchars($item['created_at']) ?></small></p>
<?php else: ?>
  <p>Skill not found.</p>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.inc'; ?>
