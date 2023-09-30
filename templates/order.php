<?php
session_start();
require('../database/connection.php');
$banquetid=3;
$userid=$_SESSION['userid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['submit']))
  {
    $eventDate = $_POST["date"];
    $numberOfPeople = $_POST["noofpeople"];
    $serviceType = $_POST["servicetypes"]; 

    $errors = [];

    if (empty($eventDate)) {
        $errors[] = "Event Date is required.";
    }

    if (empty($numberOfPeople)) {
        $errors[] = "Number of People is required.";
      }
      if (empty($serviceType)) {
        $errors[] = "Service Type is required.";
    }

    if (count($errors) === 0) {
        $query= "INSERT INTO orders (date,noofpeople,servicetype,banquetid,userid) VALUES ('$eventDate','$numberOfPeople','$serviceType','$banquetid','$userid')";
          
        
      if (mysqli_query($conn,$query)) {
            echo "Form submitted successfully!";
        } else {
            $errors[] = "Error: " . mysqli_error($conn);
        }
    
    }
  }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="css/order.css">
	<title>Order form</title>
</head>
<body>
<div class="form-container">

        <div class="logo-container">
            Order Form
        </div>

        <form class="form" method="post" action="#">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="event-date" name="date" placeholder="Event Date" required="">
                <label for="number">Number of People</label>
              <input type="number" id="number-of-people" name="noofpeople" placeholder="Number of People" required="">
                 <label>
                    <span>Service type</span>
    
                    <select id="service" name="servicetypes" class="input" required>
                        <option>Select a Service</option>
                        
                    
         <?php
            $query="SELECT * FROM service where banquetid='$banquetid'";
            $result = mysqli_query($conn, $query);
            $data=mysqli_num_rows($result);

            if($data>0){
                while($row=mysqli_fetch_array($result)){

            
        ?>
                     <option value="<?php echo $row['title']?>"><?php echo $row['title']?></option>

                     <?php
        }
    }
    ?> 
                    </select>

                    
                </label>
            </div>
            
            <input class="form-submit-btn" type="submit" name="submit">
              
        </form>
        
        <?php if (isset($errors)): ?>
            <div class="error-messages">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php elseif (isset($successMessage)): ?>
            <div class="success-message">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>
    </div>
    <script>
  document.getElementById("event-date").addEventListener("input", function() {
    var inputDate = new Date(this.value);
    var currentDate = new Date();

    if (inputDate < currentDate) {
      this.setCustomValidity("Please select a future date.");
    } else {
      this.setCustomValidity("");
    }
  });
</script>

</body>
</html>