<?php
include('../includes/connect.php');
if (isset($_POST['insert_movie'])) {

    $movie_title = $_POST['movie_title'];
    $description = $_POST['description'];
    $movie_keywords = $_POST['movie_keywords'];
    $movie_category = $_POST['movie_category'];
    $movie_languages = $_POST['movie_languages'];
    $movie_price = $_POST['movie_price'];
    $movie_status = $_POST['movie_status'];

    //images
    $movie_image1 = $_FILES['movie_image1']['name'];
    $movie_image2 = $_FILES['movie_image2']['name'];
    $movie_image3 = $_FILES['movie_image3']['name'];

    //image tmp name
    $temp_image1 = $_FILES['movie_image1']['tmp_name'];
    $temp_image2 = $_FILES['movie_image2']['tmp_name'];
    $temp_image3 = $_FILES['movie_image3']['tmp_name'];

    // checking empty cond
    if (
        $movie_title == '' or $description == '' or $movie_keywords == '' or $movie_category == '' or $movie_languages == ''
        or $movie_price == '' or $movie_image1 == '' or $movie_image2 == '' or $movie_image3 == ''
    ) {
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    } else {

        move_uploaded_file($temp_image1, "./movie_images/$movie_image1");
        move_uploaded_file($temp_image2, "./movie_images/$movie_image2");
        move_uploaded_file($temp_image3, "./movie_images/$movie_image3");

        //insert query 

        $insert_movies = "INSERT INTO movies (movie_title,movie_description,movie_keywords,category_id,language_id,movie_image1,movie_image2,movie_image3,
       movie_price,date,status) values ('$movie_title','$description','$movie_keywords','$movie_category','$movie_languages','$movie_image1',
       '$movie_image2','$movie_image3','$movie_price',NOW(),'$movie_status')";
        $result_query = mysqli_query($con, $insert_movies);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the movie')</script>";
            echo "<script>window.open('index.php?view_movies', '_self')</script>";
        }




    }


}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
    <title>Insert Movies-Admin Dashboard</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-light">
    <div class=" mt-3">
        <h1 class="text-center">Insert Movies</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto pt-4">
                <label for="movie_title" class="form-label">Movie Title</label>
                <input type="text" name="movie_title" id="movie_title" class="form-control"
                    placeholder="Enter Movie Title" autocomplete="off" required="required">
            </div>

            <!-- description -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Movie description</label>
                <input type="text" name="description" id="description" class="form-control"
                    placeholder="Enter Movie description" autocomplete="off" required="required">
            </div>

            <!-- KeyWords -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="movie_keywords" class="form-label">Movie keywords</label>
                <input type="text" name="movie_keywords" id="movie_keywords" class="form-control"
                    placeholder="Enter Movie keywords" autocomplete="off" required="required">
            </div>

            <!-- categories -->

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="movie_category" id="" class="form-select">


                    <?php
                    $select_query = "SELECT * from categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row["category_title"];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }


                    ?>

                </select>
            </div>

            <!-- languages -->

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="movie_languages" id="" class="form-select">

                    <?php
                    $select_query = "SELECT * from languages";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $language_title = $row["language_title"];
                        $language_id = $row['language_id'];
                        echo "<option value='$language_id'>$language_title</option>";
                    }


                    ?>
                </select>
            </div>


            <!-- Image 1 -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="movie_image1" class="form-label">Movie Img 1</label>
                <input type="file" name="movie_image1" id="movie_image1" class="form-control" required="required">
            </div>

            <!-- Image 2 -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="movie_image2" class="form-label">Movie Img 2</label>
                <input type="file" name="movie_image2" id="movie_image2" class="form-control" required="required">
            </div>

            <!-- Image 3 -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="movie_image3" class="form-label">Movie Img 3</label>
                <input type="file" name="movie_image3" id="movie_image3" class="form-control" required="required">
            </div>

            <!-- price -->

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="movie_price" class="form-label">Movie price</label>
                <input type="text" name="movie_price" id="movie_price" class="form-control"
                    placeholder="Enter Movie price" autocomplete="off" required="required">
            </div>

            <div class="form-outline w-50 m-auto mb-4 mt-4">
                <Select value="Insert Status" name=" movie_status" class="form-control" required="required">
                    <option>Available</option>
                    <option>Pending</option>
                </Select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_movie" class="btn btn-info mb-3 px-3" value="Insert Movie">




        </form>

    </div>






</body>

</html>