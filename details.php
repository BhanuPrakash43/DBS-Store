<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if (isset($_GET['pro_id'])) {
  $pro_id = $_GET['pro_id'];

  // Get the product details
  $get_product = "SELECT * FROM products WHERE product_id='$pro_id'";
  $run_product = mysqli_query($con, $get_product);
  $row_product = mysqli_fetch_array($run_product);

  // Check if product exists
  if ($row_product) {
    $p_cat_id = $row_product['p_cat_id'];
    $p_title = $row_product['product_title'];
    $p_price = $row_product['product_price'];
    $p_desc = $row_product['product_desc'];
    $p_img1 = $row_product['product_img1'];
    $p_img2 = $row_product['product_img2'];
    $p_img3 = $row_product['product_img3'];

    // Get the product category details
    $get_p_cat = "SELECT * FROM product_category WHERE p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);

    // Check if product category exists
    if ($row_p_cat) {
      $p_cat_title = $row_p_cat['p_cat_title'];
    } else {
      $p_cat_title = "Category not found";
    }
  } else {
    echo "Product not found.";
    exit; // Stop execution if the product doesn't exist
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DBS Store</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

  <link rel="stylesheet" href="style.css">

  <style>
    /* Container for the product details page */
    .product-container {
      width: 90%;
      margin: auto;
      display: flex;
      justify-content: space-around;
      align-items: center;
      gap: 20px;
      margin-top: 30px;
      padding: 20px;
    }

    /* Image Section Styling */
    .image-section {
      flex: 1;
      max-width: 400px;
      height: fit-content;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .image-slider {
      position: relative;
      width: 100%;
      height: 350px;
      overflow: hidden;
    }

    .mySlides {
      display: none;
      text-align: center;
    }

    .mySlides img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    button.prev,
    button.next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      border-radius: 50%;
      font-size: 20px;
    }

    button.prev {
      left: 10px;
    }

    button.next {
      right: 10px;
    }

    /* Product Details Section */
    .details-section {
      flex: 1.5;
      max-width: 600px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .details-section h1 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .details-section p {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .form-group label {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-top: 5px;
    }

    .priceBtn {
      display: flex;
      flex-direction: column;
      text-align: center;
    }

    .priceLabel {
      font-size: 2rem;
    }

    .price {
      font-size: 24px;
      font-weight: bold;
      color: #007bff;
      margin: 20px 0;
    }

    .btn-prim {
      padding: 12px 20px;
      background-color: #007bff;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-top: 1rem;
    }

    .btn-prim:hover {
      background-color: #0056b3;
    }

    /* Responsive Design for Smaller Screens */
    @media (max-width: 768px) {
      .product-container {
        flex-direction: column;
        align-items: center;
      }

      .image-section,
      .details-section {
        max-width: 100%;
      }
    }
  </style>

</head>

<body>

  <header>
    <?php include("includes/header.php") ?>
  </header>

  <section class="content">
    <div class="container">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><span>Product Details</span></li>
        </ul>
      </div>
    </div>
  </section>

  <div class="product-container">
    <!-- Product Image Section -->
    <div class="image-section">
      <div class="image-slider">
        <div class="mySlides fade">
          <img src="admin_area/product_images/<?php echo $p_img1 ?>" alt="Product Image 1">
        </div>
        <div class="mySlides fade">
          <img src="admin_area/product_images/<?php echo $p_img2 ?>" alt="Product Image 2">
        </div>
        <div class="mySlides fade">
          <img src="admin_area/product_images/<?php echo $p_img3 ?>" alt="Product Image 3">
        </div>
        <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
        <button class="next" onclick="plusSlides(1)">&#10095;</button>
      </div>
    </div>

    <!-- Product Details Section -->
    <div class="details-section">
      <h1><?php echo $p_title ?></h1>

      <?php addCart(); ?>
      
      <p><strong>Category:</strong> <?php echo $p_cat_title ?></p>
      <p><strong>Description:</strong> <?php echo $p_desc ?></p>
      <form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
        <div class="form-group">
          <label>Product Quantity</label>
          <select name="product_qty" class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>

        <div class="form-group">
          <label>Choose Color</label>
          <select name="product_size" class="form-control">
            <option>Red & Blue</option>
            <option>Khaki</option>
            <option>White</option>
            <option>Gray</option>
            <option>Blue</option>
          </select>
        </div>

        <div class="priceBtn">
          <p class="price"><span class="priceLabel">Price:</span> <i class="fa fa-inr"></i> <?php echo $p_price; ?></p>
          <button class="btn-prim" type="submit"><i class="fa fa-shopping-cart"> Add to Cart</i></button>
        </div>
      </form>
    </div>
  </div>


  <!-- Footer part  -->

  <div>
    <?php include("includes/footer.php"); ?>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>

  <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function showSlides(n) {
      var slides = document.getElementsByClassName("mySlides");
      if (n > slides.length) slideIndex = 1;
      if (n < 1) slideIndex = slides.length;
      for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slides[slideIndex - 1].style.display = "block";
    }
  </script>

</body>

</html>