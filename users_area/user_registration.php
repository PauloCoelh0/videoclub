<?php
include_once('../includes/connect.php');
include_once('../common_functions.php');
include_once('../emailController.php')
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

    <!-- font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">



</head>

<body>

    <section style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(47,47,185,0.8379726890756303) 65%, rgba(0,212,255,1) 100%); height: 100% ;
    width: 100%;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3" style="margin-right: 32 %">
            <div class="container h-100 p-4" style="margin-left: 8%">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card card-register" style="border-radius: 15px; width: 300%;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="form-outline mb-4">
                                        <label for="user_username" class="form-label"><strong>Username</strong></label>
                                        <input type="text" id="user_username" class="form-control"
                                            placeholder="Enter your username" autocomplete="off" required="required"
                                            name="user_username" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="user_email" class="form-label"><strong>Email</strong></label>
                                        <input type="email" id="user_email" class="form-control"
                                            placeholder="Enter your email"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" autocomplete="off"
                                            required="required" name="user_email" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="user_image" class="form-label"><strong>Image</strong></label>
                                        <input type="file" id="user_image" class="form-control" required="required"
                                            name="user_image" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="user_password" class="form-label"><strong>Password</strong></label>
                                        <input type="password" id="user_password" class="form-control"
                                            placeholder="Enter your password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                            autocomplete="off" required="required" name="user_password" />
                                    </div>



                                    <div class="form-outline mb-4">
                                        <label for="conf_user_password" class="form-label"><strong>Repeat
                                                Password</strong></label>
                                        <input type="password" id="conf_user_password" class="form-control"
                                            placeholder="Repeat your password"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                            autocomplete="off" required="required" name="conf_user_password" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="user_address" class="form-label"><strong>Address</strong></label>
                                        <input type="text" id="user_address" class="form-control"
                                            placeholder="Enter your address" autocomplete="off" required="required"
                                            name="user_address" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label for="user_contact" class="form-label"><strong>Enter your mobile
                                                phone</strong></label>
                                        <input type="text" id="user_contact" class="form-control"
                                            placeholder="Enter your contact" autocomplete="off" required="required"
                                            name="user_contact" />
                                    </div>
                                    <div>
                                        <input type="submit" value="Register"
                                            class="text-light bg-dark border-0 py-2 px-3" name="user_register">
                                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a
                                                href="user_login.php">Login</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>


<?php

if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();
    $token = bin2hex(random_bytes(50));
    $verified = false;

    //select query 

    // $select_query = "SELECT * from user_table WHERE username='$user_username' or user_email='$user_email'";
    // $result = mysqli_query($con, $select_query);
    // $rows_count = mysqli_num_rows($result);


    $select_query = $con->prepare("SELECT * from user_table WHERE username=? or user_email=?");
    $select_query->bind_param("ss", $user_username, $user_email);
    $select_query->execute();
    $result = $select_query->get_result();
    if ($row_count = $result->num_rows > 0) {
        echo "<script>window.open('../index.php','_self')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Password do not match')</script>";

    } else {
        //insert query
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");

        $stmt = $con->prepare("INSERT INTO user_table(username,user_email,user_password,user_image,user_ip,user_address,user_mobile,token,verified) VALUES (?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("ssssssssi", $user_username, $user_email, $hash_password, $user_image, $user_ip, $user_address, $user_contact, $token, $verified);

        if ($stmt->execute()) {
            echo "<script>window.open('../index.php','_self')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";

            sendVerificationEmail($user_email, $token);

        }
        ;

        $stmt->close();
    }

    // $insert_query = "INSERT INTO user_table (username,user_email,user_password,user_image,user_ip,user_address,user_mobile,token,verified) 
    // VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact','$token','$verified') ";
    // $sql_execute = mysqli_query($con, $insert_query);
    // if ($sql_execute) {
    //     echo "<script>alert('User Registered')</script>";
    //     echo "<script>window.open('user_login.php','_self')</script>";
    //     sendVerificationEmail($user_email, $token);
    // }

    // selecting cart items

    // $select_cart_item = "SELECT * FROM cart_details WHERE ip_address='$user_ip";
    // $result_cart = mysqli_query($con, $select_cart_item);
    // $rows_count = mysqli_num_rows($result_cart);

    $select_cart_item = $con->prepare("SELECT * FROM cart_details WHERE ip_address=?");
    $select_cart_item->bind_param('s', $user_ip);
    $result_cart = $select_cart_item->get_result();


    if ($row_count_cart = $result_cart->num_rows > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    echo "<script>window.open('../index.php','_self')</script>";
}






?>