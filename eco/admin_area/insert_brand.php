
<?php
include("../includes/db_connect.php");
if(isset($_POST['insert_brand']) ){
  $brand_title=$_POST["brand_title"];

  // chaecking if brand already exist
  $check="SELECT * FROM `brand` where brand_title='$brand_title'";
  $result=mysqli_query($con, $check);
  if(mysqli_num_rows($result)){
    echo '<script> alert("brand already exist")</script>';
    }
    else{
      $query="INSERT INTO `brand` ( `brand_title`) VALUES ( '$brand_title')";
      $result2=mysqli_query($con, $query);
      echo '<script> alert("brand inserted successfully")</script>';

    }
}


?>

<form method="post">
<div class="input-group my-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-receipt"></i></div>
        </div>
        <input type="text" name="brand_title" class="form-control" id="inlineFormInputGroup" placeholder="Insert Brand">
      </div>
  <input type="submit" name="insert_brand" value="insert Brand" class="btn btn-success mt-2">
</form>