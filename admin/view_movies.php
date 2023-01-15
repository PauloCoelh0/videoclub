<h3 class="text-center text-success">All Movies</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark">
        <tr class="text-light">
            <th>Movie ID</th>
            <th>Movie Name</th>
            <th>Movie Image</th>
            <th>Movie Price</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_movies = "SELECT * FROM movies";
        $result = mysqli_query($con, $get_movies);
        while ($row = mysqli_fetch_assoc($result)) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $movie_image1 = $row['movie_image1'];
            $movie_price = $row['movie_price'];
            $status = $row['status'];
            ?>

            <tr class='text-center align-middle'>
                <td><?php echo $movie_id ?></td>
                <td>
                    <?php echo $movie_title ?>
                </td>
                <td><img src='./movie_images/<?php echo $movie_image1 ?>' class='product_img' /></td>
                <td>
                    <?php echo $movie_price ?>€
                </td>
                <td>
                    <?php echo $status ?>
                </td>
                <td><a href='index.php?edit_movies=<?php echo $movie_id ?>' class='text-light'><i
                            class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_movies=<?php echo $movie_id ?>' class='text-light'><i
                            class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>