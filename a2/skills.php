<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<h2>Skills</h2>
<?php $res = $mysqli->query("SELECT id, name FROM skills ORDER BY created_at DESC"); ?>

<table class="table">
  <thead><tr><th>Name</th></tr></thead>
  <tbody>
  <?php if ($res && $res->num_rows): while ($row = $res->fetch_assoc()): ?>
    <tr>
      <td>
        <a href="details.php?id=<?php echo (int)$row['id']; ?>">
          <?php echo htmlspecialchars($row['name']); ?>
        </a>
      </td>
    </tr>
  <?php endwhile; else: ?>
    <tr><td>No skills yet.</td></tr>
  <?php endif; ?>
  </tbody>
</table>

<?php require __DIR__ . '/includes/footer.inc'; ?>
