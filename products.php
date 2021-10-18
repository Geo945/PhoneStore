<?php
use UI\Controls\Form;
use UI\Draw\Text\Font\Descriptor;

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);


if(isset($_POST['add_to_cart'])){

    if(isset($_SESSION['shopping_cart'])){

        $item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
        if(!in_array($_GET['id'], $item_array_id)){
            $count = count($_SESSION['shopping_cart']);
            $item_array = array(
                'item_id'       => $_GET['id'],
                'item_name'     => $_POST['hidden_name'],
                'item_price'    => $_POST['hidden_price'],
                'item_quantity' => $_POST['quantity'],
                'item_img'      => $_POST['hidden_img']
            );
            $_SESSION['shopping_cart'][$count] = $item_array;
        }else{
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="products.php"</script>';
        }

    }else{
        $item_array = array(
            'item_id'       => $_GET['id'],
            'item_name'     => $_POST['hidden_name'],
            'item_price'    => $_POST['hidden_price'],
            'item_quantity' => $_POST['quantity'],
            'item_img'      => $_POST['hidden_img']
            );
        $_SESSION['shopping_cart'][0] = $item_array;
    }

}

if(isset($_GET['action'])){
    if($_GET['action'] == 'delete'){
        foreach($_SESSION['shopping_cart'] as $keys => $values){
            if($values['item_id'] == $_GET['id']){
                unset($_SESSION['shopping_cart'][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}


?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <title>All Products - PhoneStore</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
   
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" width="200" height="40" /></a>
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
                            <a href="changePassword.php">
                                <?php echo $user_data['user_name']; ?>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" width="30" height="30" /></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
            </div>
        </div>
    </div>

    
    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
        </div>
        
        <?php
            $query = "select * from phones order by price desc";
            $result = mysqli_query($con,$query);
            $k=0;
            while ( $row = mysqli_fetch_assoc($result) ){

                if($k==4){
                    echo "</div>";
                    $k=0;
                }

                if($k==0){
                    echo "<div class='row'>";
                }

                echo "<div class='col-4' style='border:1px solid;padding: 10px; box-shadow: 2px 2px 2px 2px #9F8D8A; height: 540px; max-height:540px;'>";
                echo "<form method='POST' action='products.php?action=add&id=".$row['id']."' enctype='multipart/form-data'>";
                        echo "<img src='images/".$row['name']."' />";
                        echo "<h4>".$row['title']."</h4>";
                        echo "<div class='rating'>";
                            echo "<i class='fa fa-star'></i>";
                            echo "<i class='fa fa-star'></i>";
                            echo "<i class='fa fa-star'></i>";
                            echo "<i class='fa fa-star'></i>";
                            echo "<i class='fa fa-star'></i>";
                        echo "</div>";
                        echo "<p>$".$row['price']."</p>";
                        echo "<p>Quantity:</p>";
                        echo "<input type='text' name='quantity' value='1' />";
                        echo "<input type='hidden' name='hidden_name' value='".$row['title']."' />";
                        echo "<input type='hidden' name='hidden_price' value='".$row['price']."' />";
                        echo "<input type='hidden' name='hidden_img' value='".$row['name']."' />";
                        echo "<button type='submit' name='add_to_cart' class='btn' style='border:none;'>Add to cart</button>";
                 echo "</form>";
                 echo "</div>";


                 $k=$k+1;

            }

            if( $k<=4 && $k!=0){
                echo "</div>";
            }


        ?>
        
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