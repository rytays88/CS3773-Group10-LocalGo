<?php
session_start();
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chaz Ortiz - Location | Location</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/justified-nav.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet"> 
</head>
<body>
  <div class="container-fluid">
    <div class="header masthead">
      <h3 class="text-muted">Location</h3>
      <nav>
        <ul class="nav nav-justified">
          <li class="nav-item "><a class="nav-link" href="sampleindex.php">HOME</a></li>
		  <li class="nav-item"><a class="nav-link" href="about.html">ABOUT US</a></li>
		  <li class="nav-item"><a class="nav-link" href="location.php">Location</a></li>

      <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Show Logout if user is logged in -->
         <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
      <?php else: ?>
        <!-- Show Login if user is not logged in -->
        <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
      <?php endif; ?>   
        </ul>
      </nav>
    </div>
    <div class="content">
      <div class="jumbotron">
        <h3>FILLERthisCanbeReplacedByaSpacer</h3>
		<h3>Filler</h3>
	  </div>
      <div class="jumbotron">
		<div id="output"></div>
        <h2>We are located in downtown San Antonio. Visit us here: </h2>
        <h2>2410 N St Mary's St, San Antonio, TX 78212</h2>
        <div>(817) 630-1279</div>
        <div>6 PM-12 AM Daily</div>
	  </div>
	  <section class="section black">
		  <div class="row">
			<div class="col-lg-12">
			  <h2>Interactive Map: </h2>
			  <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6948.643923546806!2d-98.49022235982594!3d29.448607446657952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x865c5f5e29d409ed%3A0x19a2581c77a74cc0!2sPaper%20Tiger!5e0!3m2!1sen!2sus!4v1731607987621!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
			</div>
		  </div>
	  </section>
    </div>
  </div> 
<script src="assets/js/add-content.js"></script>
</body>
</html>
