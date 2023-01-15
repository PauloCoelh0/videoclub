<?php
include('../includes/connect.php');
include('../common_functions.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Forgot Password</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <form action="forgot_password.php" method="post">
                    <h3 class="text-center">Recover your password</h3>
                    <p>
                        Please enter your email address you used to sign up on this website and website and we
                        will assist you in your recovering password
                    </p>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="forgot-password"
                            class="btn btn-primary btn-b lock btn-lg mt-3 justify-content-center">Recover
                            your password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>