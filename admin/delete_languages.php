<?php
if (isset($_GET['delete_language'])) {
    $delete_language = $_GET['delete_language'];

    $delete_query = $con->prepare("DELETE FROM languages WHERE language_id=?");
    $delete_query->bind_param('i', $delete_language);
    $delete_query->execute();
    $result = $delete_query->get_result();

    //$delete_query = "DELETE FROM languages WHERE language_id=$delete_language";
    // $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('Language deleted successfully')</script>";
        echo "<script>window.open('index.php?view_languages','_self')</script>";
    }
}


?>