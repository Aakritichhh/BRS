<?php
session_start();
require('../database/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['orders']))
  {
    $eventDate = $_POST["date"];
    $numberOfPeople = $_POST["noofpeople"];
    $serviceType = $_POST["servicetype"];

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
        //database
        $successMessage = "Form submitted successfully!";
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

        <form class="form" method="post" action="">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="event-date" name="date" placeholder="Event Date" required="">
                <label for="number">Number of People</label>
              <input type="number" id="number-of-people" name="noofpeople" placeholder="Number of People" required="">

                 <label>
                    <span>Service type</span>
                    <select id="service" name="servicetypes" class="input" required>
                        <option value="">Select a Service</option>
                        <option value="Weaning Ceremony">For Weaning Ceremony</option>
                        <option value="Wedding Ceremony">For Wedding Ceremony</option>
                        <option value="Birthday Celebration">For Birthday Celebration</option>
                        <option value="Holiday Celebrations">For Holiday Celebrations</option>
                        <option value="Farewell Programs">For Farewell Programs</option>
                        <option value="Charity Events">For Charity Events</option>
                    </select>
                </label>
            </div>
            <button class="form-submit-btn" type="submit">Book the Venue</button>
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