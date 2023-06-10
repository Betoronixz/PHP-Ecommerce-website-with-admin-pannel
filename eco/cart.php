<?php
session_start();
include "includes/db_connect.php";
include "function/common_function.php";

?>
<!doctype html>
<html lang="en">

<head>
    <title>Cart Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font awsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/ DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once "header.php"; ?>
    <form action="" method="post">
    <table class="table container mt-3 table-light table-striped table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <!-- php code to display dynamic data -->
            <?php
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
                    $product_price=$row1["product_price"];
                    $product_title=$row1["product_title"];
                    $product_image1=$row1["product_image1"];
                    $total_price += $row1["product_price"];
               
            ?>
            <tr>
    <td><?php echo $product_title; ?></td>
    <td><img width="50px" height="50px" src="./admin_area/product_image/<?php echo $product_image1; ?>"></td>
    <td><input name="quantity" type="number"></td>

    <td>$<?php echo $product_price; ?></td>
    <td><a href="delete.php?product_id=<?php echo $product_id;?>&user_id=<?php echo $user_id;?>" class="btn btn-danger ml-5 mt-1">Remove</a></td>
    <?php
    if(isset($_POST["update"])){
        $qty=$_POST["quantity"];
        $user_id=$_SESSION["user_id"];
        $product_id=$_POST["product_id"];
        $update = "UPDATE `cart` SET `quantity` = '$qty' WHERE `user_id` = '$user_id' AND `product_id`='$product_id'";
        $result4=mysqli_query($con, $update);
        echo "quantity= $qty ";
        echo "product_id=$product_id ";
        echo "user_id=$user_id";
        
    }
    ?>
    <td><input type="hidden" name="product_id" value="<?php echo $product_id; ?>"> <input type="submit" name="update" value="Update Cart" class="btn btn-primary"></td>
</tr>

            <?php  }
            }?>
        </tbody>
    </table>
    <h5 class="text-center">Total Price $<?php
    total_price();
    ?>
    </h5>
    <div class="container">
    <a href="user_area\payment.php" class="btn btn-info d-flex justify-content-center " >Checkout</a>
</div>


</form>

<?php include "footer.php" ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>