<?php
session_start();
if(!isset($_SESSION["admin_email"])){
    header("Location:.\admin_login.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin DashBoard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Font awsome cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">
    <style>
    .admin_image {
        vertical-align: middle;
        border-style: none;
        width: 100px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="../logo-removebg-preview.png" class="logo" alt=""></a>
    </nav>
    <h2 class="text-center">Manage Details</h2>

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 bg-secondary d-flex align-items-center">
                <div>
                    <img src="download.png" class='admin_image p-1' alt="">
                    <p>Admin Name</p>
                </div>
                <div class="button text-center mx-5">
                  <a href="insert_product.php" class="col-md-3 m-2 btn btn-info btn-outline-light">Insert Product</a>
                    <a href="" class="col-md-3 m-2 btn btn-info btn-outline-light">View Product</Inp></a>
                    <a href="index.php?insert_categories" class="col-md-3 m-2 btn btn-info btn-outline-light"> Insert Categories</a>
                    <a href="" class="col-md-3 m-2 btn btn-info btn-outline-light">View Categories</a>
                    <a href="index.php?insert_brand" class="col-md-3 m-2 btn btn-info btn-outline-light">Insert Brands</a>
                    <a href="" class="col-md-3 m-2 btn btn-info btn-outline-light">View Brands</a>
                    <a href="" class="col-md-3 m-2 btn btn-info btn-outline-light">All orders </a>
                  <a href="" class="col-md-3 m-2 btn btn-info btn-outline-light">All Payment</a>
                  <a href="" class="col-md-3 m-2 btn btn-info btn-outline-light">List  User</a><br>
                  <a href="admin_logout.php" class="col-md-3 m-2 btn btn-danger m-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
<div class="container mt-3">
    <?php
    include("../includes/db_connect.php");
    if(isset($_GET['insert_categories'])) {
      include("insert_categories.php");
      
  }
  if(isset($_GET['insert_brand'])) {
    include("insert_brand.php");
    
}

    ?>

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