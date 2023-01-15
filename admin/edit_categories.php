<?php

if (isset($_GET['edit_category'])) {
    $edit_category = $_GET['edit_category'];


    $get_categories = $con->prepare("SELECT * FROM categories WHERE category_id=?");
    $get_categories->bind_param('i', $edit_category);
    $get_categories->execute();
    $result = $get_categories->get_result();
    $row = $result->fetch_assoc();
    $category_title = $row['category_title'];


    // $get_categories = "SELECT * FROM categories WHERE category_id=$edit_category";
    // $result = mysqli_query($con, $get_categories);
    // $row = mysqli_fetch_assoc($result);
    // $category_title = $row['category_title'];
}
if (isset($_POST['edit_cat'])) {
    $cat_title = $_POST['category_title'];

    $update_query = $con->prepare("UPDATE categories SET category_title=? WHERE category_id=?");
    $update_query->bind_param('i,i', $cat_title, $edit_category);
    $update_query->execute();
    $result_cat = $update_query->get_result();



    // $update_query = "UPDATE categories SET category_title='$cat_title' WHERE category_id=$edit_category";
    // $result_cat = mysqli_query($con, $update_query);

    if ($result_cat) {
        echo "<script>alert('Category updated successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";

    }

}



?>



<div class="mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto mt-4">
            <label for="category_title" class="form-label"><strong>Category Title</strong></label>
            <input type="text" name="category_title" id="category_title" class="form-control" required="required"
                value="<?php echo $category_title; ?>">
        </div>
        <input type="submit" value="Update" class="btn btn-info px-3 mb-3 w-50" name="edit_cat">
    </form>
</div>