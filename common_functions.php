<?php
include('includes/connect.php');

include('emailController.php');


//getting movies



function getMovies()
{
    global $con;

    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['language'])) {
            $select_query = "SELECT * FROM movies ORDER BY rand() LIMIT 0,6";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $movie_id = $row['movie_id'];
                $movie_title = $row['movie_title'];
                $movie_description = $row['movie_description'];
                $movie_keywords = $row['movie_keywords'];
                $movie_image1 = $row['movie_image1'];
                $movie_price = $row['movie_price'];
                $category_id = $row['category_id'];
                $language_id = $row['language_id'];
                $movie_status = $row['status'];

                if (isset($_SESSION['username'])) {
                    if ($movie_status == 'Available') {

                        echo "<div class='container'>
                    <div class='card';>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>     
                            <p class='card-text'>Price: $movie_price €</p>
                            <strong><p class='card-text text-success'>$movie_status </p></strong>
                            <a href='index.php?add_to_cart=$movie_id' class='btn btn-info'>Add to Cart</a>
                        </div>
                    </div>
                </div>";
                    }
                    if ($movie_status == 'Unavailable') {

                        echo "<div class='container'>
                    <div class='card';>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>     
                            <p class='card-text'>Price: $movie_price €</p>
                            <strong><p class='card-text text-danger'>$movie_status </p></strong>
                        </div>
                    </div>
                </div>";
                    }
                    if ($movie_status == 'Pending') {

                        echo "<div class='container'>
                    <div class='card';>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>     
                            <p class='card-text'>Price: $movie_price €</p>
                            <strong><p class='card-text text-warning'>$movie_status </p></strong>
                        </div>
                    </div>
                </div>";
                    }

                } else {
                    echo "<div class='container'>
                    <div class='card';>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>     
                            <p class='card-text'>Price: $movie_price €</p>
                        </div>
                    </div>
                </div>";
                }
            }
        }
    }
}



//getting all movies 

function getAllMovies()
{
    global $con;

    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['language'])) {
            $select_query = "SELECT * FROM movies ORDER BY rand()";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $movie_id = $row['movie_id'];
                $movie_title = $row['movie_title'];
                $movie_description = $row['movie_description'];
                $movie_keywords = $row['movie_keywords'];
                $movie_image1 = $row['movie_image1'];
                $movie_price = $row['movie_price'];
                $category_id = $row['category_id'];
                $language_id = $row['language_id'];
                $movie_status = $row['status'];
                if (isset($_SESSION['username'])) {
                    if ($movie_status == 'Available') {

                        echo "<div class='col-md-2 my-2 px-4'>
                    <div class='card';>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>     
                            <p class='card-text'>Price: $movie_price €</p>
                            <strong><p class='card-text text-success'>$movie_status </p></strong>
                            <a href='index.php?add_to_cart=$movie_id' class='btn btn-info'>Add to Cart</a>
                        </div>
                    </div>
                </div>";
                    }
                    if ($movie_status == 'Unavailable') {

                        echo "<div class='col-md-2 my-2 px-4'>
                    <div class='card';>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>     
                            <p class='card-text'>Price: $movie_price €</p>
                            <strong><p class='card-text text-danger'>$movie_status </p></strong>
                        </div>
                    </div>
                </div>";
                    }
                    if ($movie_status == 'Pending') {

                        echo "<div class='col-md-2 my-2 px-4'>
                    <div class='card';>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>     
                            <p class='card-text'>Price: $movie_price €</p>
                            <strong><p class='card-text text-warning'>$movie_status </p></strong>
                        </div>
                    </div>
                </div>";
                    }

                } else {
                    echo "<div class='col-md-2 my-2 px-4'>
                    <div class='card';>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>     
                            <p class='card-text'>Price: $movie_price €</p>
                        </div>
                    </div>
                </div>";
                }
            }
        }
    }
}


//getting movies by categories

