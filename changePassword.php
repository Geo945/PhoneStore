<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $curent_pass = $_POST['currentPassword'];
    $new_pas1 = $_POST['newPassword'];
    $new_pas2 = $_POST['nPassword'];

    if( !empty($curent_pass) && !empty($new_pas1) && !empty($new_pas2) ){
        $id=$user_data['id'];
        $sql = "select * from users where password = '$curent_pass' limit 1";
        $result = mysqli_query($con, $sql);
        if( $result && mysqli_num_rows($result) > 0 ){

                $data = mysqli_fetch_assoc($result);

                if( $new_pas1 == $new_pas2 && $data['id'] == $user_data['id']){

                    $query = "update users set password='$new_pas1' where id='$id' ";

                    if( mysqli_query($con,$query) ){
                        if( isset($_SESSION['user_id']) ){

                            unset($_SESSION['user_id']);
                        }
                        echo '<script>alert("Password changed succesfully!")</script>';
                        echo '<script>window.location="login.php"</script>';
                    }else{
                        echo '<script>alert("Something went wrong!")</script>';
                        echo '<script>window.location="changePassword.php"</script>';
                    }

                }else{

                    echo '<script>alert("Please enter some valid information")</script>';
                    echo '<script>window.location="changePassword.php"</script>';

                }
        }else{
            echo '<script>alert("Please enter some valid information")</script>';
            echo '<script>window.location="changePassword.php"</script>';
        }


    }else{
        echo '<script>alert("Please enter some valid information")</script>';
        echo '<script>window.location="changePassword.php"</script>';
    }
}

?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <title>Change password - PhoneStore</title>
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


    <!--account page-->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" width="100%" />
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span>Change Password</span>
                        </div>
                        <form method="POST">
                            <input type="password" placeholder="Curent password" name="currentPassword" />
                            <input type="password" placeholder="New password" name="newPassword" />
                            <input type="password" placeholder="New password" name="nPassword" />
                            <input type="submit" class="btn" value="Change password" />
                        </form>

                    </div>
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