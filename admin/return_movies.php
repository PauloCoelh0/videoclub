<?php
if (isset($_POST['return_movie'])) {
    $movie_id = $_POST['movie_title'];



    $update_query = $con->prepare("UPDATE movies SET status='Available' WHERE movie_id=?");
    $update_query->bind_param('i', $movie_id);
    $update_query->execute();


    // $update_query = "UPDATE movies SET status='Available' WHERE movie_id=$movie_id";
    // $result = mysqli_query($con, $update_query);

    if ($update_query) {
        echo "<script>alert('Movies Returned Successfully')</script>";
    } else {
        echo "<script>alert('Erro')</script>";
    }
}


?>



<h2 class="text-center">Return movies</h2>
<div class="form-outline mt-4 w-50 m-auto">
    <form action="" method="post" class="mb-2">
        <select name="movie_title" id="" class="form-select">


            <?php
            $select_query = "SELECT * from movies WHERE status='Unavailable'";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $title = $row["movie_title"];
                $id = $row['movie_id'];
                echo "<option value='$id'>$title</option>";
            }

            ?>

        </select>
        <div class="input-group w-50 mb-2 m-auto">
            <input type="submit" class="btn btn-info px-3 mb-3 mt-5" name="return_movie" value="Return Movie">
        </div>
    </form>
</div>