function getMoviesByCategory()
{
    global $con;

    //condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "SELECT * FROM movies WHERE category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> No movies for that category available";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $movie_description = $row['movie_description'];
            // $movie_keywords = $row['movie_keywords'];
            $movie_image1 = $row['movie_image1'];
            $movie_price = $row['movie_price'];
            $category_id = $row['category_id'];
            $language_id = $row['language_id'];
            $movie_status = $row['status'];

            if (isset($_SESSION['username'])) {
                if ($movie_status == 'Available') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-success'>$movie_status </p></strong>
                        <a href='index.php?add_to_cart=$movie_id' class='btn btn-info'>Add to Cart</a>
                    </div>
                </div>
            </div>";
                }
                if ($movie_status == 'Unavailable') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-danger'>$movie_status </p></strong>
                    </div>
                </div>
            </div>";
                }
                if ($movie_status == 'Pending') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-warning'>$movie_status </p></strong>
                    </div>
                </div>
            </div>";
                }

            } else {
                echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                    </div>
                </div>
            </div>";
            }
        }
    }
}
//getting movies by language

function getMoviesByLanguage()
{
    global $con;

    //condition to check isset or not
    if (isset($_GET['language'])) {
        $language_id = $_GET['language'];
        $select_query = "SELECT * FROM movies WHERE language_id=$language_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> No movies for that language available";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $movie_description = $row['movie_description'];
            // $movie_keywords = $row['movie_keywords'];
            $movie_image1 = $row['movie_image1'];
            $movie_price = $row['movie_price'];
            $language_id = $row['language_id'];
            $language_id = $row['language_id'];
            $movie_status = $row['status'];

            if (isset($_SESSION['username'])) {
                if ($movie_status == 'Available') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-success'>$movie_status </p></strong>
                        <a href='index.php?add_to_cart=$movie_id' class='btn btn-info'>Add to Cart</a>
                    </div>
                </div>
            </div>";
                }
                if ($movie_status == 'Unavailable') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-danger'>$movie_status </p></strong>
                    </div>
                </div>
            </div>";
                }
                if ($movie_status == 'Pending') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-warning'>$movie_status </p></strong>
                    </div>
                </div>
            </div>";
                }

            } else {
                echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                    </div>
                </div>
            </div>";
            }
        }
    }
}


function getCategories()
{
    global $con;
    $select_categories = "SELECT * from categories";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $cat_title = $row_data['category_title'];
        $cat_id = $row_data['category_id'];
        echo " <li class='nav-item'>
                    <a href='display_all.php?category=$cat_id'class='nav-link text-light'>$cat_title</a>
                </li>";
    }

}




function getLanguages()
{
    global $con;
    $select_languages = "SELECT * from languages";
    $result_languages = mysqli_query($con, $select_languages);
    while ($row_data = mysqli_fetch_assoc($result_languages)) {
        $lang_title = $row_data['language_title'];
        $lang_id = $row_data['language_id'];
        echo " <li class='nav-item'>
                    <a href='display_all.php?language=$lang_id'class='nav-link text-light'>$lang_title</a>
                </li>";
    }
}

//search movies

function searchMovies()
{
    global $con;
    if (isset($_GET['search_data_movie'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM movies WHERE movie_keywords like '%$search_data_value%' ";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'> NO MOVIE FOUND, TRY ANOTHER FILTER";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $movie_description = $row['movie_description'];
            // $movie_keywords = $row['movie_keywords'];
            $movie_image1 = $row['movie_image1'];
            $movie_price = $row['movie_price'];
            $category_id = $row['category_id'];
            $language_id = $row['language_id'];
            $movie_status = $row['status'];
            if (isset($_SESSION['username'])) {
                if ($movie_status == 'Available') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-success'>$movie_status </p></strong>
                        <a href='index.php?add_to_cart=$movie_id' class='btn btn-info'>Add to Cart</a>
                    </div>
                </div>
            </div>";
                }
                if ($movie_status == 'Unavailable') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-danger'>$movie_status </p></strong>
                    </div>
                </div>
            </div>";
                }
                if ($movie_status == 'Pending') {

                    echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                        <strong><p class='card-text text-warning'>$movie_status </p></strong>
                    </div>
                </div>
            </div>";
                }

            } else {
                echo "<div class='col-md-2 my-2 px-4'>
                <div class='card';>
                    <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$movie_title</h5>     
                        <p class='card-text'>Price: $movie_price €</p>
                    </div>
                </div>
            </div>";
            }
        }
    }
}



// view details

