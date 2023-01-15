<?php
include('includes/connect.php');
include_once('common_functions.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clube video</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <!-- font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>

<body class=""
    style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(47,47,185,0.8379726890756303) 65%, rgba(0,212,255,1) 100%);">
    <nav class=" navbar navbar-expand-lg navbar-light"
        style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(47,47,185,0.8379726890756303) 65%, rgba(0,212,255,1) 100%);">
        <div class="container-fluid ">
            <img src="./images/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="display_all.php">Movies</a>
                    </li>
                    <?php

                    if (isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='./users_area/profile.php'>My Account</a>
                    </li>";
                    } else {
                        echo "'<li class='nav-item'>
                        <a class='nav-link text-light' href='./users_area/user_registration.php'>Register</a>
                    </li>";
                    }

                    ?>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="cart.php"><i
                                class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                    </li>


            </div>
        </div>
    </nav>



    <!-- calling cart -->
    <?php
    cart();
    ?>

    <!-- 2nd -->


    <nav class=" navbar navbar-expand-lg navbar-light ">
        <ul class="navbar-nav me-auto">
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'> Guest</a>
            </li>";
            } else {
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/profile.php'> " . $_SESSION['username'] . "</a>
            </li>";
            }
            ?>
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>";
            } else {
                echo "<li class='nav-item'><a class='nav-link' href='./users_area/logout.php'>Logout</a>
            </li>";
            }
            ?>
        </ul>
    </nav>


    <!-- 3rd -->
    <!-- <div class="bg-light">
        <h3 class="text-center">ESTG Video Club</h3>
        <p class="text-center">All the movies in only one place</p>
    </div> -->


    <!--4th -->

    <div class="container">
        <div class="row">
            <form action="" method="post">
                <table class="table table-bordered text-center">

                    <?php
                    global $con;
                    $get_ip_add = getIPAddress();
                    $total_price = 0;
                    $cart_query = "SELECT * from cart_details where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<thead>
                        <tr>
                            <th class='text-light'>Movie Title</th>
                            <th class='text-light'>Movie Image</th>
                            <th class='text-light'>Total Price</th>
                            <th class='text-light'>Remove</th>
                        </tr>
                    </thead>
                    <tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            $movie_id = $row['movie_id'];
                            $select_movies = "SELECT * FROM movies WHERE movie_id='$movie_id'";
                            $result_movies = mysqli_query($con, $select_movies);
                            while ($row_movie_price = mysqli_fetch_array($result_movies)) {
                                $movie_price = array($row_movie_price['movie_price']);
                                $price_table = $row_movie_price['movie_price'];
                                $movie_title = $row_movie_price['movie_title'];
                                $movie_image1 = $row_movie_price['movie_image1'];
                                $movie_value = array_sum($movie_price);
                                $total_price += $movie_value;
                                ?>
                                <tr>
                                    <td class='text-light align-middle'><?php echo $movie_title ?></td>
                                    <td><img src="././admin/movie_images/<?php echo $movie_image1 ?>" alt="" class="cart_img">
                                    </td>
                                    <td class='text-light align-middle'>
                                        <?php echo $price_table ?>€
                                    </td>
                                    <td class="align-middle"><input type="checkbox" name="remove_item[]"
                                            value="<?php echo $movie_id ?>"></td>
                                </tr>
                            <?php }
                        }
                    } else {
                        echo "<h2 class='text-center text-danger'> Cart is empty</h2>";
                    }
                    ?>


                    </tbody>
                </table>
                <!-- subtotal -->
                <div class=" d-flex mb-5">

                    <?php global $con;
                    $get_ip_add = getIPAddress();
                    $cart_query = "SELECT * from cart_details where ip_address='$get_ip_add'";
                    $result = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        echo "<h4 class='px-3 text-light'>Total: <strong class='text-light'> $total_price €</strong>
                        </h4>
                        <input type='submit' value='Continue Shopping'
                            class='bg-light px-3 py-2 border-0 mx-3 d-flex flex-row-reverse bd-highligh'
                            name='continue_shopping'>

                        <button class='bg-success px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>

                        <input type='submit' value='Remove'
                            class='bg-danger px-3 py-2 border-0 mx-3 d-flex flex-row-reverse bd-highligh'
                            name='remove_cart'>";

                    } else {
                        echo "<input type='submit' value='Continue Shopping'
                        class='bg-light border-0 px-3 py-2'
                        name='continue_shopping'>";

                    }

                    if (isset($_POST['continue_shopping'])) {
                        echo "<script>window.open('index.php','_self')</script>";

                    }
                    ?>



                </div>
            </form>
        </div>
    </div>

    <!-- func to remove items -->
    <?php

    function remove_cart_item()
    {
        global $con;
        if (isset($_POST['remove_cart'])) {
            if (!empty($_POST['remove_item'])) {
                foreach ($_POST['remove_item'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "DELETE FROM cart_details WHERE movie_id=$remove_id";
                    $run_delete = mysqli_query($con, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }

        }

    }
    echo $remove_item = remove_cart_item();

    ?>






    </div>










    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>

</html>