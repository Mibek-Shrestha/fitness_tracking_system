<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Page</title>
  <link rel="stylesheet" href="style/signUp.css">
</head>
<body>
    <?php  include 'Navbar/header.php'; ?>
  <div class="container">
    <form class="signup-form" action="signUp_process.php" method="POST">
      <h1>Sign Up</h1>
      <input type="text" name='username' placeholder="Username" required>
      <input type="email" name='email' placeholder="Email" required>
      <input type="password" name='password' placeholder="Password" required>
      <button type="submit">Sign Up</button>
    </form>
  </div>
</body>
</html>
