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
    <title>PhoneStore</title>
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
                            <a href="changePassword.php"> <?php echo $user_data['user_name']; ?> </a>
                        </li>

                    </ul>
                </nav>
                <a href="cart.php">
                    <img src="images/cart.png" width="30" height="30" />
                </a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>
                        The best way to buy<br /> the phone you love!
                    </h1>
                    <p>Think Different</p>
                    <a href="products.php" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/image1.png" />
                </div>
            </div>
        </div>
    </div>


    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <a href="products.php">
                        <img src="images/category-1.png" />
                    </a>
                </div>
                <div class="col-3">
                    <a href="products.php">
                        <img src="images/category-2.png" />
                    </a>
                </div>
                <div class="col-3">
                    <a href="products.php">
                        <img src="images/category-3.png" />
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="header">
        <div class="small-container">
            <h2 class="title">Featured products</h2>
            <div class="row">
                <div class="col-4">
                    <a href="products.php">
                        <img src="images/produs1.png" />
                    </a>
                    <h4>APPLE iPhone 12 Pro 5G, 128GB, Pacific Blue</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>$1,299.00</p>
                </div>
                <div class="col-4">
                   <a href="products.php"> <img src="images/product-2.png" /></a>
                    <h4>SAMSUNG Galaxy S20 Fan Edition 4G, 128GB, White</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$800.00</p>
                </div>
                <div class="col-4">
                    <a href="products.php">
                        <img src="images/product-3.png" />
                    </a>
                    <h4>HUAWEI Y5P, 32GB, 2GB RAM, Dual SIM, Midnight Black</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>$650.00</p>
                </div>
                <div class="col-4">
                    <a href="products.php">
                        <img src="images/product-4.png" />
                    </a>
                    <h4>XIAOMI Mi 11 5G, 128GB, 8GB RAM, Midnight Gray</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>$900.00</p>
                </div>
            </div>
        </div>
    </div>


    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <a href="products.php">
                        <img src="images/exclusive.png" class="offer-img" />
                    </a>
                </div>
                <div class="col-2">
                    <p>Exclusively Available on PhoneStore</p>
                    <h1>Iphone 13 128GB</h1>
                    <small>
                        Super Retina XDR display with ProMotion
                        6.1‑inch (diagonal) all‑screen OLED display
                        2532‑by‑1170-pixel resolution at 460 ppi
                    </small>
                    <br />
                    <a href="products.php" class="btn">Buy Now &#8594;</a>
                </div>
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
</body>

</html>