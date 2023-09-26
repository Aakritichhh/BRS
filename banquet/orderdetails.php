<?php
session_start();
require('../database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/banquetprofile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Banquet Recommendation System</title>

<style>
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
        <a href="banquetprofile.php" class="active">Dashboard</a>
        <a href="newbanquet.php">Edit Banquet</a>
        <a href="ourservice.php">Our Services</a>
        <a href="newservices.php">Add Services</a>
        <a href="orderdetails.php">Order Details</a>
        <a href="logoutbanquet.php">Logout</a>
        
      </div>
    </nav>

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
            $banquetid=$_SESSION['banquetid'];
            $query="SELECT * FROM orders WHERE banquetid='$banquetid'";
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
      <td><button style="color:green">Accept</button>
      <button style="color:red">Decline</button></td>
    </tr>
    <?php
}
}
  ?>
  </tbody>

</table>
</body>
</html>