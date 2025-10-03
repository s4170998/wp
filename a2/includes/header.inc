<?php
if (!isset($pageTitle)) { $pageTitle = 'SkillSwap'; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <link href="https://fonts.googleapis.com/css2?family=Ysabeau+SC&family=Libre+Baskerville&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark brandbar">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="assets/images/SkillSwap_logo.png" alt="SkillSwap" width="34" height="34" class="me-2">
        <span>SkillSwap</span>
      </a>

      <form class="d-flex ms-auto me-3" role="search" action="search.php" method="get">
        <input class="form-control me-2" name="q" type="search" placeholder="Search">
        <button class="btn btn-outline-light" type="submit"><span class="material-icons">search</span></button>
      </form>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link<?= ($active ?? '')==='home' ? ' active' : '' ?>" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link<?= ($active ?? '')==='skills' ? ' active' : '' ?>" href="skills.php">All Skills</a></li>
          <li class="nav-item"><a class="nav-link<?= ($active ?? '')==='gallery' ? ' active' : '' ?>" href="gallery.php">Gallery</a></li>
          <li class="nav-item"><a class="nav-link<?= ($active ?? '')==='add' ? ' active' : '' ?>" href="add.php">Add</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<main class="container my-5">

