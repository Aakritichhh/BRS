<?php
session_start();
require_once "../database/connection.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['signup'])){
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $contact=$_POST['contact'];

        $errors = array();
   
   // Validate username
   if (empty($username)) {
      $errors["username"] = "Username is required";
   }
   
   // Validate contact
   if (empty($contact)) {
      $errors["contact"] = "Contact is required";
   } 
   elseif (!preg_match("/^\d{10}$/", $contact)) 
   {
      $errors["contact"] = "Invalid Contact. Please enter a 10-digit number.";
   }
   //validate email
   if (empty($email)) {
      $errors["email"] = "Email is required";
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "Invalid Email";
   }
   
   // Validate password
   if (empty($password)) {
      $errors["password"] = "Password is required";
   }
   
   // Validate confirm password
   if ($password !== $cpassword) {
      $errors["cpassword"] = "Passwords do not match";
   }

   
   if (empty($errors)) {
            $query= "INSERT INTO user (username, email, password,contact) VALUES ('$username','$email', '$password','$contact')";
            $execute=mysqli_query($conn, $query);
            if($execute){
                header("location:Login.php");
            }else{
                echo "Not executed";
            }
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Banquet Recommendation System</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <form class="form" action="#" method="POST">
       <p class="form-title">Sign up to your account</p>
       <div class="input-container">
          <input placeholder="Enter your name" type="text" name="username">
          <span class="error" style="color:red;"><?php echo isset($errors["username"]) ? $errors["username"] : ""; ?></span>
      </div>
      <div class="input-container">
          <input placeholder="Enter your contact" type="text" name="contact">
          <span class="error" style="color:red;"><?php echo isset($errors["contact"]) ? $errors["contact"] : ""; ?></span>
      </div>
      <div class="input-container">
          <input placeholder="Enter email" type="email" name="email">
          <span class="error" style="color:red;"><?php echo isset($errors["email"]) ? $errors["email"] : ""; ?></span>
      </div>
      <div class="input-container">
          <input placeholder="Enter password" type="password" name="password">
          <span class="error" style="color:red;"><?php echo isset($errors["password"]) ? $errors["password"] : ""; ?></span>
      </div>
      <div class="input-container">
          <input placeholder="Confirm password" type="password" name="cpassword">
          <span class="error" style="color:red;"><?php echo isset($errors["cpassword"]) ? $errors["cpassword"] : ""; ?></span>
      </div>
      <input class="submit" type="submit" name="signup" value="Sign up">
      <p class="signup-link">
         Already have an account?
         <a href="Login.php">Sign in</a>
      </p>
   </form>
</body>
</html>
