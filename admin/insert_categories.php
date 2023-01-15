<?php
include('../includes/connect.php');



if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    // select data from db

    // $select_query = "Select * from categories where category_title='$category_title'";
    // $result_select = mysqli_query($con, $select_query);
    // $number = mysqli_num_rows($result_select);

    $select_query = $con->prepare("SELECT * FROM categories WHERE category_title=?");
    $select_query->bind_param('s', $category_title);
    $select_query->execute();
    $result_select = $select_query->get_result();


    if ($number = $result_select->num_rows > 0) {
        echo "<script>alert('Category is already been added')</script>";
    } else {

        // $insert_query = "INSERT into categories (category_title) values ('$category_title')";
        // $result = mysqli_query($con, $insert_query);

        $insert_query = $con->prepare("INSERT INTO categories (category_title) values (?)");
        $insert_query->bind_param('s', $category_title);
        $insert_query->execute();
        $result = $insert_query->get_result();

        if ($result) {
            echo "<script>alert('Category as been insert successfully')</script>";

        }
    }
}


?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-50 mb-2 m-auto">
        <span class="input-group-text bg-dark" id="basic-addon1"><i class="fa-solid fa-receip"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-50 mb-2 m-auto">
        <input type="submit" class="bg-dark border-0 p-2 my-3 text-light" name="insert_cat" value="Insert Categories">
    </div>
</form>