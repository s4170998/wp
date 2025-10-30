<?php
require_once "includes/tools.inc";
require_once "includes/header.inc";

$stmt = $conn->prepare("SELECT skill_id, title, category, level, rate_per_hr, image FROM skills ORDER BY skill_id DESC");
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container mt-4">
  <h2>Gallery</h2>

  <div class="row mt-3">
    <?php while ($row = $result->fetch_assoc()) { ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" style="height:200px; object-fit:cover;" alt="">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
            <p class="mb-1"><strong>Category:</strong> <?= htmlspecialchars($row['category']) ?></p>
            <p class="mb-1"><strong>Level:</strong> <?= htmlspecialchars($row['level']) ?></p>
            <p class="mb-1"><strong>Rate:</strong> $<?= htmlspecialchars($row['rate_per_hr']) ?>/hr</p>
            <a href="details.php?skill_id=<?= $row['skill_id'] ?>" class="btn btn-primary mt-2">View Details</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php require_once "includes/footer.inc"; ?>
