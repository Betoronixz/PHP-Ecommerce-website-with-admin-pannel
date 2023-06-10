<?php
include("../includes/db_connect.php");
if(isset($_POST['insert_categories']) ){
  $cat_title=$_POST["cat_title"];

  // chaecking if category already exist
  $check="SELECT * FROM `categories` where cat_title='$cat_title'";
  $result=mysqli_query($con, $check);
  if(mysqli_num_rows($result)){
    echo '<script> alert("Category already exist")</script>';
    }
    else{
      $query="INSERT INTO `categories` ( `cat_title`) VALUES ( '$cat_title')";
      $result2=mysqli_query($con, $query);
      echo '<script> alert("Category inserted successfully")</script>';

    }
}


?>


<form method="post">
<div class="input-group my-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fa-solid fa-receipt"></i></div>
        </div>
        <input type="text" name="cat_title" class="form-control" id="inlineFormInputGroup" placeholder="Insert Categories">
      </div>
  <input type="submit" name="insert_categories" value="Insert Categories" class="btn btn-success mt-2  ">
</form>