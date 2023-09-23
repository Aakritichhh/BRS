<?php
session_start();
require_once "../database/connection.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['register'])){
        $username=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $id=$_SESSION['banquetid'];
        $targetDirectory="banquetimage/";
        $extension = pathinfo($_FILES['profileimage']['name'], PATHINFO_EXTENSION);
        $uniqueFilename = uniqid() . '_' . bin2hex(random_bytes(8)) . '.' . $extension;
        $targetFile = $targetDirectory . $uniqueFilename;
        $errors = array();
   
   // Validate username
   if (empty($username)) {
      $errors["name"] = "Banquet name is required";
   }

   // Validate address
   if (empty($address)) {
      $errors["address"] = "Address is required";
   }

   // Validate image
   if (empty($extension)) {
      $errors["profileimage"] = "Image is required";
   }
   
   // Validate contact
   if (empty($contact)) {
      $errors["contact"] = "Contact is required";
   } 
   elseif (!preg_match("/^\d{10}$/", $contact)) 
   {
      $errors["contact"] = "Invalid Contact. Please enter a 10-digit number.";
   }

   //validate email
   if (empty($email)) {
      $errors["email"] = "Email is required";
   }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors["email"] = "Invalid Email";
   }
         
        if (empty($errors)) {
            $query= "UPDATE banquet_tb SET name='$username',email='$email',contact='$contact',address='$address', profile_img='$uniqueFilename' WHERE id='$id'";

            $execute=mysqli_query($conn, $query);
            if($execute && move_uploaded_file($_FILES['profileimage']['tmp_name'],$targetFile)){
                
                header("location:banquetprofile.php");
            }
            else{
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/banquetprofile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Banquet Recommendation System</title>
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
    <form class="form" action="#" method="POST" enctype="multipart/form-data">
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image-------->
                    <img src="images/white.png" alt="">
               
                </div>
                <div class="col-md-6 right">
                     <div class="input-box">
                        <header>New Banquet Form</header>
                        <div class="input-field">
                            <input type="text" class="input" id="name" required autocomplete="off" name="name">
                            <label for="name">Banquet Name</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["name"]) ? $errors["name"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="email" required autocomplete="off" name="email">
                            <label for="email">Email</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["email"]) ? $errors["email"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="contact" required autocomplete="off" name="contact">
                            <label for="contact">Contact Details</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["contact"]) ? $errors["contact"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="Location" required autocomplete="off" name="address">
                            <label for="Location">Address</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["address"]) ? $errors["address"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <button type="button" onclick="getLocation()">Get Location</button>

                            <span id="location"></span>
                            <input type="hidden" id="longitudeInput" name="longitude">
                            <input type="hidden" id="latitudeInput" name="latitude">
                            
                        </div>
        
                         <div class="input-field">
                        <input type="file" id="image"  name="profileimage">
                        <span class="error" style="color:red;"><?php echo isset($errors["profileimage"]) ? $errors["profileimage"] : ""; ?></span>
                           </div>

                        <div class="input-field">
                            <input type="submit" class="submit" value="Register" name="register">
                            
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
<script type="text/javascript">

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
</html>