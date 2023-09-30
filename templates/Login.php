<?php
session_start();
require('../database/connection.php');
$emailError = $passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            $emailError = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
        }
        if (empty($password)) {
            $passwordError = "Password is required";
        }

        if (empty($emailError) && empty($passwordError)) {
            $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if ($row) {
                if ($row['status'] === 'Blocked') {
                    echo "Your account has been blocked. Please contact the administrator.";
                } else {
                    $_SESSION['userid'] = $row['id'];
                    header('location: userprofile.php');
                }
            } else {
                echo "Login failed. Please check your email and password.";
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
        <p class="form-title">Sign in to your account</p>
        <div class="input-container">
            <input placeholder="Enter email" type="email" name="email">
            <span style="color:red;"><?php echo $emailError ?></span>
        </div>
        <div class="input-container">
            <input placeholder="Enter password" type="password" name="password">
            <span style="color:red;"><?php echo $passwordError ?></span>
        </div>
        <input class="submit" type="submit" name="login" value="Login">
        <p class="signup-link">
            No account?
            <a href="register.php">Sign up</a>
        </p>
    </form>
</body>
</html>
