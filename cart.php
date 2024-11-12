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

  <div class="cartPage" id="cart">
    <div class="cartBox">
      <form action="cart.php" method="post" enctype="multipart-form-data">
        <h1>Shopping Cart</h1>
        <?php
        $ip_add = getUserIp();
        $select_cart = "select * from cart where ip_add='$ip_add'";
        $run_cart = mysqli_query($con, $select_cart);
        $count = mysqli_num_rows($run_cart);

        ?>
        <div class="table-respon"></div>
        <table class="table">
          <thead>
            <tr>
              <th colspan="2">Product</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Size</th>
              <th colspan="1">Delete</th>
              <th colspan="1">Sub Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            while ($row = mysqli_fetch_array($run_cart)) {
              $pro_id = $row['p_id'];
              $pro_size = $row['size'];
              $pro_qty = $row['qty'];
              $get_product = "select * from products where product_id='$pro_id'";
              $run_pro = mysqli_query($con, $get_product);
              while ($row = mysqli_fetch_array($run_pro)) {
                $p_title = $row['product_title'];
                $p_img1 = $row['product_img1'];
                $p_price = $row['product_price'];
                $sub_total = $row['product_price'] * $pro_qty;
                $total += $sub_total;

            ?>
                <tr>
                  <td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
                  <td> <?php echo $p_title ?></td>
                  <td><?php echo $pro_qty ?></td>
                  <td><i class="fa fa-inr"></i> <?php echo $p_price ?></td>
                  <td><?php echo $pro_size ?></td>
                  <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                  <td><i class="fa fa-inr"></i> <?php echo $sub_total ?></td>
                </tr>
            <?php }
            } ?>
            </tfoot>
        </table>
        <div class="box-footer">
          <div class="pull-left">
            <h4>Total Price</h4>
          </div>
          <div class="pull-right">
            <h4><i class="fa fa-inr"></i> <?php echo $total; ?></h4>
          </div>
        </div>

        <div class="box-footer">
          <div class="pull-left">
            <a href="index.php" class="btn btn-default">
              <i class="fa fa-chevron-left"></i>Continue Shopping
            </a>
          </div>
          <div class="pull-right">
            <button class="btn btn-default" type="submit" name="update" value="update cart">
              <i class="fa fa-refresh">Update Cart</i>
            </button>
            <a href="checkout.php" class="btn btn-primary">
              Processed to checkout<i class="fa fa-chevron-right"></i>
            </a>
          </div>
        </div>
      </form>
    </div>

    <?php

    function update_cart()
    {
      global $con;
      if (isset($_POST['update'])) {
        foreach ($_POST['remove'] as $remove_id) {
          $delete_product = "delete from cart where p_id='$remove_id'";
          $run_del = mysqli_query($con, $delete_product);
          if ($run_del) {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }
    echo @$up_cart = update_cart();
    ?>

  </div>


  <!-- footer section starts  -->
  <?php
  include("includes/footer.php");
  ?>
  <!-- footer section   -->

</body>
</html>