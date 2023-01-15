<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-dark">

        <?php
        $get_payments = "SELECT * FROM user_payment";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);


        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No payments yet</h2>";
        } else {
            echo "<tr class='text-center text-light'>
        <th>Payments ID</th>
        <th>Order ID</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Payment Date</th>
    
    </tr>
</thead>
<tbody>
    <tr class=' bg-secondary text-center text-light'>";
            while ($row_data = mysqli_fetch_array($result)) {
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['payment_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $date = $row_data['date'];
                $payment_mode = $row_data['payment_mode'];
                echo "<tr class='bg-secondary text-center text-light'>
                    <td>$payment_id </td>
                    <td>$order_id</td>
                    <td>$invoice_number</td>
                    <td>$amount €</td>
                    <td>$payment_mode</td>
                    <td>$date</td>
                </tr>";


            }
        }

        ?>

        </tbody>
</table>