<<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<h2>All Skills</h2>

<?php
$res = $mysqli->query("
  SELECT skill_id, title, category, level, rate_per_hr
  FROM skills
  ORDER BY created_at DESC
");
?>

<table class="table">
  <thead>
    <tr>
      <th>Title</th>
      <th>Category</th>
      <th>Level</th>
      <th>Rate ($/hr)</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($res && $res->num_rows): ?>
      <?php while ($row = $res->fetch_assoc()): ?>
        <tr>
          <td>
            <a href="details.php?skill_id=<?= urlencode($row['skill_id']) ?>">
              <?= htmlspecialchars($row['title']) ?>
            </a>
          </td>
          <td><?= htmlspecialchars($row['category']) ?></td>
          <td><?= htmlspecialchars($row['level']) ?></td>
          <td><?= htmlspecialchars($row['rate_per_hr']) ?></td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="4">No skills yet.</td></tr>
    <?php endif; ?>
  </tbody>
</table>

<?php require __DIR__ . '/includes/footer.inc'; ?>
