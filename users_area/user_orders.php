<?php
$username = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE username='$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];

?>


<h3 class="text-center text-success">All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-white">
        <tr>

            <th>Invoice number</th>
            <th>Price</th>
            <th>Movie Title</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php

        $stmt = $con->prepare("SELECT * FROM user_orders WHERE user_id=?");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // $get_order_details = "SELECT * FROM user_orders WHERE user_id=$user_id";
        // $result_orders = mysqli_query($con, $get_order_details);
        

        while ($row_orders = $result->fetch_assoc()) {
            $order_id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $total_products = $row_orders['total_products'];
            $invoice_number = $row_orders['invoice_number'];
            $order_status = $row_orders['order_status'];
            $movie_id = $row_orders['movies'];

            $select = $con->prepare("SELECT * FROM movies WHERE movie_id=?");
            $select->bind_param('i', $movie_id);
            $select->execute();
            $result_sel = $select->get_result();
            while ($row_select = $result_sel->fetch_assoc()) {
                $movie_title = $row_select['movie_title'];
            }
            if ($order_status == 'pending') {
                $order_status = 'Incomplete';
            } else {
                $order_status = 'Complete';
            }
            $order_date = $row_orders['order_date'];

            echo "<tr>
            <td>$invoice_number</td>
            <td>$amount_due</td>
            <td>$movie_title</td>
            <td>$order_date</td>";
            ?>
            <?php
            if ($order_status == 'Complete') {
                echo "<td>Paid</td>";
            } else {
                echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td></tr>";
            }
        }
        ?>

    </tbody>
</table>