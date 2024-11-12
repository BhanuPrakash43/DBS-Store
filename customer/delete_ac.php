<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		/* Styles for the Delete Account Section */
		.delete-account-container {
			background-color: #fff3f3;
			border: 2px solid #ffcccc;
			border-radius: 8px;
			padding: 30px;
			max-width: 500px;
			margin: 50px auto;
			box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
			text-align: center;
		}

		.delete-account-heading {
			color: #d9534f;
			font-size: 1.8em;
			font-weight: 600;
			margin-bottom: 20px;
		}

		.delete-account-form {
			display: flex;
			justify-content: center;
			gap: 15px;
		}

		.btn {
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 1em;
			cursor: pointer;
			transition: all 0.3s ease;
			border: none;
		}

		.btn-delete {
			background-color: #d9534f;
			color: white;
			border: 1px solid #d9534f;
		}

		.btn-delete:hover {
			background-color: #c9302c;
		}

		.btn-cancel {
			background-color: #5bc0de;
			color: white;
			border: 1px solid #5bc0de;
		}

		.btn-cancel:hover {
			background-color: #31b0d5;
		}
	</style>
</head>

<body>
	<div class="rx delete-account-container">
		<center>
			<h1 class="delete-account-heading">Do you really want to delete your account?</h1>
			<form action="" method="post" class="delete-account-form">
				<input type="submit" name="yes" value="Yes, I want to delete" class="btn btn-delete">
				<input type="submit" name="no" value="No, I don't want" class="btn btn-cancel">
			</form>
		</center>
	</div>

	<?php

	$c_email = $_SESSION['customer_email'];
	if (isset($_POST['yes'])) {
		$delete_q = "delete from customers where customer_email='$c_email'";
		$run_q = mysqli_query($con, $delete_q);
		if ($run_q) {
			session_destroy();
			echo "<script> alert('Your account has been deleted') </script>";
			echo "<script> window.open('../index.php','_self') </script>";
		}
	}

	?>

	<?php

	$c_email = $_SESSION['customer_email'];
	if (isset($_POST['no'])) {

		echo "<script> window.open('../index.php','_self') </script>";
	}

	?>

</body>

</html>