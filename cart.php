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
    <title>Cart - PhoneStore</title>
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

    <!--cart items details-->
    

    <?php
            $total = 0;

            if (!empty($_SESSION['shopping_cart'])){
                echo "<div class='small-container cart-page'>";
                echo "<table>";
                    echo "<tr>";
                        echo "<th>Product</th>";
                        echo "<th>Quantity</th>";
                        echo  "<th>Subtotal</th>";
                    echo "</tr>";

                foreach($_SESSION['shopping_cart'] as $keys => $values){
                    echo "<tr>";
                    echo "<td>";
                        echo "<div class='cart-info'";
                            echo "<div>";
                                echo "<img src='images/".$values['item_img']."' />";
                                echo "<div><p>".$values['item_name']."<br /></p>";
                                echo "<small>Price: $".$values['item_price']."</small>";
                                echo "<br />";
                                echo "<a href='products.php?action=delete&id=".$values['item_id']."'>Remove</a></div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</td>";
                    echo "<td>";
                        echo "<text>".$values['item_quantity']."</text>";
                    echo "</td>";
                    echo "<td>$".$values['item_quantity']*$values['item_price']."</td>";
                    echo "</tr>";
                    $total = $total + ($values['item_quantity'] * $values['item_price']);
                }

                echo "</table>";

                echo "<div class='total-price'>";
                    echo "<table>";
                        echo "<tr>";
                            echo "<td>Subtotal</td>";
                            echo "<td>$".$total."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Delivery</td>";
                            echo "<td>FREE</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Total</td>";
                            echo "<td>$".$total."</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td></td>";
                           // echo "<td><button class='btn' id='paypal-payment-button' style='border:hidden;'>Paypal</button></td>";
                            echo "<td><div id='paypal-payment-button'> </div></td>";
                        echo "</tr>";
                    echo "</table>";
                echo "</div>";
            echo "</div>";

            }else{
                echo "
                <div class='header'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-2'>
                                <h1>
                                    Shopping cart is empty!
                                </h1>
                            </div>
                            <div class='col-2'>
                                <img src='images/image1.png' />
                            </div>
                        </div>
                    </div>
                </div>";
            
            }

    ?>

        

    

    <!--footer-->
    <div class="footer" >
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

    <script src="https://www.paypal.com/sdk/js?client-id=AYYAGIHW_H4Tr9-Pw_ig31Xg63_-9fPlg5DUedCUlOsl55l_4O-7LeOSsSO9ImI4sQVi_gryGtTU0E2I&disable-funding=credit,card"></script>
    <script >
    paypal.Buttons({

        style: {
             shape: 'pill'
        },

        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $total; ?>'
                    }
                }]
            });
        },

        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                console.log(details)
                window.location.replace("http://localhost/GeoStore/succes.php")
               
            })
        },

        onCancel: function (data) {
            window.location.replace("http://localhost/GeoStore/Oncancel.php")
        }

    }).render('#paypal-payment-button');
    </script>
</body>
</html>