<?php
if (!isset($_GET['id'])) {
  header("Location:skills.php");
  exit();
}
?>
<?php require __DIR__ . '/includes/header.inc'; ?>
<?php require __DIR__ . '/includes/db_connect.inc'; ?>

<?php
$id = (int)$_GET['id']  ;
$stmt = $mysqli->prepare("SELECT skill_id,title,description,category,rate_per_hr,level, created_at, image_path FROM skills WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
?>

<?php if ($row): ?>
  <div class="row g-4">
    <div class="col-lg-5">
      <img src="<?php echo $row['image'] ? 'assets/images/skills/'.htmlspecialchars($row['image']) : 'assets/images/skills_banner.png'; ?>" class="img-fluid rounded-3 shadow-sm" alt="">
    </div>
    <div class="col-lg-7">
      <h2 class="mb-2"><?php echo htmlspecialchars($row['name']); ?></h2>
      <p class="text-muted mb-3"><?php echo htmlspecialchars($row['category']); ?> • <?php echo htmlspecialchars($row['level']); ?></p>
      <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
      <p class="h5 mt-3">$<?php echo number_format((float)$row['rate'], 2); ?>/hr</p>
    </div>
  </div>
<?php else: ?>
  <p class="text-muted">Skill not found.</p>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.inc'; ?>

