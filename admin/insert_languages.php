<?php
include('../includes/connect.php');



if (isset($_POST['insert_language'])) {
    $language_title = $_POST['lang_title'];

    // select data from db

    $select_query = $con->prepare("SELECT * FROM languages WHERE language_title=?");
    $select_query->bind_param('s', $language_title);
    $select_query->execute();
    $result_select = $select_query->get_result();


    // $select_query = "Select * from languages where language_title='$language_title'";
    // $result_select = mysqli_query($con, $select_query);
    // $number = mysqli_num_rows($result_select);


    if ($number = $result_select->num_rows > 0) {
        echo "<script>alert('language is already been added')</script>";
    } else {

        $insert_query = $con->prepare("INSERT INTO languages (language_title) values (?)");
        $insert_query->bind_param('s', $language_title);
        $insert_query->execute();
        $result = $insert_query->get_result();

        // $insert_query = "INSERT into languages (language_title) values ('$language_title')";
        // $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('language as been insert successfully')</script>";
        }
    }
}


?>
<h2 class="text-center">Insert Languages</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-50 mb-2 m-auto">
        <span class="input-group-text bg-dark" id="basic-addon1"><i class="fa-solid fa-receip"></i></span>
        <input type="text" class="form-control" name="lang_title" placeholder="Insert languages" aria-label="languages"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-50 mb-2 m-auto">
        <input type="submit" class="bg-dark border-0 p-2 my-3 text-light" name="insert_language"
            value="Insert Languages">

    </div>
</form>