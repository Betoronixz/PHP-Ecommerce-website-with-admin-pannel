<?php
if(isset($_GET["user_id"]) && isset( $_GET["product_id"]) && isset( $_GET["quantity"])){
    $qty=$_GET["quantity"];
    $product_id=$_GET["product_id"];
    $user_id=$_GET["user_id"];
    $query = "UPDATE `cart` SET `quantity` = '$qty' WHERE `user_id` = $user_id and `product_id`='$product_id' ";
            $result = mysqli_query($con, $query);
            header("location:cart.php");
            
}

?>