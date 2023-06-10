<?php
include("../includes/db_connect.php");

if (isset($_POST["insert_product"])) {
    $product_title =$_POST["product_title"];
    $product_des =$_POST["product_des"];
    $product_keywords =$_POST["product_keywords"];
    $cat_id =$_POST["cat_id"];
    $brand_id =$_POST["brand_id"];
    $product_price =$_POST["product_price"];

    // accesssinhg image name
    $product_image1 =$_FILES["product_image1"]["name"];
    $product_image2 =$_FILES["product_image2"]["name"];
    $product_image3 =$_FILES["product_image3"]["name"];

    // accessing tamp name of image
    $temp_image1 =$_FILES["product_image1"]["tmp_name"];
    $temp_image2 =$_FILES["product_image2"]["tmp_name"];
    $temp_image3 =$_FILES["product_image3"]["tmp_name"];






    if($_POST["product_title"]=="" || $_POST["product_des"]=="" || $_POST["product_keywords"]=="" || $_POST["cat_id"]=="Select Category" || $_POST["brand_id"]=="Select Brand" || $_POST["product_price"]=="" || $product_image1==""){
        echo"<script>alert('All Feilds Are Required')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_image2,"./product_image/product_image2");
        move_uploaded_file($temp_image3,"./product_image/$product_image3");

        $inser_query="INSERT INTO `products` ( `product_title`, `product_des`, `product_keywords`, `cat_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`) VALUES ('$product_title ', '$product_des', '$product_keywords', '$cat_id', '$brand_id', '$product_image1', '$product_image2', '$product_image3', '$product_price', current_timestamp())";

        $result=mysqli_query($con, $inser_query);
        if($result){
            echo "<script>alert('Data Has been inserted')</script>";
        }
    }
} ?>


<!doctype html>
<html lang="en">

<head>
    <title>Insert Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-light">
    <h1 class="text-center mt-3">Insert Product</h1>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">

            <div class="form-group w-50 mx-auto mb-4">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" name="product_title" class="form-control " placeholder="Product Name" required>
            </div>

            <div class="form-group w-50 mx-auto mb-4">
                <label for="exampleInputEmail1">Product Description</label>
                <input type="text" name="product_des" class="form-control " placeholder="Product Description" required>
            </div>

            <div class="form-group w-50 mx-auto mb-4">
                <label for="exampleInputEmail1">Product Keywords</label>
                <input type="text" name="product_keywords" class="form-control " placeholder="Product Keywords"
                    required>
            </div>


            <div class="form-group w-50 mx-auto mb-4">
                <select class="form-control" name="cat_id" id="exampleFormControlSelect1">
                    <option value="">Select Category</option>
                    <?php
                    include "../includes/db_connect.php";
                    $query = "SELECT * FROM `categories` ";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cat_id = $row["cat_id"];
                        $cat_title = $row["cat_title"];
                        echo " <option value= '$cat_id'>$cat_title</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-group w-50 mx-auto mb-4">
                <select class="form-control" name="brand_id" id="exampleFormControlSelect1">
                    <option value="">Select Brand</option>
                    <?php
                    $query = "SELECT * FROM `brand` ";
                    $result2 = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result2)) {
                        $brand_id=$row["brand_id"];
                        $brand_title = $row["brand_title"];
                        echo " <option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" class="form-control">
            </div>

            <div class="form-outline mb-4 w-50 mx-auto">
                <label for="" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" class="form-control">
            </div>

            <div class="form-group w-50 mx-auto mb-4">
                <label for="exampleInputEmail1">Product Price</label>
                <input type="number" name="product_price" class="form-control " placeholder="Product Price" required>
            </div>

            <div class="form-group w-50 mx-auto mb-4">
                <input type="submit" name="insert_product" class="btn  btn-success " value="Insert Product">
            </div>

        </form>
    </div>

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
