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
  
        <label>
          <span>Service type</span>
          <select id="service">
      <option value="Weaning Ceremony">For Weaning Ceremony</option>
      <option value="Weeding Ceremony">For Weeding Ceremony</option>
      <option value="Birthday Celebration">For Birthday Celebration</option>
      <option value="Holiday Celebrations">For Holiday Celebrations</option>
      <option value="Farewell Programs">For Farewell Programs</option>
      <option value="Charity Events">For Charity Events</option>
         </select>
       </label>

        </div>
        <button class="form-submit-btn" type="submit">Book the Venue</button>
      </form>

    </div>
</body>
</html>

