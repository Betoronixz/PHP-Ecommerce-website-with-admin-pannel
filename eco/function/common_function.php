<?php

include "./includes/db_connect.php";

// Getting the products
function getproduct()
{
    global $con;
    if (!isset($_GET["cat_id"])) {
        if (!isset($_GET["brand_id"])) {
            $select = "SELECT * FROM `products` Order BY rand()";
            $result = mysqli_query($con, $select);
            while ($row = mysqli_fetch_assoc($result)) {
                $product_image1 = $row["product_image1"];
                $product_title = $row["product_title"];
                $product_des = $row["product_des"];
                $product_price = $row["product_price"];
                $product_id = $row["product_id"];

                echo "<div class='col-md-3 mb-3'>
            <div class='card '>
                <img class='card-img-top' src='./admin_area/product_image/$product_image1' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title </h5> <h3>$$product_price</h3>
                    <p class='card-text'>$product_des</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-danger text-center'>Add To Cart</a>
                    <a href='product_view.php?product_id=$product_id' class='btn btn-info text-center'>View More</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}
// Getting categories wise data
function gat_cat_wise_data()
{
    global $con;
    if (isset($_GET["cat_id"])) {
        $cat_id = $_GET["cat_id"];
        $select = "SELECT * FROM `products` where cat_id=$cat_id";

        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) == 0) {
            echo "<h2 class='m-auto text-danger'>No Data Availble For This Category</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_image1 = $row["product_image1"];
                $product_title = $row["product_title"];
                $product_des = $row["product_des"];
                $product_price = $row["product_price"];
                $product_id = $row["product_id"];

                echo "<div class='col-md-3 mb-3'>
            <div class='card '>
                <img class='card-img-top' src='./admin_area/product_image/$product_image1' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title </h5> <h3>$$product_price</h3>
                    <p class='card-text'>$product_des</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-danger text-center'>Add To Cart</a>
                    <a href='product_view.php?product_id=$product_id' class='btn btn-info text-center'>View More</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}

// Getting brand wise data
function gat_brand_wise_data()
{
    global $con;
    if (isset($_GET["brand_id"])) {
        $brand_id = $_GET["brand_id"];
        $select = "SELECT * FROM `products` where brand_id=$brand_id";

        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) == 0) {
            echo "<h2 class='m-auto text-danger'>No Data Availble For This Brand</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_image1 = $row["product_image1"];
                $product_title = $row["product_title"];
                $product_des = $row["product_des"];
                $product_price = $row["product_price"];
                $product_id = $row["product_id"];

                echo "<div class='col-md-3 mb-3'>
            <div class='card '>
                <img class='card-img-top' src='./admin_area/product_image/$product_image1' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title </h5> <h3>$$product_price</h3>
                    <p class='card-text'>$product_des</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-danger text-center'>Add To Cart</a>
                    <a href='product_view.php?product_id= $product_id' class='btn btn-info text-center'>View More</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}

// getting the brand
function getbrand()
{
    global $con;
    $query = "SELECT * FROM `brand` Order BY rand()  LIMIT 5  ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $brand_id = $row["brand_id"];
        $brand_title = ucfirst($row["brand_title"]);
        echo " <li class=list-group-item text-center' ><a href='index.php?brand_id=$brand_id'>$brand_title</a></li>";
    }
}

// fetcting the categories
function getcategory()
{
    global $con;
    $query = "SELECT * FROM `categories` Order BY rand() LIMIT 5  ";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_id = $row["cat_id"];
        $cat_title = ucwords($row["cat_title"]);
        echo " <li class=list-group-item text-center' ><a href='index.php?cat_id=$cat_id'>$cat_title</a></li>";
    }
}

// search functionalty
function search()
{
    global $con;
    if (isset($_GET["search_product"])) {
        $search_product = $_GET["search_product"];
        $select = "SELECT * FROM `products` where product_keywords like '%$search_product%'";

        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) == 0) {
            echo "<h2 class='m-auto text-danger'>No Data Availble For  $search_product</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_image1 = $row["product_image1"];
                $product_title = $row["product_title"];
                $product_des = $row["product_des"];
                $product_price = $row["product_price"];
                $product_id = $row["product_id"];
                $product_id = $row["product_id"];

                echo "<div class='col-md-3 mb-3'>
            <div class='card '>
                <img class='card-img-top' src='./admin_area/product_image/$product_image1' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title </h5> <h3>$$product_price</h3>
                    <p class='card-text'>$product_des</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn  btn-danger text-center'>Add To Cart</a>
                    <a href='product_view.php?product_id= $product_id' class='btn  btn-info text-center'>View More</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}

// Fetching product id wise data

function product_id_wise()
{
    global $con;
    if (isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        $select = "SELECT * FROM `products` where product_id=$product_id";

        $result = mysqli_query($con, $select);
        if (mysqli_num_rows($result) == 0) {
            echo "<h2 class='m-auto text-danger'>No Data Availble For This Brand</h2>";
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_image1 = $row["product_image1"];
                $product_title = $row["product_title"];
                $product_des = $row["product_des"];
                $product_price = $row["product_price"];
                $product_id = $row["product_id"];

                echo "<div class='col-md-3 mb-3'>
            <div class='card '>
                <img class='card-img-top' src='./admin_area/product_image/$product_image1' alt='Card image cap'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title </h5> <h3>$$product_price</h3>
                    <p class='card-text'>$product_des</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-danger form-control text-center btn-outline-warning'>Add To Cart</a>
                </div>
            </div>
        </div>";
            }
        }
    }
}



