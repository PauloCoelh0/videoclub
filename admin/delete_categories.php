<?php
if (isset($_GET['delete_category'])) {
    $delete_category = $_GET['delete_category'];


    $delete_query = $con->prepare("DELETE FROM categories WHERE category_id=?");
    $delete_query->bind_param('i', $delete_category);
    $delete_query->execute();
    $result = $delete_query->get_result();

    // $delete_query = "DELETE FROM categories WHERE category_id=$delete_category";
    // $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}


?>