<?php
session_start();
require('../database/connection.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['submit'])){
        $oldPassword=$_POST['old'];
        $newPassword=$_POST['new'];
        $confirmPassword=$_POST['confirm'];
        $userid = $_SESSION['userid'];
        $sql = "SELECT password FROM user WHERE id='$userid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($newPassword!=$confirmPassword){
          $count = 0;
        }

        if($count == 1) {
          $updateQuery = "UPDATE user SET password='$newPassword' WHERE id='$userid'";
          if(mysqli_query($conn, $updateQuery)){
            header('location: userprofile.php');
          }
        } else {
            echo "login failed";
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
       <p class="form-title">Change Password</p>
        <div class="input-container">
          <input placeholder="Old password" type="old" name="old">
          
      </div>
      <div class="input-container">
          <input placeholder="New password" type="new" name="new">
        </div>
        <div class="input-container">
          <input placeholder="Confirm password" type="confirm" name="confirm">
        </div>
        
         <input class="submit" type="submit" name="submit" value="submit">
        
      
   </form>
</body>
</html>
