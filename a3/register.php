<?php
require_once __DIR__ . '/includes/tools.inc';
$title = 'Register';
require_once __DIR__ . '/includes/header.inc';
?>
<main class="container py-4">
  <h2 class="mb-3">Register</h2>

  <form action="register_process.php" method="post" class="col-lg-6 px-0">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" id="username" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-brand">Create Account</button>
    <a href="login.php" class="btn btn-link">Login</a>
  </form>
</main>
<?php require_once __DIR__ . '/includes/footer.inc'; ?>
