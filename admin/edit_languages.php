<?php

if (isset($_GET['edit_language'])) {
    $edit_language = $_GET['edit_language'];



    $get_languages = $con->prepare("SELECT * FROM languages WHERE language_id=?");
    $get_languages->bind_param('i', $edit_language);
    $get_languages->execute();
    $result = $get_languages->get_result();
    $row = $result->fetch_assoc();
    $language_title = $row['language_title'];

    // $get_languages = "SELECT * FROM languages WHERE language_id=$edit_language";
    // $result = mysqli_query($con, $get_languages);
    // $row = mysqli_fetch_assoc($result);
    // $language_title = $row['language_title'];
}
if (isset($_POST['edit_lang'])) {
    $lang_title = $_POST['language_title'];

    $update_query = $con->prepare("UPDATE languages SET language_title=? WHERE language_id=?");
    $update_query->bind_param('i,i', $lang_title, $edit_language);
    $update_query->execute();
    $result_lang = $update_query->get_result();

    // $update_query = "UPDATE languages SET language_title='$lang_title' WHERE language_id=$edit_language";
    // $result_lang = mysqli_query($con, $update_query);

    if ($result_lang) {
        echo "<script>alert('Language updated successfully')</script>";
        echo "<script>window.open('index.php?view_languages','_self')</script>";

    }

}



?>



<div class="mt-3 text-center">
    <h1 class="text-center">Edit Language</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto mt-4">
            <label for="language_title" class="form-label"><strong>Language Title</strong></label>
            <input type="text" name="language_title" id="language_title" class="form-control" required="required"
                value="<?php echo $language_title; ?>">
        </div>
        <input type="submit" value="Update" class="btn btn-info px-3 mb-3 w-50" name="edit_lang">
    </form>
</div>