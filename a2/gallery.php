<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<h2>Gallery</h2>
<div class="grid">
<?php
$res = $mysqli->query("SELECT id, name, image FROM skills WHERE image IS NOT NULL AND image!='' ORDER BY created_at DESC");
if ($res && $res->num_rows) {
  while ($row = $res->fetch_assoc()) {
    $src = 'assets/images/skills/' . $row['image'];
    echo '<a href="details.php?id='.(int)$row['id'].'"><img src="'.htmlspecialchars($src).'" alt=""></a>';
  }
} else {
  echo '<p>No images yet.</p>';
}
?>
</div>

<?php require __DIR__ . '/includes/footer.inc'; ?>
