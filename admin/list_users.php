<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark">

        <?php
        $get_users = "SELECT * FROM user_table";
        $result = mysqli_query($con, $get_users);
        $row_count = mysqli_num_rows($result);


        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
        } else {
            echo "<tr class='text-center text-light'>
        <th>User ID</th>
        <th>Username</th>
        <th>User Email</th>
        <th>User Image</th>
        <th>User Address</th>
        <th>User Mobile</th>
    
    </tr>
</thead>
<tbody>
    <tr class=' bg-secondary text-center text-light'>";
            while ($row_data = mysqli_fetch_array($result)) {
                $user_id = $row_data['user_id'];
                $username = $row_data['username'];
                $user_email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
                echo "<tr class='bg-secondary text-center text-light align-middle'>
                    <td>$user_id </td>
                    <td>$username</td>
                    <td>$user_email</td>
                    <td> <img src='../users_area/user_images/$user_image' class='product_img'alt='$username'</td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
                </tr>";


            }
        }

        ?>

        </tbody>
</table>