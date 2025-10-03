<?php
$pageTitle = 'SkillSwap | All Skills';
$active = 'skills';
require __DIR__ . '/includes/header.inc';
require __DIR__ . '/includes/db_connect.inc';
?>


<div id="skillCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active"><img src="assets/images/skills/1.png" class="d-block w-100 rounded" alt=""></div>
    <div class="carousel-item"><img src="assets/images/skills/2.png" class="d-block w-100 rounded" alt=""></div>
    <div class="carousel-item"><img src="assets/images/skills/3.png" class="d-block w-100 rounded" alt=""></div>
    <div class="carousel-item"><img src="assets/images/skills/4.png" class="d-block w-100 rounded" alt=""></div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#skillCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#skillCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="row g-4 align-items-center">
  <div class="col-lg-5">
    <img src="assets/images/skills_banner.png" class="img-fluid rounded shadow-sm" alt="Skills banner">
  </div>

  <div class="col-lg-7">
    <h1 class="mb-3">All Skills</h1>
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead class="table-dark">
          <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Level</th>
            <th>Rate ($/hr)</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
          $sql = "SELECT skill_id, title, category, level, rate_per_hr
                  FROM skills
                  ORDER BY created_at DESC";
          if ($res = $mysqli->query($sql)) {
            if ($res->num_rows) {
              while ($r = $res->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($r['title']) . '</td>';
                echo '<td>' . htmlspecialchars($r['category']) . '</td>';
                echo '<td>' . htmlspecialchars($r['level']) . '</td>';
                echo '<td>$' . number_format((float)$r['rate_per_hr'], 2) . '</td>';
                echo '</tr>';
              }
            } else {
              echo '<tr><td colspan="4" class="text-muted">No skills yet.</td></tr>';
            }
            $res->free();
          } else {
            echo '<tr><td colspan="4" class="text-danger">Database error.</td></tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require __DIR__ . '/includes/footer.inc'; ?>


