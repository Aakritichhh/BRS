<?php
session_start();
require_once "../database/connection.php";

if($_SERVER["REQUEST_METHOD"]=="GET") {
  if(isset($_GET['delete'])){
    $serviceId = $_GET['id'];

    $query = "DELETE FROM service WHERE service_id = $serviceId";

    if(mysqli_query($conn, $query)) {
      header("Refresh:0; url=ourservice.php");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Services</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
 <link rel="stylesheet" href="css/banquetprofile.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

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
                <a href="adminprofile.php" class="active"><b>Go Back</b></a>
      </div>
    </nav>
   
    
<div class="container-xl">
  <div class="row">
    <div class="col-md-12">
      <h2>Our<b>Services</b></h2>
      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
      <!-- Carousel indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>   
      <!-- Wrapper for carousel items -->
      <div class="carousel-inner">
        <div class="item carousel-item active">
          <div class="row">
            <?php
            $query="SELECT * FROM service";
            $result=mysqli_query($conn, $query);
            $data=mysqli_num_rows($result);
            if($data>0){
                while($row=mysqli_fetch_array($result)){

            ?>
            <div class="col-sm-3">
              <div class="thumb-wrapper">
                <div class="img-box">
                  <img src="banquetimage/<?php echo $row['serviceimage']?>" class="img-fluid" alt="">                 
                </div>
                <div class="thumb-content">
                  <h4><?php echo $row['title']?></h4>                 
      
                  <p class="item-price"><?php echo $row['perpeopleprice']?></p>
                  <p><?php echo $row['limitedpeople']?></p>
                  <p><?php echo $row['description']?></p>
                  <a href="banquet/ourservice.php?delete=1&id=<?php echo $row['service_id'] ?>" class="btn btn-primary">Delete</a>
                </div>            
              </div>
             </div>
             <?php 
           }
         }
         ?>
            </div>
         </div>
      </div>
   </div>
 </div>
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
</div>

 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Username</th>
      <th scope="col">Address</th>
    
      <th scope="col">Contact</th>
      <th scope="col">Service Type</th>
      <th scope="col">Booked Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
</body>
</html>