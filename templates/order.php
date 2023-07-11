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

      <form class="form">
        <div class="form-group">
          <label for="date">Date</label>
          <input type="date" id="number" name="eventdate" placeholder="Event Date" required="">
        <label for="number">Number of People</label>
          <input type="number" id="number" name="people" placeholder="Number of People" required="">
  
        <label for="service">Select your service type</label>
          <input type="text" id="service" name="service" placeholder="Select your services" required="">
        </div>
        <button class="form-submit-btn" type="submit">Book the Venue</button>
      </form>

    </div>
</body>
</html>

