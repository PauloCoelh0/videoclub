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
    <title>Payment Page</title>

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
        img {
            width: 80%;
        }
    </style>
</head>

<body>

    <?php

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user_ip = getIPAddress();

        $get_user = $con->prepare("SELECT * FROM user_table where user_ip=? and username=?");
        $get_user->bind_param('ss', $user_ip, $username);
        $get_user->execute();
        $result = $get_user->get_result();
        $run_query = $result->fetch_assoc();
        $user_id = $run_query['user_id'];

        // $get_user = "SELECT * FROM user_table where user_ip='$user_ip' and username='$username'";
        // $result = mysqli_query($con, $get_user);
        // $run_query = mysqli_fetch_array($result);
    
        echo "<div class='container'>
        <h2 class='text-center text-info'>Payment Options</h2>
        <div class='row d-flex justify-content-center align-items-center'>
            <div class='col-md-6'>
                <a href=''><strong>(Soon)</strong><img src='../images/paypal.png' alt=''></a>
            </div>
            <div class='col-md-6'>
                <a href='order.php?user_id=$user_id' target='_self'>
                    <h2 class='text'>Fake Payment</h2>
                </a>
            </div>
        </div>
    </div>";

    } else {
        $referringpage = $_SERVER['REQUEST_URI'];
        echo "<script>window.open('user_login.php?ref=$referringpage','_self')</script>";
    }
    ?>


</body>

</html>