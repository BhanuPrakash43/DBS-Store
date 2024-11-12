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

  <div class="contact-us">
    <div class="box-header">
      <h2>Contact Us</h2>
      <p>If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.</p>
    </div>
    <form action="contactus.php" method="post">
      <div class="group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required class="form-control" placeholder="Enter your full name">
      </div>
      <div class="group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required placeholder="Enter your email address">
      </div>
      <div class="group">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" class="form-control" required placeholder="Enter the subject">
      </div>
      <div class="group">
        <label for="message">Message:</label>
        <textarea class="form-control" name="message" id="message" placeholder="Write your message here..." required></textarea>
      </div>
    </form>
    <div class="register-button">
      <button type="submit" name="submit">
        <i class="fa fa-user-md"></i> Send Message
      </button>
    </div>
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
  $senderName = $_POST['name'];
  $senderEmail = $_POST['email'];
  $senderSubject = $_POST['subject'];

  $receiverEmail = "bhanu@gmail.com";
  mail($receiverEmail, $senderName, $senderSubject, $senderMassage, $senderEmail);
  //customer mail
  $email = $_POST['email'];
  $subject = "Welcome to our website";
  $msg = "I shall get you soon , thanks for sending email";
  $from = "bhanu@gmail.com";
  mail($email, $subject, $msg, $from);
  echo "<h2 align='center'>Your mail sent</h2>";
}
?>