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

        <div class="header-1">
            <a href="index.php" class="logo"> <img src="website/all/DBS-Logo.png" alt="Logo image" class="hidden-xs"> </a>

            <div class="col-md-6 offer">
                <a href="#" class="btn btn-sucess btn-sm">
                    <?php

                    if (!isset($_SESSION['customer_email'])) {
                        echo "Welcome Guest";
                    } else {
                        echo "Welcome: " . $_SESSION['customer_email'] . "";
                    }


                    ?>
                </a>
                <a id="pr" href="#"> Shopping Cart Total Price: <i class="fa fa-inr"></i> <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
            </div>

        </div>

        <div class="header-2">
            <nav class="navbar">
                <ul>
                    <div>
                        <li><a class="active" href="index.php">HOME</a></li>
                        <li><a href="trimer.php">SHOP</a></li>
                        <li><a href="#deal">DEAL</a></li>
                        <li><a href="contactus.php">CONTACT</a></li>
                        <li><a href="#footer">ABOUT</a></li>
                    </div>

                    <div class="col-md-6">
                        <ul class="menu">
                            <li>
                                <a href="cart.php" class="">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span><?php item(); ?> items in cart</span>
                                </a>
                            </li>

                            <li>
                                <a href="customer_registration.php"><i class="fa fa-user-plus"></i>Register</a>
                            </li>
                            <li>
                                <?php

                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a href='checkout.php'>My Account</a>";
                                } else {

                                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                                }

                                ?>
                            </li>

                            <li>
                                <a href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a>
                            </li>

                            <li>
                                <?php

                                if (!isset($_SESSION['customer_email'])) {
                                    echo "<a href='checkout.php'>Login</a>";
                                } else {

                                    echo "<a href='logout.php'>Logout</a>";
                                }

                                ?>
                            </li>
                        </ul>
                    </div>
                </ul>


                <!-- header section ends -->

                <!-- home section starts  -->
                <section class="home" id="home">

                    <h1 class="heading"> <span>BEST OFFERS FOR YOU</span> </h1>

                    <div class="slideshow-container">
                        
                        <!-- dynamic hairstyle images section starts  -->

                        <?php
                        $get_slider = "select * from slider LIMIT 0,1";
                        $run_slider = mysqli_query($con, $get_slider);
                        while ($row = mysqli_fetch_array($run_slider)) {
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            $slider_url = $row['slider_url'];

                            echo "<div class='mySlides fade'>
                                    <a href='$slider_url'>
                                        <img src='admin_area/slider_images/$slider_image'  width='1400' height='400'>
                                    </a>
                                </div>";
                        }
                        ?>

                        <?php
                        $get_slider = "select * from slider LIMIT 1,10";
                        $run_slider = mysqli_query($con, $get_slider);
                        while ($row = mysqli_fetch_array($run_slider)) {
                            $slider_name = $row['slider_name'];
                            $slider_image = $row['slider_image'];
                            $slider_url = $row['slider_url'];
                            echo "<div class='mySlides fade '>
                                    <a href='$slider_url'>
                                        <img src='admin_area/slider_images/$slider_image' width='1400' height='400'>
                                    </a>
                                </div>";
                        }
                        ?>

                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>

                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                    </div>

                </section>

                <!-- home section ends -->

                <!-- hot start -->

                <div class="hot">
                    <div class="container">
                        <h2>Latest this Week</h2>
                        <div class="col-sm-4">
                            <div class="row">
                                <?php

                                getPro();

                                ?>
                            </div>
                        </div>
                    </div>
                </div>


                <!--saloon product section starts  -->

                <section class="arrival" id="arrival">

                    <h1 class="heading"> <span>SALLON PRODUCTS</span> </h1>

                    <div class="box-container">

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=22"> <img src="website/all/th (2).jpg" alt="" width="150"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=22">
                                    <h3>Trimer</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=23"> <img src="website/all/drayer.svg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=23">
                                    <h3>Dryer</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=24"> <img src="website/all/str.svg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=24">
                                    <h3>Straightener</h3>
                                </a>

                            </div>
                            <div class="overlay">
                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=25"><img src="website/all/mass.svg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=25">
                                    <h3>Massager</h3>
                                </a>

                            </div>
                            <div class="overlay">
                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=26"> <img src="website/all/cre.svg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=26">
                                    <h3>Shaving Cream</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=27"> <img src="website/all/blad.svg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=27">
                                    <h3>Blade</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=28"> <img src="website/all/napkin.svg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=28">
                                    <h3>Napkin</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=29"> <img src="website/all/lotion.svg" alt=""></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=29">
                                    <h3>Lotion</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                    </div>
                </section>

                <!-- saloon products section ends -->

                <!-- parlor products section starts -->

                <section class="parlor" id="parlor">

                    <h1 class="heading"> <span>PARLOR</span> </h1>

                    <div class="box-container">

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=38"> <img src="website/all/lip.jpg" alt="" width="300"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=38">
                                    <h3>Lip Care</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=39"> <img src="website/all/ey.jpg" alt="" width="250"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=39">
                                    <h3>Eye Liner</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=40"> <img src="website/all/cr.jpg" alt="" width="300"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=40">
                                    <h3>Face Cream </h3>
                                </a>

                            </div>
                            <div class="overlay">
                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=41"><img src="website/all/nail.jpg" alt="" width="200"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=41">
                                    <h3>Nailpolish</h3>
                                </a>

                            </div>
                            <div class="overlay">
                            </div>
                        </div>

                    </div>
                </section>
                <!-- parlor products section ends -->

                <!-- Daily use section start here -->

                <section class="use" id="use">

                    <h1 class="heading"> <span>DAILY-USE</span> </h1>

                    <div class="box-container">

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=49"> <img src="website/all/detergent.jpg" alt="" width="200"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=49">
                                    <h3>Detergent</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=50"> <img src="website/all/deo.jpg" alt="" width="200"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=50">
                                    <h3>Deodorant</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=51"> <img src="website/all/face.jpg" alt="" width="200"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=51">
                                    <h3>Facewash</h3>
                                </a>

                            </div>
                            <div class="overlay">
                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=52"><img src="website/all/hair.jpg" alt="" width="200"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=52">
                                    <h3>Hair Gel</h3>
                                </a>

                            </div>
                            <div class="overlay">
                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=53"> <img src="website/all/harp.jpg" alt="" width="200"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=53">
                                    <h3>Harpic</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=54"> <img src="website/all/per.jpg" alt="" width="200"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=54">
                                    <h3>Perfume</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=55"> <img src="website/all/wolet.jpg" alt="" width="200"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=55">
                                    <h3>Wallet</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                        <div class="box">
                            <div class="image">
                                <a href="trimer.php?p_cat=56"> <img src="website/all/belt.jpg" alt="" width="300"></a>
                            </div>
                            <div class="info">
                                <a href="trimer.php?p_cat=56">
                                    <h3>Belt</h3>
                                </a>

                            </div>
                            <div class="overlay">

                            </div>
                        </div>

                    </div>
                </section>

                <!-- Daily use section ends here -->

                <!-- deal section starts  -->

                <section class="deal" id="deal">
                    <h1 class="heading"> <span> BEST DEALS </span> </h1>

                    <div class="icons-container">

                        <?php

                        $get_boxes = "select * from boxes_section";
                        $run_box = mysqli_query($con, $get_boxes);
                        while ($row = mysqli_fetch_array($run_box)) {
                            $box_id = $row['box_id'];
                            $box_title = $row['box_title'];
                            $box_desc = $row['box_desc'];
                            $box_icon = $row['box_icon'];

                        ?>

                            <div class="icons">
                                <i class="<?php echo $box_icon; ?>"></i>
                                <h3><?php echo $box_title ?></h3>
                                <p><?php echo $box_desc ?></p>

                            </div>

                        <?php } ?>
                    </div>

                </section>

                <!-- deal section ends -->

                <!-- newsletter section starts  -->

                <section class="newsletter" id="newsletter">

                    <h1>Newsletter</h1>
                    <p>Get In Touch For Latest Discounts And Updates</p>
                    <form action="contactus.php" method="post">
                        <input type="text" placeholder="Enter Your Name"><br>
                        <input type="email" placeholder="Enter Your Email">
                        <textarea type="txt" placeholder="Enter Your Message"></textarea>
                        <input type="submit" class="btn">
                    </form>

                </section>

                <!-- newsletter section ends -->

                <!-- footer section starts  -->

                <footer class="custom-footer" id="footer">
                    <div class="custom-container">
                        <div class="custom-row">
                            <div class="custom-col">
                                <h4>Company</h4>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Affiliate Program</a></li>
                                </ul>
                            </div>
                            <div class="custom-col">
                                <h4>Get Help</h4>
                                <ul>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Payment Options</a></li>
                                </ul>
                            </div>
                            <div class="custom-col">
                                <h4>Online Shop</h4>
                                <ul>
                                    <li><a href="#">Saloon Products</a></li>
                                    <li><a href="#">Parlor Products</a></li>
                                    <li><a href="#">Garments</a></li>
                                    <li><a href="#">Others</a></li>
                                </ul>
                            </div>
                            <div class="custom-col">
                                <h4>Follow Us</h4>
                                <div class="custom-social-links">
                                    <a href="#"><i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i></a>
                                    <a href="#"><i class="fab fa-twitter fa-2x" style="color: #0084b4;"></i></a>
                                    <a href="#"><i class="fab fa-instagram fa-2x" style="color: #E1306C;"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in fa-2x" style="color: #0077B5;"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p class="custom-copyright">Copyright &copy; <span>2024</span> | All rights reserved to DBS Store.</p>
                    </div>
                </footer>

                <!-- footer section ends -->

            </nav>
        </div>
    </header>


    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- owl carousel js file cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- custom js file link  -->
    <script src="main/js.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";

        }
    </script>

</body>

</html>