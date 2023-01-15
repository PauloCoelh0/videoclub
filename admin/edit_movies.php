<?php

if (isset($_GET['edit_movies'])) {
    $edit_id = $_GET['edit_movies'];


    // $get_data = "SELECT * FROM movies WHERE movie_id=$edit_id";
    // $result = mysqli_query($con, $get_data);
    // $row = mysqli_fetch_assoc($result);

    $get_data = $con->prepare("SELECT * FROM movies WHERE movie_id=?");
    $get_data->bind_param('i', $edit_id);
    $get_data->execute();
    $result = $get_data->get_result();
    $row = $result->fetch_assoc();



    $movie_title = $row['movie_title'];
    $movie_description = $row['movie_description'];
    $movie_keywords = $row['movie_keywords'];
    $category_id = $row['category_id'];
    $language_id = $row['language_id'];
    $movie_image1 = $row['movie_image1'];
    $movie_image2 = $row['movie_image2'];
    $movie_image3 = $row['movie_image3'];
    $movie_price = $row['movie_price'];
    $movie_status = $row['status'];










    //fetching category name
    $select_category = "SELECT * FROM categories WHERE category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_cat = mysqli_fetch_assoc($result_category);
    $category_title = $row_cat['category_title'];

    //fetching language name
    $select_language = "SELECT * FROM languages WHERE language_id=$language_id";
    $result_language = mysqli_query($con, $select_language);
    $row_cat = mysqli_fetch_assoc($result_language);
    $language_title = $row_cat['language_title'];
}




?>



<div class="m-5">
    <h1 class="text-center">Edit Movies</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mt-4">
            <label for="movie_title" class="form-label">Movie Title</label>
            <input type="text" id="movie_title" value=<?php echo $movie_title ?> name="movie_title" class="form-control"
                required="required">
        </div>
        <div class="form-outline w-50 m-auto mt-4">
            <label for="movie_description" class="form-label">Movie Description</label>
            <input type="text" id="movie_desc" value="<?php echo $movie_description ?>" name="movie_desc"
                class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mt-4">
            <label for="movie_keywords" class="form-label">Movie Keywords</label>
            <input type="text" id="movie_keywords" value="<?php echo $movie_keywords ?>" name="movie_keywords"
                class="form-control" required="required">
        </div>
        <!-- <div class="form-outline w-50 m-auto mt-4">
            <label for="movie_category" class="form-label">Movie Category</label>
            <select name="movie_category" class="form-select">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php
                $select_category_all = "SELECT * FROM categories";
                $result_category_all = mysqli_query($con, $select_category_all);
                while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                    $category_title = $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value = '$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div> -->

        <!-- </div>
<div class="form-outline w-50 m-auto mt-4">
    <label for="movie_language" class="form-label">Movie Language</label>
    <select name="movie_languages" class="form-select">
        <option value="<?php echo $language_title ?>"><?php echo $language_title ?></option>
        <?php
        $select_language_all = "SELECT * FROM languages";
        $result_language_all = mysqli_query($con, $select_language_all);
        while ($row_language_all = mysqli_fetch_assoc($result_language_all)) {
            $language_title = $row_language_all['language_title'];
            $language_id = $row_language_all['language_id'];
            echo "<option value = '$language_id'>$language_title</option>";
        }
        ?>
    </select>
</div> -->


        <!-- <div class="form-outline w-50 m-auto mt-4">
    <label for="movie_image1" class="form-label">Movie Image 1</label>
    <div class="d-flex">
        <input type="file" id="movie_image1" value="$movie_image1" name="movie_image1" class="form-control w-90 m-auto">
        <img src="./movie_images/<?php echo $movie_image1 ?>" alt="" class="product_img">
    </div>
</div>
<div class="form-outline w-50 m-auto mt-4">
    <label for="movie_image2" class="form-label">Movie Image 2</label>
    <div class="d-flex">
        <input type="file" id="movie_image2" name="movie_image2" class="form-control w-90 m-auto">
        <img src="./movie_images/<?php echo $movie_image2 ?>" alt="" class="product_img">
    </div>
</div>
<div class="form-outline w-50 m-auto mt-4">
    <label for="movie_image3" class="form-label">Movie Image 3</label>
    <div class="d-flex">
        <input type="file" id="movie_image3" name="movie_image3" class="form-control w-90 m-auto">
        <img src="./movie_images/<?php echo $movie_image3 ?>" alt="" class="product_img">
    </div>
</div> -->
        <div class="form-outline w-50 m-auto mt-4">
            <label for="movie_price" class="form-label">Movie Price</label>
            <input type="text" id="movie_price" value="<?php echo $movie_price ?>" name=" movie_price"
                class="form-control" required="required">
        </div>
        <!-- <div class="form-outline w-50 m-auto mt-4">
            <label for="movie_status" class="form-label">Movie Status</label>
            <input type="text" id="movie_status" value="<?php echo $movie_status ?>" name=" movie_status"
                class="form-control" required="required">
        </div> -->

        <div class="form-outline w-50 m-auto mt-4">
            <Select value="<?php echo $movie_status ?>" name=" movie_status" class="form-control" required="required">
                <option>
                    <?php echo $movie_status ?>
                </option>
                <option>Available</option>
                <option>Pending</option>
                <option>Unavailable</option>
            </Select>
        </div>




        <div class="text-center">
            <input type="submit" name="edit_movie" value="Update Movie" class="btn btn-info px-3 mt-3 w-50">
        </div>
    </form>
</div>


<?php

if (isset($_POST['edit_movie'])) {

    $movie_title = $_POST['movie_title'];
    $movie_desc = $_POST['movie_desc'];
    $movie_keywords = $_POST['movie_keywords'];
    $movie_price = $_POST['movie_price'];
    $movie_status = $_POST['movie_status'];

    $update_movies = $con->prepare("UPDATE movies SET movie_title=?,
    movie_description=?, movie_keywords=?, movie_price=?,
    status=? WHERE movie_id=? ");
    $update_movies->bind_param('sssssi', $movie_title, $movie_desc, $movie_keywords, $movie_price, $movie_status, $edit_id);
    $update_movies->execute();
    // $result_update = $update_movies->get_result();
    if ($update_movies) {
        echo "<script>alert('Movie update successfully')</script>";
        echo "<script>window.open('index.php?view_movies','_self')</script>";
    }
}






?>