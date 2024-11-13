<?php
session_start();
include("includes/db.php");

include("functions/functions.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DBS Store</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- owl carousel css file cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <!-- header section starts  -->

  <header>
    <?php
    include("includes/header.php")
    ?>
  </header>

  <!-- header section End  -->

  <div class="register-container">
    <div class="register-header">
      <h2>Register a New Account</h2>
      <p>Create your account to enjoy all our services</p>
    </div>
    <form class="register-form" action="customer_registration.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Customer Name:</label>
        <input type="text" name="c_name" id="name" required placeholder="Enter your name">
      </div>
      <div class="form-group">
        <label for="email">Customer Email:</label>
        <input type="email" name="c_email" id="email" required placeholder="Enter your email">
      </div>
      <div class="form-group">
        <label for="password">Customer Password:</label>
        <input type="password" name="c_password" id="password" required placeholder="Enter your password">
      </div>
      <div class="form-group">
        <label for="country">Country:</label>
        <input type="text" name="c_country" id="country" required placeholder="Enter your country">
      </div>
      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" name="c_city" id="city" required placeholder="Enter your city">
      </div>
      <div class="form-group">
        <label for="contact">Contact Number:</label>
        <input type="text" name="c_contact" id="contact" required placeholder="Enter your contact number">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="c_address" id="address" required placeholder="Enter your address">
      </div>
      <div class="form-group">
        <label for="image">Profile Image:</label>
        <input type="file" name="c_image" id="image" required>
      </div>
      <div class="register-button">
        <button type="submit" name="submit"><i class="fa fa-user-plus"></i> Register</button>
      </div>
    </form>
  </div>

  <!-- footer section starts  -->
  <?php
  include("includes/footer.php");
  ?>
  <!-- footer section   -->

</body>

</html>

<?php

if (isset($_POST['submit'])) {
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_password = $_POST['c_password'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_tmp_image = $_FILES['c_image']['tmp_name'];
  $c_ip = getUserIp();

  move_uploaded_file($c_tmp_image, "customer/customer_images/$c_image");
  $insert_customer = "insert into customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
  $run_customer = mysqli_query($con, $insert_customer);
  $sel_cart = "select * from cart where ip_add='$c_ip'";
  $run_cart = mysqli_query($con, $sel_cart);
  $check_cart = mysqli_num_rows($run_cart);
  if ($check_cart > 0) {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('you have been registered successfully')</script>";
    echo "<script>window.open('customer/my_account.php','_self')</script>";
  } else {
    $_SESSION['customer_email'] = $c_email;
    echo "<script>alert('you have been registered successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
}

?>