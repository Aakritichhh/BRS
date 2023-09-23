<?php
session_start();
require('../database/connection.php');
$emailError = $passwordError = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        if (empty($email)) {
      $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
   }
   if (empty($password)) {
      $passwordError = "Password is required";
   }
     if (empty($emailError) && empty($passwordError)) {

        $sql = "select * from admin where email = '$email' and password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1) {
          $_SESSION['adminid'] = $row['id'];
          $_SESSION['adminemail'] = $row['email'];
          header('location: adminprofile.php');
        } else {
            echo "login failed";
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
       <p class="form-title">Admin Login Form</p>
        <div class="input-container">
          <input placeholder="Enter email" type="email" name="email">
          <span style="color:red;"><?php echo $emailError ?></span>
          
      </div>
      <div class="input-container">
          <input placeholder="Enter password" type="password" name="password">
          <span style="color:red;"><?php echo $passwordError ?></span>

        </div>
         <input class="submit" type="submit" name="login" value="login">
      
   </form>
</body>
</html>