function viewDetails()
{
    global $con;

    //condition to check isset or not
    if (isset($_GET['movie_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['language'])) {
                $movie_id = $_GET['movie_id'];
                $select_query = "SELECT * FROM movies WHERE movie_id=$movie_id";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $movie_id = $row['movie_id'];
                    $movie_title = $row['movie_title'];
                    $movie_description = $row['movie_description'];
                    $movie_keywords = $row['movie_keywords'];
                    $movie_image1 = $row['movie_image1'];
                    $movie_image2 = $row['movie_image2'];
                    $movie_image3 = $row['movie_image3'];
                    $movie_price = $row['movie_price'];
                    $category_id = $row['category_id'];
                    $language_id = $row['language_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/movie_images/$movie_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$movie_title</h5>
                            <a href='index.php?add_to_cart=$movie_id' class='btn btn-info'>Add to Cart</a>
                            <a href='index.php' class='btn btn-secondary'>Go Home</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <img src='./admin/movie_images/$movie_image2' class='card-img-top' alt='...'>
                            <p class='card-text'>Sinopse: $movie_description </p>
                            
                            
                        </div>
                        <div class='col-md-6'>
                            <img src='./admin/movie_images/$movie_image3'class='card-img-top' alt='...'>
                            <h4 class='card-text'> Price: $movie_price € </h4>
                        </div>
                        
                    </div>
                </div>";


                }
            }
        }
    }
}

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



// cart function 

function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_movie_id = $_GET['add_to_cart'];
        $select_query = "SELECT * from cart_details WHERE ip_address='$get_ip_add' and movie_id=$get_movie_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('You already added this movie')</script>";
        } else {
            $insert_query = "INSERT INTO cart_details(movie_id,ip_address,quantity) values ($get_movie_id,'$get_ip_add',1)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Movie added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }
    }
}


//func to get cart item numb

function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * from cart_details WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * from cart_details WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}


//total price 


function total_cart_price()
{
    global $con;
    $total_price = 0;
    $get_ip_add = getIPAddress();
    $cart_query = "SELECT * from cart_details where ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $movie_id = $row['movie_id'];
        $select_movies = "SELECT * FROM movies WHERE movie_id='$movie_id'";
        $result_movies = mysqli_query($con, $select_movies);
        while ($row_movie_price = mysqli_fetch_array($result_movies)) {
            $movie_price = array($row_movie_price['movie_price']);
            $movie_value = array_sum($movie_price);
            $total_price += $movie_value;
        }
    }
    echo $total_price;
}


// get user order details

function user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "SELECT * FROM user_table WHERE username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account']) and !isset($_GET['my_orders']) and !isset($_GET['delete_account'])) {
            $get_orders = "SELECT * FROM user_orders WHERE user_id=$user_id and order_status='pending'";
            $result_orders_query = mysqli_query($con, $get_orders);
            $row_count = mysqli_num_rows($result_orders_query);
            if ($row_count > 0) {
                echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-light'>My orders</a></p>";
            } else {
                echo "<h3 class='text-center text-light mt-5 mb-2'>You have 0 pending orders</h3>
                        <p class='text-center'><a href='../index.php' class='text-light'>Explore Movies</a></p>";
            }
        }
    }
}


function verifyUser($token)
{

    global $con;
    $sql = "SELECT * FROM user_table WHERE token='$token' LIMIT 1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE user_table SET verified=1 WHERE token='$token'";

        if (mysqli_query($con, $update_query)) {

            $_SESSION['id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['user_email'];
            $_SESSION['verified'] = 1;

        } else {
            echo 'User not found';
        }
    }
}




//if user clicks on forgot passoword

if (isset($_POST['forgot-password'])) {
    global $con;
    $email = $_POST['email'];

    $sql = "SELECT  * FROM user_table WHERE user_email='$email' LIMIT 1";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    $token = $user['token'];
    sendPasswordResetLink($email, $token);
    header('location: password_message.php');
    exit(0);
}

// if user click on reset password btn

if (isset($_POST['reset-password-btn'])) {
    global $con;
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    if (empty($password) || empty($passwordConf)) {
        $errors['password'] = "Password required";
    }


    if ($password !== $passwordConf) {
        $errors['password'] = "The two password do not match";
    }


    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];


    $sql = "UPDATE user_table SET user_password='$password' WHERE user_email='$email'";
    echo $sql;
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Password updated successfully')</script>";
        echo "<script>window.open('user_login.php','_self')</script>";

        exit(0);
    }

}






function resetPassword($token)
{
    global $con;
    $sql = "SELECT * FROM user_table WHERE token='$token' LIMIT 1";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['user_email'];
    header('location: reset_password.php');
    exit(0);
}