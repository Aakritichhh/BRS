<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Banquet Page</title>
  <link rel="stylesheet" href="css/userpage.css" />
  <!-- Font Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<body>
  <div class="container">
    <nav>
      <div class="side_navbar">
        <span>Main Menu</span>
        <a href="userprofile.php" class="active">Dashboard</a>
        <a href="rec.php">Recommend Me</a>
        <a href="">Selected Banquet Details</a>
        <a href="logout.php">Logout</a>
        
      </div>
    </nav>

    <div class="main-body">
      <h2>Dashboard</h2>
      <div class="promo_card">
        <h1>Welcome <span></span></h1>        
        <span> To the Banquet Recommendation System</span>
       
      </div>
</body>
</html>

