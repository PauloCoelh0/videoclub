<?php
include('../includes/connect.php');
@session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM user_orders WHERE order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
    $movie_id = $row_fetch['movies'];
}


if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount_due = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "INSERT INTO user_payment (order_id, invoice_number, amount, payment_mode) 
    VALUES ($order_id,$invoice_number,$amount_due,'$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<script>alert('Successfully completed the payment')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update_orders = "UPDATE user_orders SET order_status='Complete' WHERE order_id='$order_id'";
    $result_orders = mysqli_query($con, $update_orders);
    $update_movies_status = "UPDATE movies SET status='Unavailable' WHERE movie_id=$movie_id";
    $result_status = mysqli_query($con, $update_movies_status);




}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile </title>

        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">

        <!-- font-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="../style.css">
    </head>

<body class="customContainer">
    <div class="insideContainer">
        <h1 class="text-center my-4">Confirm Payment</h1>
        <div class="container my-5">
            <form action="" method="post">
                <div class="form-outline my-4 text-center  m-auto">
                    <input placeholder="Invoice Number" type="text" class="form-control  m-auto" name="invoice_number"
                        value="<?php echo $invoice_number ?>">
                </div>
                <div class="form-outline my-4 text-center  m-auto">
                    <input placeholder="Amount" type="text" class="form-control  m-auto" name="amount"
                        value="<?php echo $amount_due ?>">
                </div>
                <div class="form-outline my-4 text-center  m-auto">
                    <Select name="payment_mode" class="form-select  m-auto">
                        <option>Visa</option>
                        <option>MbWay</option>
                        <option>Paypal</option>
                        <option>BitCoin</option>
                    </Select>
                </div>
                <div class="form-outline my-4 text-center  m-auto">
                    <input type="submit" class="bg-dark py-2 px-3 border-0 text-light customButton1" value="PAY"
                        name="confirm_payment">
                </div>
            </form>
        </div>
    </div>



</body>

</html>