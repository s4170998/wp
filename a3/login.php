<?php
require_once "includes/tools.inc";
require_once "includes/header.inc";
?>

<div class="container mt-4">
  <h2>Login</h2>

  <form action="login_process.php" method="post" class="col-lg-6 px-0">

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" id="username" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
    <a href="register.php" class="btn btn-link">Register</a>
  </form>
</div>

<?php require_once "includes/footer.inc"; ?>
