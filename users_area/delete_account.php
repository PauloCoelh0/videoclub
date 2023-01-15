<div class="container-fluid m-3">
    <h2 class="text-center"> Delete account </h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="lg-12 col-xl-6">
            <form action="" method="post">
                <!-- password -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label"><strong>Password</strong></label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                        autocomplete="off" required="required" name="user_password" />
                </div>
                <div class="form-outline">
                    <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
                </div>
            </form>
        </div>
    </div>

    <?php

    if (isset($_POST['delete'])) {
        $username_session = $_SESSION['username'];

        $select_query = $con->prepare("SELECT * FROM user_table WHERE username=?");
        $select_query->bind_param('s', $username_session);
        $select_query->execute();
        $user_password = $_POST['user_password'];
        $result_select = $select_query->get_result();
        $row_data = $result_select->fetch_assoc();

        // $select_query = "SELECT * FROM user_table WHERE username='$username_session'";
        // $user_password = $_POST['user_password'];
        // $result_select = mysqli_query($con, $select_query);
        // $row_data = mysqli_fetch_assoc($result_select);
    
        if (password_verify($user_password, $row_data['user_password'])) {
            $delete_query = "DELETE FROM user_table WHERE username='$username_session'";
            $result = mysqli_query($con, $delete_query);
            if ($result) {
                session_destroy();
                echo "<script>alert('Account has been successfully deleted')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Wrong Password')</script>";
        }
    }
    ?>