<?php
include('../includes/connect.php');
include('../common_functions.php');


if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

}


//getting total itens and total price

$get_ip_address = getIPAddress();
$cart_query_price = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$invoice_number = mt_rand();
$status = 'pending';
$count_products = mysqli_num_rows($result_cart_price);
while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $movie_id = $row_price['movie_id'];
    $select_movie = "SELECT * from movies WHERE movie_id=$movie_id";
    $run_price = mysqli_query($con, $select_movie);
    while ($row_movie_price = mysqli_fetch_array($run_price)) {
        $movie_price = $row_movie_price['movie_price'];


    }

    $insert_orders = "INSERT INTO user_orders (user_id,amount_due,movies,invoice_number,total_products,order_date,order_status) values 
    ($user_id,$movie_price,$movie_id,$invoice_number,$count_products,NOW(),'$status')";
    $result_query = mysqli_query($con, $insert_orders);
    if ($result_query) {
        echo "<script>alert('Orders are submitted successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }
}

$empty_cart = "DELETE FROM cart_details where ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);

?>