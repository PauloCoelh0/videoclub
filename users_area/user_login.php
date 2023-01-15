<?php
include('../includes/connect.php');
include('../common_functions.php');
@session_start();


if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}

if (isset($_GET['password-token'])) {
    $passwordToken = $_GET['password-token'];
    resetPassword($passwordToken);
}



if(isset($_REQUEST['remember_me']))
{
    $_SESSION['username'] = $_POST['user_username'];
    $_SESSION['start_time'] = time();
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

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

    <section class="custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10 pb-2">
                    <div class="card" style="border-radius: 1rem;">

                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="../images/image2.jpg" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">

                                <div class="card-body p-4 p-lg-5 text-black">
                                    <h2 style="padding-bottom:50px">LOGIN INTO YOUR ACCOUNT</h2>
                                    <form action="" method="post">

                                        <div class="form-outline mb-4">

                                            <label for="user_username"
                                                class="form-label"><strong>Username</strong></label>
                                            <input type="text" id="user_username" class="form-control"
                                                placeholder="Enter your username" autocomplete="off" required="required"
                                                name="user_username" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label for="user_password"
                                                class="form-label"><strong>Password</strong></label>
                                            <input type="password" id="user_password" class="form-control"
                                                placeholder="Enter your password" autocomplete="off" required="required"
                                                name="user_password" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label for="remember_me">Remember Me </label>
                                            <input type="checkbox" id="remember_me" class="form-check-input" name="remember_me" />
                                        </div>
                                        <div>
                                            <input type="submit" value="Login"
                                                class="text-light bg-dark border-0 py-2 px-3" name="user_login">
                                            <p class="small fw-bold mt-2 pt-1">Dont have an account? <a
                                                    href="user_registration.php">Register</a>
                                            <div class="small fw-bold mt-2 pt-1"><a href="forgot_password.php">Forgot
                                                    Password?</a>
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







if (isset($_POST['user_login'])) {

    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];


    $stmt = $con->prepare("SELECT * FROM user_table WHERE username=?");
    $stmt->bind_param('s', $user_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row_data = $result->fetch_assoc();
    $user_ip = getIPAddress();



    if ($row_count = $result->num_rows == 0) {
        echo "<script>alert('Invalid credentials')</script>";
    }
    if ($row_count = $result->num_rows > 0) {
        $verified = $row_data['verified'];
        $_SESSION['username'] = $user_username;
        if ($verified == 0) {
            echo "<script>alert('Verify your account please')</script>";
        } else {
            if (password_verify($user_password, $row_data['user_password'])) {
                if (isset($_GET['ref'])) {
                    $referringpage = $_GET['ref'];
                    if (($referringpage) === '/videoclub/users_area/checkout.php') {
                        echo "<script>alert('Login Successfully')</script>";
                        echo "<script>window.open('checkout.php','_self')</script>";

                    }
                } else {
                    echo "<script>alert('Login Successfully')</script>";
                    echo "<script>window.open('../index.php','_self')</script>";
                }

            } else {
                echo "<script>alert('Invalid credentials')</script>";
            }
        }
    }

}

?>