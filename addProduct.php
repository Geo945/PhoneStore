<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($user_data['user_id'] != '83603738'){
    header("Location: login.php");
    die;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $file = $_FILES['file'];
    $price = $_POST['price'];
    $title = $_POST['title'];
   

    if ( !empty($file) && !empty($price) && !empty($title) ){

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if( in_array($fileActualExt, $allowed) ){

            if( $fileError === 0 ){
                if($fileSize < 1000000){

                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'images/'.$fileNameNew;
                    $query = "insert into phones (name,price,title) values('$fileNameNew','$price','$title')";
                    if(mysqli_query($con,$query)){
                        move_uploaded_file($fileTmpName, $fileDestination);
                        header("Location: admin.php");
                        die;
                    }else{
                        echo "Couldn't add data to database";
                    }

                }else{
                    echo "Your file is too big!";
                }
            }else{
                echo "There was an error uploading your file!";
            }

        }else{
            echo "You cannot upload files of this type!";
        }

    }else{
        echo "Please complete all the fields!";
    }
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <title>Add product - PhoneStore</title>
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
            
        </div>
    </div>


    <!--addproduct page-->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" width="100%" />
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span >Add product</span>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="file" style="border:hidden;"/>
                            <input type="number" name="price" placeholder="Enter product price" />
                            <input type="text" name="title" placeholder="Enter product title" />
                            <button type="submit" name="submit" class="btn">Add product</button>
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

    <!--js for toggle Form-->
    <script>

        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");


        function register() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(100px)";
        }
        function login() {
            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            Indicator.style.transform = "translateX(0px)";
        }

    </script>

</body>
</html>