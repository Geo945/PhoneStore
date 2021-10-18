<?php


session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($user_data['user_id'] != '83603738'){
    header("Location: login.php");
    die;
}


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <title>Admin - PhoneStore</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <!--header-->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="admin.php">
                        <img src="images/logo.png" width="200" height="40" />
                    </a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li>
                            <a href="SeeUsers.php">See Users</a>
                        </li>
                        <li>
                            <a href="addProduct.php">Add product</a>
                        </li>
                        <li>
                            <a href="deleteProduct.php">Delete product</a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                        <li>
                            <a href="changePassword.php">
                                <?php echo $user_data['user_name']; ?>
                            </a>
                        </li>

                    </ul>
                </nav>
                
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Welcome back Admin</h1>
                    <a href="products.php" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/image1.png" />
                </div>
            </div>
        </div>
    </div>

   

    <!--footer-->
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

    <!--scripts-->
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