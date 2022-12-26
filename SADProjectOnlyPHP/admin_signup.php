<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Signup</title>
	<link rel="stylesheet" type="text/css" href="admin_login.css">
</head>
<body>
	<form action="admin_signup_check.php" method="post">
		<h2>Signup as Admin</h2>

		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		<?php if(isset($_GET['success'])) { ?>
			<p class="success"><?php echo $_GET['success']; ?></p>
		<?php } ?>


		<?php if(isset($_GET['name'])) { ?>
			<input type="text" name="name" placeholder="Full Name" value="<?php echo $_GET['name']; ?>" required><br>
		<?php } else { ?>
			<input type="text" name="name" placeholder="Full Name" required><br>
		<?php } ?>


		<?php if(isset($_GET['NID'])) { ?>
			<input type="text" name="NID" placeholder="NID number" value="<?php echo $_GET['NID']; ?>" required><br>
		<?php } else { ?>
			<input type="text" name="NID" placeholder="NID number" required><br>
		<?php } ?>


		<?php if(isset($_GET['email'])) { ?>
			<input type="email" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>" required><br>
		<?php } else { ?>
			<input type="email" name="email" placeholder="Email" required><br>
		<?php } ?>


		<?php if(isset($_GET['password'])) { ?>
			<input type="password" name="password" placeholder="Password" value="<?php echo $_GET['password']; ?>" required><br>
		<?php } else { ?>
			<input type="password" name="password" placeholder="Password" required><br>
		<?php } ?>


		<?php if(isset($_GET['address'])) { ?>
			<input type="text" name="address" placeholder="Address" value="<?php echo $_GET['address']; ?>" required><br>
		<?php } else { ?>
			<input type="text" name="address" placeholder="Address" required><br>
		<?php } ?>


		<?php if(isset($_GET['phone'])) { ?>
			<input type="tel" name="phone" placeholder="Phone" value="<?php echo $_GET['phone']; ?>" required><br>
		<?php } else { ?>
			<input type="tel" name="phone" placeholder="Phone" required><br>
		<?php } ?>


		<?php if(isset($_GET['dob'])) { ?>
			<input type="date" name="dob" placeholder="Date of Birth" value="<?php echo $_GET['dob']; ?>" required><br>
		<?php } else { ?>
			<input type="date" name="dob" placeholder="Date of Birth" required><br>
		<?php } ?>
		
			
		<?php if(isset($_GET['genders'])) { ?>
			<select name="genders" required>
				<option value="gender">Select your Gender</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				<option value="pnts">Rather not specify</option>
				<option value="others">Others</option>
			</select>
			<br>
		<?php } else { ?>
			<select name="genders" required>
				<option value="gender">Select your Gender</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				<option value="pnts">Prefer not to say</option>
				<option value="others">Others</option>
			</select>
			<br>
		<?php } ?>


		<button type="submit">Sign Up</button>
		<a href="admin_login.php" target="_blank">Already have an account?</a>

	</form>
	
</body>
</html>