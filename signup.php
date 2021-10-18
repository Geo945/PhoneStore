<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name = $_POST['RegisterUsername'];
        $password = $_POST['RegisterPassword'];
        $email = $_POST['RegisterEmail'];
        $address = $_POST['RegisterAdress'];

        if( !empty($user_name) && !empty($password) && !empty($email) && !empty($address) && !is_numeric($user_name) ){
            
            //save database
            $check1 = "select * from users where user_name = '$user_name' limit 1";
            $result1 = mysqli_query($con, $check1);

            $check2 = "select * from users where email = '$email' limit 1";
            $result2 = mysqli_query($con, $check2);

            if( !($result1 && mysqli_num_rows($result1) > 0) && !($result2 && mysqli_num_rows($result2) > 0) ){

                $user_id = random_num(20);
                $query = "insert into users (user_id,user_name,password,email,address) values ('$user_id','$user_name','$password','$email','$address')";

                mysqli_query($con,$query);

                header("Location: login.php");
                die;
            }

        }else{
            
            echo '<script>alert("Please enter some valid information")</script>';
            echo '<script>window.location="signup.php"</script>';
        }

    }
        
    


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <title>Register - PhoneStore</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <!--header-->

    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="images/logo.png" width="200" height="40" />
            </div>

            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />

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
                            <span >Register</span>
                        </div>
                        <form id="RegForm" method="POST">
                            <text id="regText"></text>
                            <input type="text" name="RegisterUsername" placeholder="Username" />
                            <input type="email" name="RegisterEmail" placeholder="Email" />
                            <input type="text" name="RegisterAdress" placeholder="Adress" />
                            <input id="button" type="password" name="RegisterPassword" placeholder="Password" />
                            <input type="submit" class="btn" value="Register"></input>
                            <a class="btn" href="login.php">Go to Login</a>
                            <!---<button type="submit" class="btn">Register</button>-->
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