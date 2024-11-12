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

  <?php
  if (!isset($_SESSION['customer_email'])) {
    echo '<div class="loginContainer">';
    include('customer/customer_login.php');
    echo '</div>';
  } else {
    include('payment_options.php');
  }
  ?>


  <!-- footer section starts  -->
  <?php
  include("includes/footer.php");
  ?>
  <!-- footer section   -->

</body>

</html>