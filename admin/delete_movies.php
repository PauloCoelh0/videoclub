<?php


if (isset($_GET['delete_movies'])) {
    $delete_id = $_GET['delete_movies'];

    $delete_movie = $con->prepare("DELETE FROM movies WHERE movie_id=?");
    $delete_movie->bind_param('i', $delete_id);
    $delete_movie->execute();

    // $result_movie = $delete_movie->get_result();

    // $delete_movie = "DELETE FROM movies WHERE movie_id=$delete_id";
    // $result_movie = mysqli_query($con, $delete_movie);

    if ($delete_movie) {
        echo "<script>alert('movie deleted successfully')</script>";
        echo "<script>window.open('index.php?view_movies','_self')</script>";
    }
}

?>