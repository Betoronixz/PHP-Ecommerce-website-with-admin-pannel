<?php
$con = mysqli_connect("localhost", "root", "", "mystore");

// user sign up
if (isset($_POST["signup"])) {
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    // checking if user already exist
    $select = "SELECT * FROM `user_table` where email='$email'  ";
    $result = mysqli_query($con, $select);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('This email already exist')</script>";
    } else {
        if ($password == $cpassword) {
            $insert = "INSERT INTO `user_table` (`username`, `email`, `password`) VALUES ('$name', '$email', '$password_hash')";
            $result1 = mysqli_query($con, $insert);
        } else {
            echo "<script> alert('passwords should be same')</script>";
        }
    }
}

// user login
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // checking if user already exist
    $select = "SELECT * FROM `user_table` where email='$email'  ";
    $result = mysqli_query($con, $select);
    $row=mysqli_num_rows($result);
    $row2=mysqli_fetch_assoc($result); 
    $pv=$row2["password"];
    if ($row == 1) {
      if(password_verify($password, $pv)){
        session_start();
        echo "<script>alert('You are logged in')</script>";
        $_SESSION["username"] =$row2["username"];
        $_SESSION["user_id"]=$row2["user_id"];  
        header("Location:..\index.php");
      }
      else{
        echo "<script>alert('Invaild credentials1')</script>";
      }
    } else {
      echo "<script>alert('Invaild credentials2')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="user.css">
  <!-- Bootstrape css -->
  
</head>
<body>
<section class="forms-section">
  <h1 class="section-title">User Details</h1>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
      </button>
      <form class="form form-login" method="post">   
          <div class="input-block">
            <label for="login-email">E-mail</label>
            <input id="login-email" name="email" type="email" required>  
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" name="password" type="password" required>
          </div>
      <input type="submit" name="login" value="Login" class="btn-login">
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        Sign Up
        <span class="underline"></span>
      </button>
      <form class="form form-signup" method="post">
          <div class="input-block">
            <label for="signup-email">E-mail</label>
            <input id="signup-email" name="email" type="email" required>
            <span class="error"><?php $emailexist; ?></span>
          </div>
          <div class="input-block">
            <label for="signup-email">Name</label>
            <input id="signup-email" name="username" type="text" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Password</label>
            <input id="signup-password" name="password" type="password" required>
          </div>
          <div class="input-block">
            <label for="signup-password-confirm">Confirm password</label>
            <input id="signup-password-confirm" name="cpassword" type="password" required>
          </div>
          <input type="submit" value="Sign Up" name="signup" class="btn-signup">
      </form>
    </div>
  </div>
</section>
<script>
  const switchers = [...document.querySelectorAll('.switcher')]

switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})

</script>
</body>
</html>