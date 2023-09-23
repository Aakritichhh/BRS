<?php
session_start();
require_once "../database/connection.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['register'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
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
   
   // Validate confirm password
             if ($password !== $cpassword) {
              $errors["cpassword"] = "Passwords do not match";
                 }

   
   if (empty($errors)) {
        
            $query= "INSERT INTO banquet_tb (email, password) VALUES ('$email', '$password')";
            $execute=mysqli_query($conn, $query);
            if($execute){
                header("location:banquetloginform.php");
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
                        <header>Banquet Registration Form</header>
                        
                        <div class="input-field">
                            <input type="text" class="input" id="email" required autocomplete="off" name="email">
                            <label for="email">Email</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["email"]) ? $errors["email"] : ""; ?></span>

                        </div>
                        
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password">
                            <label for="password">Password</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["password"]) ? $errors["password"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="cpassword" class="input" id="cpassword" name="cpassword">
                            <label for="cpassword">Confirm Password</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["cpassword"]) ? $errors["cpassword"] : ""; ?></span>
                        </div>


                        <div class="input-field">
                            <input type="submit" class="submit" value="Register" name="register">
                            
                        </div>
                        <div class="signup">
                            <span>Already have an account? <a href="banquetloginform.php">Sign in</a></span>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
</html>