<?php
session_start();
include "includes/db_connect.php";
include "function/common_function.php";
?>

<!doctype html>
<html lang="en">

<head>
    <title>Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font awsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once "header.php"; ?>
    <div class="row mt-5 mx-1">
        <div class="col-md-10 col-sm-2 col-12">
            <div class="row">
                <?php
                if (!isset($_GET["search_product"])) {
                    getproduct();
                }
                search();
                gat_cat_wise_data();
                gat_brand_wise_data();
                cart();
                ?>
            </div>
        </div>

        <!-- Fetching categories and brand -->
        <div class="col-md-2 col-sm-12 col-12">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h3>Brand</h3>
                </li>
                <?php getbrand(); ?>
                <li class="list-group-item mt-5">
                    <h3>Categories</h3>
                </li>
                <?php getcategory(); ?>
            </ul>
        </div>
    </div>



    <?php include "footer.php" ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>