<?php
session_start();
require_once "../database/connection.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['register'])){
        $title=$_POST['title'];
        $people=$_POST['people'];
        $price=$_POST['price'];
        $description=$_POST['description'];
        $id=$_SESSION['banquetid'];
        $targetDirectory="banquetimage/";
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $uniqueFilename = uniqid() . '_' . bin2hex(random_bytes(8)) . '.' . $extension;
        $targetFile = $targetDirectory . $uniqueFilename;
        $errors = array();

        // Validate title
   if (empty($title)) {
      $errors["title"] = "title is required";
   }
      // Validate people
   if (empty($people)) {
      $errors["people"] = "Number of people is required";
   }
        // Validate price
   if (empty($price)) {
      $errors["price"] = "Price is required";
   }
      // Validate description
   if (empty($description)) {
      $errors["description"] = "Description is required";
   }
        // Validate image
   if (empty($extension)) {
      $errors["image"] = "Image is required";
   }


        if (empty($errors)) {
        
            $query= "INSERT INTO service (banquetid,title, limitedpeople, perpeopleprice,description,serviceimage) VALUES ('$id','$title','$people', '$price','$description','$uniqueFilename')";
            $execute=mysqli_query($conn, $query);

            if($execute && move_uploaded_file($_FILES['image']['tmp_name'],$targetFile)){
                
                header("location:ourservice.php");
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

    <div class="main-body">
      <form class="form" action="#" method="POST" enctype="multipart/form-data">
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                     <div class="input-box">
                        <header>New Services Form</header>
            
                        <div class="input-field">
                            <input type="text" class="input" id="title" required autocomplete="off" name="title">
                            <label for="title">Service Title</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["title"]) ? $errors["title"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="people" required autocomplete="off" name="people">
                            <label for="people">Limited Number of People</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["people"]) ? $errors["people"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="price" required autocomplete="off" name="price">
                            <label for="price">Per Person Price</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["price"]) ? $errors["price"] : ""; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="description" required autocomplete="off" name="description">
                            <label for="description">Description</label>
                            <span class="error" style="color:red;"><?php echo isset($errors["description"]) ? $errors["description"] : ""; ?></span>
                        </div>
        
                         <div class="input-field">
                        <input type="file" id="image"  name="image">
                        <span class="error" style="color:red;"><?php echo isset($errors["image"]) ? $errors["image"] : ""; ?></span>
                        <ul id="image-list"></ul>
                        <div id="image-container"></div>
                           </div>


                        <div class="input-field">
                            <input type="submit" class="submit" value="Register" name="register">
                            
                        </div>
                     </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>

</body>
<script>

  $(document).ready(function() {
    $('#add-image').click(function() {
      var imageInput = $('#image').clone();
      $('#image-container').append(imageInput);
    });
  });
</script>
</html>

