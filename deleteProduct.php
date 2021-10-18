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
    $id = $_POST['userId'];

    if( !empty($id) ){

        $query = "delete from phones where id='$id' limit 1";

        if( mysqli_query($con,$query) ){
            header("Location: deleteProduct.php");
            die;
        }else{
            echo "Failed";
            header("Location: deleteProduct.php");
            die;
        }

    }else{
        echo "Delete field is empty";
        header("Location: deleteProduct.php");
        die;
    }
}

?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <title>Delete product - PhoneStore</title>
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
    <!--TABLE-->
    <div class="user-container">

        <table>
            <tr>
                <th id="head">Id</th>
                <th id="head">Picture name</th>
                <th id="head">Price</th>
                <th id="head">title</th>
                <th id="head">Delete</th>
            </tr>

            <?php

                $query = "SELECT * from phones";
                $result = mysqli_query($con,$query);

                if( $result && mysqli_num_rows($result) > 0 ){
                    while ( $row = mysqli_fetch_assoc($result) ){
                        echo "<tr><td><div class='cart-info'>". $row['id'] ."</div></td><td><div class='cart-info'>". $row['name'] ."</div></td><td><div class='cart-info'>". $row['price'] ."</div></td><td><div class='cart-info'>". $row['title'] ."</div></td>
                        <td><div class='cart-info'>
                            <form method='POST'>
                                <input type='hidden' name='userId' value='".$row['id']."' />
                                <input type='submit' class='btn' value='Delete'/>
                            </form>
                        </div></td></tr>";
                    }

                }else{
                    echo "No results";
                }

            ?>

            
        </table>
        
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

    <style>
        .user-container {
            max-width: 1080px;
            margin: auto;
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 111px;
            padding-bottom: 111px;
        }

        table {
            width: 1080px;
        }

        tr {
            width: 1080px;
            justify-content: space-around;
        }

        #head {
            width: 180px;
        }

        td {
            width: 180px;
        }
    </style>

    <!--scripts-->
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            }
            else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>



</body>
</html>