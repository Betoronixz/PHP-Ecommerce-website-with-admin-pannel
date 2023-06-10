<?php
session_start();    
include "./includes/db_connect.php";
if(isset($_GET["product_id"])){
    $product_id=$_GET["product_id"];
    $user_id = $_SESSION["user_id"];
    $query="DELETE FROM `cart` WHERE `product_id`= '$product_id' and  user_id='$user_id' ";
    $result=mysqli_query($con,$query);
    header("location: cart.php");
    
}


?>
