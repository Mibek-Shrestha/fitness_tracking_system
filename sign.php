<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="style/signIn.css">
</head>
<body>
    <?php  include 'Navbar/header.php'; ?>
  <div class="container" >
    <form class="login-form" action="signIn_Process.php" method="post">
      <h1>Login</h1>
      <input type="text" name="username" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
