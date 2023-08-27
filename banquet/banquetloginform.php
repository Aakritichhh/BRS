<?php
session_start();
require('../database/connection.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['Signin'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
         $errors = array();
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

 if (empty($errors)) {
        $sql = "select * from banquet_tb where email = '$email' and password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1) {
        $_SESSION['banquetid'] = $row['id'];
        $_SESSION['banquetname'] = $row['name'];
        $_SESSION['banquetemail'] = $row['email'];
         $_SESSION['banquetcontact'] = $row['contact'];
        $_SESSION['baquetprofileimage'] = $row['profile_img'];
        $_SESSION['banquetaddress'] = $row['address'];

    
          header('location: banquetprofile.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Banquet Recommendation System</title>
</head>
<body>
    <form class="form" action="#" method="POST">
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image-------->
                    <img src="images/white.png" alt="">

                </div>
                <div class="col-md-6 right">
                     <div class="input-box">
                        <header>Banquet Login Form</header>
                        <div class="input-field">
                            <input type="text" class="input" id="email"  name="email">
                            <label for="email">Email</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["email"]) ? $errors["email"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password">
                            <label for="password">Password</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["password"]) ? $errors["password"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Sign in" name="Signin">
                            
                        </div>
                        <div class="signup">
                            <span>Dont have an account? <a href="banquetregform.php">Sign Up</a></span>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>