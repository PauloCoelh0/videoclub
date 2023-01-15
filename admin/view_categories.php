<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark">
        <tr class="text-light">
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat = "SELECT * FROM categories";
        $result = mysqli_query($con, $select_cat);
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];


            ?>

            <tr class="text-center">
                <td><?php echo $category_id ?></td>
                <td>
                    <?php echo $category_title ?>
                </td>
                <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i
                            class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light'><i
                            class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>