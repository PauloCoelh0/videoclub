<?php
include('../includes/connect.php');
include('../common_functions.php');
@session_start();


if (!isset($_SESSION['admin_name'])) {
    echo "<script>window.open('admin_login.php','_self')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
        .product_img {
            width: 60px;
            height: 100px;
            object-fit: contain;
        }
    </style>

</head>

<body>
    <!-- navbar -->

    <div class="container-fluid p-0">
        <!-- 1st -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-bar">
                        <li class="nav-item">
                            <a href="logout.php" class="nav"> Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- 2nd -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- 3rd -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-4">
                    <a href="#"><img src="../images/admin.jpg" alt="" class="admin-img"></a>
                    <?php
                    if (isset($_SESSION['admin_name'])) {
                        echo "<strong><p class='text-warning text-center pt-2'>" . $_SESSION['admin_name'] . "</p></strong>";
                    }
                    ?>

                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_movies.php" class="nav-link text-light bg-dark my-1">Insert
                            Movies</a></button>
                    <button class="my-3"><a href="index.php?view_movies" class="nav-link text-light bg-dark my-1">View
                            Movies</a></button>
                    <button class="my-3"><a href="index.php?return_movies"
                            class="nav-link text-light bg-dark my-1">Return Movies</a></button>
                    <button class="my-3"><a href="index.php?insert_category"
                            class="nav-link text-light bg-dark my-1">Insert categories</a></button>
                    <button class="my-3"><a href="index.php?view_categories"
                            class="nav-link text-light bg-dark my-1">View categories</a></button>
                    <button class="my-3"><a href="index.php?insert_languages"
                            class="nav-link text-light bg-dark my-1">Insert languages</a></button>
                    <button class="my-3"><a href="index.php?view_languages"
                            class="nav-link text-light bg-dark my-1">View languages</a></button>
                    <button class="my-3"><a href="index.php?list_orders" class="nav-link text-light bg-dark my-1">All
                            orders</a></button>
                    <button class="my-3"><a href="index.php?list_payments" class="nav-link text-light bg-dark my-1">All
                            payments</a></button>
                    <button class="my-3"><a href="index.php?list_users" class="nav-link text-light bg-dark my-1">Users
                            List</a></button>
                </div>
            </div>
        </div>



        <!-- 4th -->

        <div class="my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_languages'])) {
                include('insert_languages.php');
            }
            if (isset($_GET['view_movies'])) {
                include('view_movies.php');
            }
            if (isset($_GET['edit_movies'])) {
                include('edit_movies.php');
            }
            if (isset($_GET['delete_movies'])) {
                include('delete_movies.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_languages'])) {
                include('view_languages.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_categories.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_categories.php');
            }
            if (isset($_GET['edit_language'])) {
                include('edit_languages.php');
            }
            if (isset($_GET['delete_language'])) {
                include('delete_languages.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['return_movies'])) {
                include('return_movies.php');
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

</html>