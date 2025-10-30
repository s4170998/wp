<?php
require_once __DIR__ . '/includes/tools.inc';
require_once __DIR__ . '/includes/db_connect.inc';
$title = 'All Skills';
require_once __DIR__ . '/includes/header.inc';

$stmt = $conn->prepare("SELECT skill_id, title, category, level, rate_per_hr, image FROM skills ORDER BY created_at DESC");
$stmt->execute();
$res = $stmt->get_result();
?>
<main class="container py-4">
  <h2 class="mb-4">All Skills</h2>
  <div class="row g-4">
    <div class="col-lg-4">
      <img src="assets/images/skills_banner.png" class="img-fluid rounded-3 shadow-soft" alt="" onerror="this.style.display='none'">
    </div>
    <div class="col-lg-8">
      <div class="table-responsive shadow-soft rounded-3 bg-white">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th>Title</th>
              <th>Category</th>
              <th>Level</th>
              <th>Rate ($/hr)</th>
            </tr>
          </thead>
          <tbody>
          <?php while ($row = $res->fetch_assoc()): ?>
            <tr>
              <td>
                <a href="details.php?skill_id=<?= (int)$row['skill_id'] ?>">
                  <?= htmlspecialchars($row['title']) ?>
                </a>
              </td>
              <td><?= htmlspecialchars($row['category']) ?></td>
              <td><?= htmlspecialchars($row['level']) ?></td>
              <td><?= number_format((float)$row['rate_per_hr'], 2) ?></td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
<?php require_once __DIR__ . '/includes/footer.inc'; ?>
