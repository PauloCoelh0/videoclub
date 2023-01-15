<h3 class="text-center text-success">Active Orders</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark">


        <tr class='text-center text-light'>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Movie</th>
            <th>Purchase Value</th>
            <th>Invoice Number</th>
            <th>Order Date</th>

        </tr>
        <tr class=' bg-secondary text-center text-light'>'



            <?php
            $p = "Available";
            $selectMovie = "SELECT * FROM movies WHERE status='Unavailable'";
            $result_movie = mysqli_query($con, $selectMovie);
            while ($row_data_movie = mysqli_fetch_array($result_movie)) {
                $movie_id = $row_data_movie['movie_id'];
                $movie_name = $row_data_movie['movie_title'];
                $movie_status = $row_data_movie['status'];
                $get_orders = "SELECT * FROM user_orders WHERE movies=$movie_id AND order_status='Complete'";
                $result = mysqli_query($con, $get_orders);
                $row_count = mysqli_num_rows($result);
                while ($row_data = mysqli_fetch_array($result)) {
                    $order_id = $row_data['order_id'];
                    $user_id = $row_data['user_id'];
                    $amount_due = $row_data['amount_due'];
                    $invoice_number = $row_data['invoice_number'];
                    $total_products = $row_data['total_products'];
                    $order_date = $row_data['order_date'];
                    $order_status = $row_data['order_status'];

                    echo


                        "<tr class='bg-secondary text-center text-light'>
                    <td>$order_id</td>
                    <td>$user_id </td>
                    <td>$movie_name</td>
                    <td>$amount_due €</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                 
                </tr>";




                }
            }







            ?>

            </tbody>
</table>
<h3 class="text-center text-success mt-4">Finished Orders</h3>

<table class="table table-bordered mt-2 text-center">
    <thead class="bg-dark">


        <tr class='text-center text-light'>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Movie</th>
            <th>Purchase Value</th>
            <th>Invoice Number</th>
            <th>Order Date</th>

        </tr>
        <tr class=' bg-secondary text-center text-light'>'



            <?php
            $p = "Available";
            $selectMovie = "SELECT * FROM movies WHERE status='Available'";
            $result_movie = mysqli_query($con, $selectMovie);
            while ($row_data_movie = mysqli_fetch_array($result_movie)) {
                $movie_id = $row_data_movie['movie_id'];
                $movie_name = $row_data_movie['movie_title'];
                $movie_status = $row_data_movie['status'];
                $get_orders = "SELECT * FROM user_orders WHERE movies=$movie_id AND order_status='Complete'";
                $result = mysqli_query($con, $get_orders);
                $row_count = mysqli_num_rows($result);
                while ($row_data = mysqli_fetch_array($result)) {
                    $order_id = $row_data['order_id'];
                    $user_id = $row_data['user_id'];
                    $amount_due = $row_data['amount_due'];
                    $invoice_number = $row_data['invoice_number'];
                    $total_products = $row_data['total_products'];
                    $order_date = $row_data['order_date'];
                    $order_status = $row_data['order_status'];

                    echo


                        "<tr class='bg-secondary text-center text-light'>
                    <td>$order_id</td>
                    <td>$user_id </td>
                    <td>$movie_name</td>
                    <td>$amount_due €</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                 
                </tr>";




                }
            }