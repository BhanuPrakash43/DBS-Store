<?php

$customer_email = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$customer_email'";
$run_cust = mysqli_query($con, $get_customer);
$row_cust = mysqli_fetch_array($run_cust);
$customer_id = $row_cust['customer_id'];
$customer_name = $row_cust['customer_name'];
$customer_email = $row_cust['customer_email'];
$customer_country = $row_cust['customer_country'];
$customer_city = $row_cust['customer_city'];
$customer_contact = $row_cust['customer_contact'];
$customer_address = $row_cust['customer_address'];
$customer_image = $row_cust['customer_image'];

?>

<div class="update-container">
	<div class="register-header">
		<h2>Edit Your Account</h2>
		<p>Update your details to continue enjoying our services</p>
	</div>
	<form class="register-form" action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name">Customer Name:</label>
			<input type="text" name="c_name" id="name" required value="<?php echo $customer_name; ?>" placeholder="Enter your name">
		</div>
		<div class="form-group">
			<label for="email">Customer Email:</label>
			<input type="email" name="c_email" id="email" required value="<?php echo $customer_email; ?>" placeholder="Enter your email">
		</div>
		<div class="form-group">
			<label for="country">Country:</label>
			<input type="text" name="c_country" id="country" required value="<?php echo $customer_country; ?>" placeholder="Enter your country">
		</div>
		<div class="form-group">
			<label for="city">City:</label>
			<input type="text" name="c_city" id="city" required value="<?php echo $customer_city; ?>" placeholder="Enter your city">
		</div>
		<div class="form-group">
			<label for="contact">Contact Number:</label>
			<input type="text" name="c_contact" id="contact" required value="<?php echo $customer_contact; ?>" placeholder="Enter your contact number">
		</div>
		<div class="form-group">
			<label for="address">Address:</label>
			<input type="text" name="c_address" id="address" required value="<?php echo $customer_address; ?>" placeholder="Enter your address">
		</div>
		<div class="form-group">
			<label for="image">Profile Image:</label>
			<input type="file" name="c_image" id="image">
			<img src="customer_images/<?php echo $customer_image; ?>" alt="Profile Image" height="70" width="70">
		</div>
		<div class="register-button">
			<button type="submit" name="update"><i class="fa fa-save"></i> Update Now</button>
		</div>
	</form>
</div>

<?php

if (isset($_POST['update'])) {
	$update_id = $customer_id;
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_contact = $_POST['c_number'];
	$c_address = $_POST['c_address'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];

	move_uploaded_file($c_image_tmp, "customer_images/$c_image");
	$update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id'";

	$run_customer = mysqli_query($con, $update_customer);
	if ($run_customer) {
		echo "<script> alert('Your details updated.') </script>";
		echo "<script> window.open('../index.php','_self') </script>";
	}
}
?>