// ADD TO Cart deatails

function cart()
{
    if (isset($_GET["add_to_cart"])) {
        if(!isset($_SESSION["username"])){
            echo "<script>alert('Pleased login for adding to cart')</script>";
            
          }else{     
        global $con;
        $product_id = $_GET["add_to_cart"];
        $user_id = $_SESSION["user_id"];
        $query = "SELECT * FROM `cart` WHERE `product_id`='$product_id' AND `user_id`='$user_id'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Product is alerady add into cart')</script>";
        } else {
            $insert = "INSERT INTO `cart` (`product_id`, `user_id`, `quantity`, `date`) VALUES ( '$product_id', '$user_id', '1', current_timestamp())";
            $result = mysqli_query($con, $insert);
            echo "<script>alert('Product has been inserted')</script>";
        }
    }
    }
}

// count the  product availble in cart

function cart_count()
{
    if (isset($_GET["add_to_cart"])) {
        global $con;
        $user_id = $_SESSION["user_id"];
        $query = "SELECT * FROM `cart` WHERE  `user_id`='$user_id'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
    } else {
        global $con;
        $user_id = $_SESSION["user_id"];
        $query = "SELECT * FROM `cart` WHERE  `user_id`='$user_id'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
    }
    echo $count;
}

// total price function

function total_price()
{
    global $con;
    $user_id = $_SESSION["user_id"];
    $total_price = 0;
    $cart_query = "SELECT * FROM `cart` WHERE user_id='$user_id'";
    $result = mysqli_query($con, $cart_query);

    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row["product_id"];
        $price_query = "SELECT * FROM `products` WHERE product_id='$product_id'";
        $result1 = mysqli_query($con, $price_query);
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $total_price += $row1["product_price"];
        }
    }
    echo $total_price;
}
// IP ADDRESS

    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



// DISPLAYING CART PRODUCTS
function cart_products()
{
    global $con;
    $user_id = $_SESSION["user_id"];
    $total_price = 0;
    
    $cart_query = "SELECT * FROM `cart` where user_id='$user_id' ";
    $result = mysqli_query($con, $cart_query);
    $result_count = mysqli_num_rows($result);
    if ($result_count == 0) {
        echo "<h1 class='text-center'>Cart is empty</h1>";
    } else {
        while ($cart_row = mysqli_fetch_assoc($result)) {
            $product_id = $cart_row["product_id"];
            $product_query = "SELECT * FROM `products` where product_id= '$product_id' ";
            $result1 = mysqli_query($con, $product_query);
            
            while ($product_row = mysqli_fetch_assoc($result1)) {
                echo '<tr>
                    <td class="p-5"><b>' .
                        ucwords($product_row["product_title"]) .
                    '</b></td>
                    <td><img width="100px" height="100px" src="./admin_area/product_image/' .
                        $product_row["product_image1"] .
                    '"></td>
                    <td class="w-25"><input type="number" name="quantity" class="w-25" value="' . 
                        $cart_row["quantity"] .
                    '"></td>
                    <td>$' .
                        $product_row["product_price"] .
                    '</td>
                    <td><a href="delete.php?product_id=' .
                        $cart_row["product_id"] .
                        '&user_id=' .
                        $user_id .
                    '" class="btn btn-danger">Delete</a></td>  
                    <td>
                     
                    <input type="hidden" name="product_id" value="' .
                    $cart_row["product_id"] .
                    '">                      
                    <input type="submit" name="update" class="btn btn-primary" value="Update">
                    </td>
                </tr>';
                
                
            }
        }
    }
}



?>
