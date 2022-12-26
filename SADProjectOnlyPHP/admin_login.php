<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin_login.css">
</head>
<body>
	<form action="admin_login_check.php" method="post">
		<h2>Login as Admin</h2>
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		<input type="email" name="email" placeholder="Email Address"><br>

		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
		<a href="admin_signup.php" target="_blank">Join as Admin</a>
	</form>

</body>
</html>