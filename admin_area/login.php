<?php
session_start();
include("includes/db.php");

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel</title>

	<!-- Styles and other links -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>

<body>

	<div class="loginContainer">
		<div class="login-container">
			<div class="login-header">
				<center>
					<h2>Admin Login</h2>
				</center>
			</div>
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" id="email" class="form-control" name="admin_email" placeholder="Enter your email" required="">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password" class="form-control" name="admin_pass" placeholder="Enter your password" required="">
				</div>
				<div class="button-container">
					<button type="submit" name="admin_login" value="login" class="btn-login"><i class="fa fa-sign-in"></i> Log In</button>
				</div>
			</form>
			<center>
				<a href="forgot_password.php" class="register-link">
					<p>Lost your password? Forgot Password</p>
				</a>
			</center>
		</div>
	</div>
</body>

</html>

<?php
if (isset($_POST['admin_login'])) {
	$admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
	$admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);
	$get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";
	$run_admin = mysqli_query($con, $get_admin);
	$count = mysqli_num_rows($run_admin);

	if ($count == 1) {
		$_SESSION['admin_email'] = $admin_email;
		echo "<script>alert('You are logged in')</script>";
		echo "<script>window.open('index.php?dashboard','_self')</script>";
	} else {
		echo "<script>alert('Email / Password Wrong')</script>";
	}
}
?>