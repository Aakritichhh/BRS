<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Banquet Recommendaton System</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="css/recommend.css">
   </head>
   <body>
      <div class="call_text_main">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
               </div>
               <div class="col-md-4">
                  <div class="header_social_icon">
                     <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
                             
            </div>
         </div>
      </div>
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand"href="index.html"><img src="images/logo.png"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                     </li>
                  
      
                     <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                     </li>
                     
                  </ul> 
                  <form class="form-inline my-2 my-lg-0">
                     <div class="serach_icon"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                  </form>
               </div>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <!-- banner section start --> 
      <div class="banner_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="banner_img"><img src="images/wc.png"></div
                  <div class="banner_img"><img src="images/bc.png"></div>  
           
   
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
         </div>
      </div>

</body>
</html>