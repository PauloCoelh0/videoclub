<h3 class="text-center text-success">All Languages</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark">
        <tr class="text-light">
            <th>Language ID</th>
            <th>Language Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_language = "SELECT * FROM languages";
        $result = mysqli_query($con, $select_language);
        while ($row = mysqli_fetch_assoc($result)) {
            $language_id = $row['language_id'];
            $language_title = $row['language_title'];


            ?>

            <tr class="text-center">
                <td><?php echo $language_id ?></td>
                <td>
                    <?php echo $language_title ?>
                </td>
                <td><a href='index.php?edit_language=<?php echo $language_id ?>' class='text-light'><i
                            class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_language=<?php echo $language_id ?>' class='text-light'><i
                            class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>