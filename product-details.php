<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <title>Single Product - PhoneStore</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo.png" width="200" height="40" />
                    </a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="products.php">Products</a>
                        </li>
                        <li>
                            <a href="review.php">Reviews</a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                        <li>
                            <?php echo $user_data['user_name']; ?>
                        </li>

                    </ul>
                </nav>
                <a href="cart.php">
                    <img src="images/cart.png" width="30" height="30" />
                </a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
            </div>
        </div>
    </div>
    <!------ single product details  ------>
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="images/gallery-1.png" width="100%" id="ProductImg" />

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="images/gallery-1.png" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-2.png" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-3.png" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="images/gallery-4.png" width="100%" class="small-img" />
                    </div>
                </div>

            </div>
            <div class="col-2">
                <p>Home/ Iphone 13</p>
                <h1>Apple iPhone 13 Pro, 128GB, 5G, Sierra Blue</h1>
                <h4>$1,599.00</h4>
                <input type="number" value="1" />
                <a class="btn">Add To Cart</a>
                <h3>
                    Product Details <i class="fa fa-indent"></i>
                </h3>
                <br />
                <p>
                    Super Retina XDR display with ProMotion
                    6.1‑inch (diagonal) all‑screen OLED display
                    2532‑by‑1170-pixel resolution at 460 ppi
                </p>
            </div>
        </div>
    </div>

    <!--title-->

    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View more</p>
        </div>
    </div>

    <!--products-->

    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="images/exclusive.png" />
                <h4>Apple iPhone 13 Pro, 128GB, 5G, Sierra Blue</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$1,599.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-9.png" />
                <h4>OPPO Reno4 Lite, 128GB, 8GB RAM, Dual SIM, Matte Black</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$300.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-10.png" />
                <h4>NOKIA 8.3 5G, 64GB, 6GB RAM, Dual SIM, Polar Night</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$400.00</p>
            </div>
            <div class="col-4">
                <img src="images/product-11.png" />
                <h4>HUAWEI P40 Lite E, 64GB, 4GB RAM, Dual SIM, Aurora Blue</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>$200.00</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <img src="images/logo.png" />
                    <p>Our main purpose is to sell products that enrich people's daily lives</p>
                </div>
                <div class="footer-col-2">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-3">
                    <h3>Follow us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
       var MenuItems = document.getElementById("MenuItems");

       MenuItems.style.maxHeight = "0px";

       function menutoggle() {
           if (MenuItems.style.maxHeight == "0px")
                {
               MenuItems.style.maxHeight = "200px";
                }
           else
                {
               MenuItems.style.maxHeight = "0px";
                }
       }
    </script>
    <!--js for product gallery-->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function () {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function () {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function () {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function () {
            ProductImg.src = SmallImg[3].src;
        }

    </script>
</body>
</html>