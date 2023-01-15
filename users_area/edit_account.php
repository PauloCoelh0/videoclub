<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];


    // $select_query = "SELECT * FROM user_table WHERE username='$user_session_name'";
    // $result_query = mysqli_query($con, $select_query);
    // $row_fetch = mysqli_fetch_assoc($result_query);

    $select_query = $con->prepare("SELECT * FROM user_table WHERE username=?");
    $select_query->bind_param('s', $user_session_name);
    $select_query->execute();
    $result_query = $select_query->get_result();
    $row_fetch = $result_query->fetch_assoc();
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];

}

if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = $_POST['username'];
    $email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    //update query 


    $update_data = $con->prepare("UPDATE user_table SET username=?,user_email=?,user_image=?,user_address=?,
    user_mobile=? WHERE user_id=?");
    $update_data->bind_param('sssssi', $username, $email, $user_image, $user_address, $user_mobile, $user_id);
    $update_data->execute();

    $user_session_name = $_SESSION['username'];

    // $update_data = "UPDATE user_table SET username='$username',user_email='$email',user_image='$user_image',user_address='$user_address',
    // user_mobile='$user_mobile' WHERE user_id=$user_id";
    // $result_query_update = mysqli_query($con, $update_data);

    if ($update_data) {
        echo "<script>alert('Profile updated succesfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
        $_SESSION['username'] = $username;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>

<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class=" text-center">
        <div class=" form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $email ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control " name="user_image">
            <img src="./user_images/<?php echo $user_img ?>" alt="" class="edit_img">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="bg-dark py-2 px-3 border-0 text-light" name="user_update">
    </form>
</body>

</html>