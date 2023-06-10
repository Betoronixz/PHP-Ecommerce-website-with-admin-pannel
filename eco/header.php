
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">ShopeNow</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="
        <?php
        
        if(!isset($_SESSION["username"])){
         echo "user_area\user_login.php";
         
       }else{
         
        echo "cart.php";
       }
        ?>
        
        "><i class="fa-solid fa-cart-plus"></i><sup>
          <?php
           if(!isset($_SESSION["username"])){
            echo "0";
            
          }else{
            
            cart_count();
          }
             ?>
        </sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" >Total Price $
          <?php 
          if(!isset($_SESSION["username"])){
            echo "0";
            
          }else{
            
            total_price();
          }
          ?>
          -</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0" method="get">
      <?php
if(!isset($_SESSION["username"])){
  echo '<a href="user_area/user_login.php" class="btn btn-outline-light m-1 btn-success">Login</a>';
  ;
}
else{
  $name=ucwords($_SESSION["username"]);
  echo "<h6 class='text-light mx-2  	'>Welcome $name</h6>";
  echo'<a href="user_area/user_logout.php" class="btn btn-outline-light m-1 btn-danger">Logout</a>';

}

      ?>


      


      <input class="form-control mr-sm-2" name="search_product" type="search" placeholder="Search" aria-label="Search">
      <input type="submit" value="Search" class="btn btn-outline-light" >
    </form>
  </div>
</nav>