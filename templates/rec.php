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
        <a href="recommend.php">Recommend Me</a>
        <a href="userbanqdetails.php">Selected Banquet Details</a>
        <a href="changepassword.php">Change Password</a>
        <a href="logout.php">Logout</a>
        
      </div>
    </nav>

    <div class="main-body">
      <h2>Dashboard</h2>
      <form class="form">
    <p class="title">Banquet Near Me</p>
    <p class="message">Fill the details to find the best banquet for you </p>
        <div class="flex">
        <label>
            <input required="" placeholder="" type="text" class="input">
            <span>Name</span>
        </label>

        <label>
            <input required="" placeholder="" type="text" class="input">
            <span>Location</span>
        </label>
    </div>  
            
    <label>
        <input required="" placeholder="" type="budget" class="input">
        <span>Budget</span>
    </label> 
        
    <label>
        <!-- <input required="" placeholder="" type="text" class="input"> -->
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

    <label>
        <input required="" placeholder="" type="number" class="input">
        <span>Total Number of People</span>
    </label>
     <label>
        <input required="" placeholder="" type="contact" class="input">
        <span>Contact Details</span>
    </label>
    <button class="submit">Submit</button>

</form>
      </div>
</body>
</html>

