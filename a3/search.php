<?php
require_once "includes/tools.inc";
require_once "includes/db_connect.inc";
$title = "Search";
require_once "includes/header.inc";

$query = $_GET['query'] ?? '';
$category = $_GET['category'] ?? '';
$didSubmit = isset($_GET['query']) || isset($_GET['category']);

$result = null;

if ($didSubmit) {
  if ($query !== '' && $category !== '' && $category !== 'All') {
    $like = "%".$query."%";
    $stmt = $conn->prepare("SELECT skill_id, title, category, level, rate_per_hr, image FROM skills WHERE (title LIKE ? OR description LIKE ?) AND category = ? ORDER BY skill_id DESC");
    $stmt->bind_param("sss", $like, $like, $category);
  } elseif ($query !== '') {
    $like = "%".$query."%";
    $stmt = $conn->prepare("SELECT skill_id, title, category, level, rate_per_hr, image FROM skills WHERE title LIKE ? OR description LIKE ? ORDER BY skill_id DESC");
    $stmt->bind_param("ss", $like, $like);
  } elseif ($category !== '' && $category !== 'All') {
    $stmt = $conn->prepare("SELECT skill_id, title, category, level, rate_per_hr, image FROM skills WHERE category = ? ORDER BY skill_id DESC");
    $stmt->bind_param("s", $category);
  } else {
    $stmt = $conn->prepare("SELECT skill_id, title, category, level, rate_per_hr, image FROM skills ORDER BY skill_id DESC");
  }
  $stmt->execute();
  $result = $stmt->get_result();
}
?>

<div class="container mt-4">
  <h2>Search</h2>

  <form method="get" action="search.php" class="row g-2 align-items-end mb-4">
    <div class="col-md-6">
      <label class="form-label">Keywords</label>
      <input type="text" name="query" class="form-control" value="<?= htmlspecialchars($query) ?>" placeholder="Search title or description">
    </div>
    <div class="col-md-4">
      <label class="form-label">Category</label>
      <select name="category" class="form-select">
        <option value="All" <?= ($category==='All' || $category==='')?'selected':''; ?>>All</option>
        <option value="Art" <?= $category==='Art'?'selected':''; ?>>Art</option>
        <option value="Music" <?= $category==='Music'?'selected':''; ?>>Music</option>
        <option value="Cooking" <?= $category==='Cooking'?'selected':''; ?>>Cooking</option>
        <option value="Coding" <?= $category==='Coding'?'selected':''; ?>>Coding</option>
      </select>
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary w-100" type="submit">Search</button>
    </div>
  </form>

  <?php if ($didSubmit) { ?>
    <div class="row">
      <?php if ($result && $result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" style="height:200px;object-fit:cover;">
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
      <?php } else { ?>
        <div class="col-12"><p>No results found.</p></div>
      <?php } ?>
    </div>
  <?php } ?>
</div>

<?php require_once "includes/footer.inc"; ?>
