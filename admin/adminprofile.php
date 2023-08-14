<?php
  session_start();
  if(!isset($_SESSION['adminemail']) && !isset($_SESSION['id'])){
    header("Location: adminloginform.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Page</title>
  <link rel="stylesheet" href="css/adminprofile.css" />
  <!-- Font Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<body>
  <div class="container">
    <nav>
      <div class="side_navbar">
        <span>Main Menu</span>
        <a href="adminprofile.php" class="active">Dashboard</a>
        <a href="newbanquet.php">New Banquet Details</a>
         <a href="selectedbanquet.php">Selected Banquet Details</a>
         <a href="contact.php">Contact Details</a>
        <a href="logoutadmin.php">Logout</a>
        
      </div>
    </nav>

    <div class="main-body">
      <h2>Dashboard</h2>
      <div class="promo_card">
        <h1>Welcome to Admin Page</h1>
        <span> For Banquet Recommendation System</span>
        <p>Email: <?php echo $_SESSION['adminemail'] ?></p>
      </div>
</body>
</html>
