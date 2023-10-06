<?php
session_start();
require_once "../database/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Banquet Page</title>
  <link rel="stylesheet" href="css/userpage.css" />
  <!-- Font Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="css/recommend.css">
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

    <div class="main-body">
      <h2>Dashboard</h2>
      <form class="form" action="recommendshow.php" method="post">
    <p class="title">Banquet Near Me</p>
    <p class="message">Fill the details to find the best banquet for you </p> 
            
    <label>
        <input required="" placeholder="" type="number"  name="budget" class="input">
        <span>Budget</span>
    </label> 
        
    <label>
    <span>Service type</span>
    <select id="service" name="service" class="input" required>
        <option></option>

        <?php
            $query="SELECT * FROM service";
            $result = mysqli_query($conn, $query);
            $data=mysqli_num_rows($result);

            if($data>0){
                while($row=mysqli_fetch_array($result)){

            
        ?>
                     <option><?php echo $row['title']?></option>
                     <?php
        }
    }
    ?>
        </select>
      </label>

    <label>
        <input required="" placeholder="" name="number" type="number" class="input">
        <span>Total Number of People</span>
    </label>
      <button type="button" class="submit" onclick="getLocation()">Location</button>

        <span id="location"></span>
        <input type="hidden" id="longitudeInput" name="longitude">
        <input type="hidden" id="latitudeInput" name="latitude">
        <input type="submit" name="submit" class="submit" value="Submit" />

</form>
      </div>
</body>
</html>
<script>
  // document.addEventListener("DOMContentLoaded", function () {
  //   const form = document.querySelector(".form");
  //   form.addEventListener("submit", function (event) {
  //     event.preventDefault();

  //     const budget = document.querySelector(".input[type='budget']").value;
  //     const service = document.querySelector(".input[type='service']").value;
  //     const totalPeople = document.querySelector(".input[type='number']").value;

  //     // Validate budget (assuming it should be a positive number)
  //     if (!budget || isNaN(parseFloat(budget)) || parseFloat(budget) <= 0) {
  //       alert("Please enter a valid budget.");
  //       return;
  //     }

  //     if (!service) {
  //           alert("Please select a service type.");
  //           return;
  //       }

  //     // Validate total number of people
  //     if (!totalPeople || isNaN(parseInt(totalPeople)) || parseInt(totalPeople) <= 0) {
  //       alert("Please enter a valid total number of people.");
  //       return;
  //     }

  //     form.submit();
    
  //   });
  // });

   function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert('Geolocation is not supported by this browser.');
      }
    }

    function showPosition(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      
      // Display location in span tag
      var locationSpan = document.getElementById('location');
      locationSpan.innerHTML = 'Latitude: ' + latitude + ', Longitude: ' + longitude;
      
      // Store values in hidden input fields
      var latitudeInput = document.getElementById('latitudeInput');
      var longitudeInput = document.getElementById('longitudeInput');
      latitudeInput.value = latitude;
      longitudeInput.value = longitude;
    }
</script>