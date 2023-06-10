
<?php
session_start();
if(isset($_SESSION["admin_email"])){
  header("Location:.\index.php");
}
$con = mysqli_connect("localhost", "root", "", "mystore");

if (isset($_POST["login"])) {
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);

    $select = "SELECT * FROM `admin_table` WHERE email='$email'";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $hashedPassword = $row["password"];
        if (password_verify($password, $hashedPassword)) {
            session_start();
            echo "<script>alert('You are logged in')</script>";
            $_SESSION["admin_email"] = $row["email"];
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password')</script>";
        }
    } else {
        echo "<script>alert('Email not found')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="login-box">
  <h2>Login</h2>
  <form method="post">
    <div class="user-box">
      <input type="text" name="email" required autocomplete="off">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required autocomplete="off">
      <label>Password</label>
    </div>
    <a href="#"  name="login">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <input type="submit" class="btn btn-primary" name="login" value="Login">
    </a>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>