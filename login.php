<?php

    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name = $_POST['LoginUsername'];
        $password = $_POST['LoginPassword'];

        if( $user_name == "Admin" && $password == "parolaparolaparola"){
            $_SESSION['user_id'] = '83603738';
            header("Location: admin.php");
            die;
        }


        if( !empty($user_name) && !empty($password) ){

            //read from db
            $query = "select * from users where user_name = '$user_name' limit 1";

            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    //get user data
                    $user_data = mysqli_fetch_assoc($result);

                    if( $user_data['password'] == $password ){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }else{
                        echo '<script>alert("Invalid login")</script>';
                        echo '<script>window.location="login.php"</script>';
                    }


                    return $user_data;
                }
            }

            echo '<script>alert("Invalid login")</script>';
            echo '<script>window.location="login.php"</script>';
        }else{
            echo '<script>alert("Invalid login")</script>';
            echo '<script>window.location="login.php"</script>';
        }

    }



?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <title>Login - PhoneStore</title>
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
                            <span >Login</span>
                        </div>
                        <form  method="POST">
                            <input type="text" placeholder="Username" name="LoginUsername"/>
                            <input type="password" placeholder="Password" name="LoginPassword"/>
                            <input id="button" type="submit" class="btn" value="Login" />
                            <a href="signup.php" class="btn">Go to register</a>
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