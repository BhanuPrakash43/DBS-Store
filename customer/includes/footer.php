<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBS Store</title>
    <style>
        .cuntainer {
            width: 1400px;
            margin: auto;
        }

        .wolf {
            display: flex;
            flex-wrap: wrap;
        }

        .footer-ol ul {
            list-style: none;
            background: none;
            box-shadow: none;
        }

        .footer {
            background-color: #1d4354;
            padding: 70px;
            margin-top: 3rem;
            position: relative;
        }

        .footer-ol {
            width: 25%;
            padding: 15px;
        }

        .footer-ol h4 {
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }

        .footer-ol h4::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: #e91e;
            height: 2px;
            box-sizing: border-box;
            width: 80px;
        }

        .footer-ol ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-ol ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: underline;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .footer-ol ul li a:hover {
            color: #fff;
            background: no-repeat;
            padding-left: 4px;
            text-decoration: underline;
        }

        .footer-ol .social-links a {
            display: flex;
            flex-direction: column;
            height: 50px;
            width: 50px;
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 15%;
            color: #ffffff;
            transition: all 0.1s ease;
        }

        .footer-ol .social-links a:hover {
            color: #24262b;
            background-color: #fff;
        }

        .pal {
            border-bottom: 1px solid;
            width: 100%;
            color: #fff;
        }

        .credit {
            margin-left: 58rem;
            color: #fff;
            font-size: 1.6rem;
            margin-top: 2rem;
        }

        .credit span {
            color: #e91e;
        }

        @media (max-width: 767px) {
            .footer-ol {
                width: 50%;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 574px) {
            .footer-ol {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <footer class="footer" id="footer">
        <div class="cuntainer">
            <div class="wolf">

                <div class="footer-ol">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us</a></li><br><br>
                        <li><a href="#">our services</a></li><br><br>
                        <li><a href="#">privacy policy</a></li><br><br>
                        <li><a href="#">affiliate program</a></li><br><br>
                    </ul>
                </div>
                <div class="footer-ol">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li><br><br>
                        <li><a href="#">shipping</a></li><br><br>
                        <li><a href="#">returns</a></li><br><br>
                        <li><a href="#">order status</a></li><br><br>
                        <li><a href="#">payment options</a></li><br><br>
                    </ul>
                </div>
                <div class="footer-ol">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="trimer.php?cat_id=7">Saloon Products</a></li><br><br>
                        <li><a href="trimer.php?cat_id=8">Parlor Prtoducts</a></li><br><br>
                        <li><a href="trimer.php?cat_id=9">Garments</a></li><br><br>
                        <li><a href="trimer.php?cat_id=10">Daily use</a></li><br><br>
                        <li><a href="trimer.php?cat_id=11">Others</a></li><br><br>
                    </ul>
                </div>
                <div class="footer-ol">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f fa-2x" style="color: #3b5998;"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-2x" style="color: #0084b4;"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-2x" style="color:   #E1306C;"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in fa-2x" style="color:  #0077B5 ;"></i></a>

                    </div>
                </div>
                <div class="pal">

                </div>
                <p class="credit">Copyright &copy; <span>2024</span> | All rights reserved to DBS Store.</p>
            </div>
        </div>
    </footer>
</body>

</html>