<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }

$uid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$uname = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : '';
?>
<nav class="navbar navbar-expand-md navbar-dark" style="background: linear-gradient(to right, var(--brand-start), var(--brand-end));">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">SkillSwap</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="skills.php">All Skills</a></li>
        <?php if ($uid) { ?>
        <li class="nav-item"><a class="nav-link" href="add.php">Add Skill</a></li>
        <?php } ?>
      </ul>

      <form class="d-flex" method="get" action="search.php">
        <input class="form-control me-2" type="search" name="query" placeholder="Search skills">
        <button class="btn btn-light" type="submit">Search</button>
      </form>

      <ul class="navbar-nav ms-3">
        <?php if ($uid) { ?>
          <li class="nav-item"><span class="navbar-text text-white me-2">Hello, <?= $uname ?></span></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
