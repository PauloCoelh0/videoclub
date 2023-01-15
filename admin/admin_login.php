<!DOCTYPE html>
<html lang="en">

<?php
include('../includes/connect.php');
include('../common_functions.php');
@session_start();



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

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

    <section class="vh-100" style="background-color: #8a8a8a; overflow-y: hidden;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10 pb-2">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="../images/admin1.jpg" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="" method="post">

                                        <div class="form-outline mb-4">
                                            <label for="admin_name" class="form-label"><strong>Username</strong></label>
                                            <input type="text" id="admin_name" class="form-control"
                                                placeholder="Enter your name" autocomplete="off" required="required"
                                                name="admin_name" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label for="admin_password"
                                                class="form-label"><strong>Password</strong></label>
                                            <input type="password" id="admin_password" class="form-control"
                                                placeholder="Enter your password" autocomplete="off" required="required"
                                                name="admin_password" />
                                        </div>
                                        <div>
                                            <input type="submit" value="Login"
                                                class="text-light bg-dark border-0 py-2 px-3" name="admin_login">
                                        </div>
                                        </p>
                                </div>
                                </form>
                            </div>
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


if (isset($_POST['admin_login'])) {
    global $con;
    $admin_name = $_POST['admin_name'];
    $admin_pwd = $_POST['admin_password'];
    $select_query = $con->prepare("SELECT * FROM admin_table WHERE admin_name=?");
    $select_query->bind_param('s', $admin_name);
    $select_query->execute();
    $result = $select_query->get_result();
    $row_data = $result->fetch_assoc();

    // $select_query = "SELECT * FROM admin_table WHERE admin_name='$admin_name'";
    // $result = mysqli_query($con, $select_query);
    // $row_count = mysqli_num_rows($result);
    // $row_data = mysqli_fetch_assoc($result);





    if ($row_count = $result->num_rows == 0) {
        echo "<script>alert('Invalid credentials')</script>";
    }

    if ($row_count = $result->num_rows > 0) {
        $_SESSION['admin_name'] = $admin_name;
        if (md5($admin_pwd) == $row_data['pwd']) {
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            echo "<script>alert('Invalid credentials')</script>";
        }
    }
}