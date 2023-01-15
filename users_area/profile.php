<?php
include('../includes/connect.php');
include('../common_functions.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile </title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <!-- font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css">

    <style>
        .body {
            overflow-x: hidden;
        }

        .edit_img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>

</head>

<body class=""
    style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(47,47,185,0.8379726890756303) 65%, rgba(0,212,255,1) 100%);">
    <nav class=" navbar navbar-expand-lg navbar-light"
        style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(47,47,185,0.8379726890756303) 65%, rgba(0,212,255,1) 100%);">
        <div class="container-fluid ">
            <img src="../images/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../display_all.php">Movies</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                <?php cart_item(); ?>
                            </sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../cart.php">Total Price: <?php total_cart_price(); ?>€</a>
                    </li>
            </div>
        </div>
    </nav>



    <!-- calling cart -->


    <!-- 2nd -->


    <nav class="navbar navbar-expand-lg navbar-dark ">
        <ul class="navbar-nav me-auto">
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <strong><a class='nav-link' href='#'> Guest</a></strong>
            </li>";
            } else {
                echo "<li class='nav-item'>
                <strong><a class='nav-link' href='./profile.php'> " . $_SESSION['username'] . "</a></strong>
            </li>";
            }
            ?>
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <strong><a class='nav-link' href='./user_login.php'>Login</a></strong>
            </li>";
            } else {
                echo "<strong><li class='nav-item'><a class='nav-link' href='./logout.php'>Logout</a></strong>
            </li>";
            }
            ?>
        </ul>
    </nav>


    <!-- 3rd  -->
    <!-- <div class="bg-light">
        <h3 class="text-center">ESTG Video Club</h3>
        <p class="text-center">All the movies in only one place</p>
    </div> -->

    <!-- 4rd  -->

    <div class="row">
        <div class="col-md-2 p-2 mt-5">
            <ul class="navbar-nav  text-center">
                <li class="nav-item bg- ">
                    <a class="nav-link text-light " href="#">
                        <h4>
                            <?php echo " $_SESSION[username]" ?>
                        </h4>
                    </a>
                </li>
                <?php

                $username = $_SESSION['username'];

                $stmt = $con->prepare("SELECT * FROM user_table WHERE username=?");
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_array();
                $user_img = $row['user_image'];


                // $user_image = "SELECT * FROM user_table WHERE username='$username'";
                // $result_img = mysqli_query($con, $user_image);
                // $row_image = mysqli_fetch_array($result_img);
                //$user_img = $row_image['user_image'];
                

                echo "<li class='nav-item'>
                <img src='./user_images/$user_img' alt='Avatar' class='profile_img my-4' alt=''></a>
            </li>"
                    ?>

                <li class="nav-item">
                    <a class="nav-link text-light " href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light " href="profile.php?edit_account"> Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light " href="profile.php?my_orders"> My orders</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-light " href="profile.php?delete_account"> Delete account</a>
                </li> -->
                <li class="nav-item pb-2">
                    <a class="nav-link text-light " href="logout.php">Logout </a>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <?php user_order_details();
            if (isset($_GET['edit_account'])) {
                include('edit_account.php');
            }
            if (isset($_GET['my_orders'])) {
                include('user_orders.php');
            }
            if (isset($_GET['delete_account'])) {
                include('delete_account.php');
            }

            ?>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>