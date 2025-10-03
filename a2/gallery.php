<?php
$pageTitle = 'SkillSwap | Gallery';
$active = 'gallery';
require __DIR__ . '/includes/header.inc';
?>

<h1 class="text-center mb-4">Gallery</h1>

<div class="row g-4">
  <?php for ($i=1; $i<=8; $i++): ?>
    <div class="col-6 col-md-4">
      <a href="#" data-bs-toggle="modal" data-bs-target="#img<?= $i ?>">
        <img src="assets/images/skills/<?= $i ?>.png" class="img-fluid rounded shadow-sm" alt="Gallery <?= $i ?>">
      </a>
    </div>
  <?php endfor; ?>
</div>

<?php for ($i=1; $i<=8; $i++): ?>
  <div class="modal fade" id="img<?= $i ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"><div class="modal-content">
      <img src="assets/images/skills/<?= $i ?>.png" class="w-100" alt="">
    </div></div>
  </div>
<?php endfor; ?>

<?php require __DIR__ . '/includes/footer.inc';

