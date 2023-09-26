<?php
session_start();
require_once "../database/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Services</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/userpage.css" />
<link rel="stylesheet" href="css/userdetail.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>

body {
  background: #e2eaef;
  font-family: "Open Sans", sans-serif;
}
h2 {
  color: #000;
  font-size: 26px;
  font-weight: 300;
  text-align: center;
  text-transform: uppercase;
  position: relative;
  margin: 30px 0 60px;
}
h2::after {
  content: "";
  width: 100px;
  position: absolute;
  margin: 0 auto;
  height: 4px;
  border-radius: 1px;
  background: #7ac400;
  left: 0;
  right: 0;
  bottom: -20px;
}
.carousel {
  margin: 50px auto;
  padding: 0 70px;
}
.carousel .item {
  color: #747d89;
  min-height: 325px;
  text-align: center;
  overflow: hidden;
}
.carousel .thumb-wrapper {
  padding: 25px 15px;
  background: #fff;
  border-radius: 6px;
  text-align: center;
  position: relative;
  box-shadow: 0 2px 3px rgba(0,0,0,0.2);
}
.carousel .item .img-box {
  height: 120px;
  margin-bottom: 20px;
  width: 100%;
  position: relative;
}
.carousel .item img { 
  max-width: 100%;
  max-height: 100%;
  display: inline-block;
  position: absolute;
  bottom: 0;
  margin: 0 auto;
  left: 0;
  right: 0;
}
.carousel .item h4 {
  font-size: 18px;
}
.carousel .item h4, .carousel .item p, .carousel .item ul {
  margin-bottom: 5px;
}
.carousel .thumb-content .btn {
  color: #7ac400;
  font-size: 11px;
  text-transform: uppercase;
  font-weight: bold;
  background: none;
  border: 1px solid #7ac400;
  padding: 6px 14px;
  margin-top: 5px;
  line-height: 16px;
  border-radius: 20px;
}
.carousel .thumb-content .btn:hover, .carousel .thumb-content .btn:focus {
  color: #fff;
  background: #7ac400;
  box-shadow: none;
}
.carousel .thumb-content .btn i {
  font-size: 14px;
  font-weight: bold;
  margin-left: 5px;
}
.carousel .item-price {
  font-size: 13px;
  padding: 2px 0;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}


</style>

</head>
<body>
  <div class="container">
    <nav>
      <div class="side_navbar">
        <span>Main Menu</span>
        <a href="userprofile.php" class="active">Dashboard</a>
        <a href="rec.php">Recommend Me</a>
        <a href="userbanqdetails.php">My Order</a>
        <a href="changepassword.php">Change Password</a>
        <a href="logout.php">Logout</a>
        
      </div>
    </nav>
    <div class="container-xl">
  <div class="row">
    <div class="col-md-12">
      <h2>Order<b>Details</b></h2>
      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
      <!-- Carousel indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>   
    </div>
  </div>
</div>


 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">User Id</th>
      <th scope="col">Order Id</th>
      <th scope="col">Banquet Id</th>
      <th scope="col">Service Type</th>
      <th scope="col">Booked Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
            $userid=$_SESSION['userid'];
            $query="SELECT * FROM orders WHERE userid='$userid'";
            $result=mysqli_query($conn, $query);
            $data=mysqli_num_rows($result);
            if($data>0){
                while($row=mysqli_fetch_array($result)){

            ?>
    <tr>
      <th scope="row"><?php echo $row['userid']?></th>
      <td><?php echo $row['orderid']?></td>
      <td><?php echo $row['banquetid']?></td>
      <td><?php echo $row['servicetype']?></td>
      <td><?php echo $row['date']?></td> 
    </tr>
    <?php
}
}
  ?>
  </tbody>
</div>
</table>
</body>
</html>