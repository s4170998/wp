<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $mysqli->prepare("SELECT id, name, description, image, created_at FROM skills WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();
?>

<h2>Details</h2>
<?php if ($item): ?>
  <h3><?php echo htmlspecialchars($item['name']); ?></h3>
  <p><?php echo nl2br(htmlspecialchars($item['description'] ?? '')); ?></p>
  <?php if (!empty($item['image'])): ?>
    <img src="assets/images/skills/<?php echo rawurlencode($item['image']); ?>" alt="">
  <?php endif; ?>
  <p><small>Added: <?php echo htmlspecialchars($item['created_at']); ?></small></p>
<?php else: ?>
  <p>Record not found.</p>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.inc'; ?>
