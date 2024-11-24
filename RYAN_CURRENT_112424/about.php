<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>About Us</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/justified-nav.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <div class="header masthead">
      <h3 class="text-muted">About Us Page</h3>
      <nav>
        <ul class="nav nav-justified">
          <li class="nav-item "><a class="nav-link" href="home.php">HOME</a></li>
		  <li class="nav-item"><a class="nav-link" href="about.php">ABOUT US</a></li>
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
		<div id="output"></div>
        <h2>About us</h2>
	  </div>
	  <section class="section black">
		  <div class="row">
			<div class="col-lg-4">
			  <h2>What We Are</h2>
			  <div><p>This is a web application for a music venue that showcases a calendar of upcoming events. Built using a LEMP stack (Linux, Nginx, MySQL, PHP) for the backend, and HTML, CSS, and JavaScript for the frontend, the app provides a user friendly interface for users to stay updated on live performances.</p></div>
			</div>
			<div class="col-lg-4">
			  <h2>Technology Used</h2>
				<div>
					<p><b>Frontend:</b></p>
					<ul>
						<li><p><b>HTML:</b> Structure of the web pages.</p></li>
						<li><p><b>CSS:</b> Styling and layout.</p></li>
						<li><p><b>JavaScript:</b> Dynamic content and interactivity.</p></li>
					</ul>
				</div>
				<div>
					<p><b>Backend:</b></p>
					<ul>
						<li><p><b>LEMP Stack:</b></p></li>
						<ul>
							<li><p><b>Linux:</b> Server OS.</p></li>
							<li><p><b>Nginx:</b> Web server.</p></li>
							<li><p><b>MySQL:</b> Database management for storing event information.</p></li>
							<li><p><b>PHP:</b> Server-side scripting language.</p></li>
						</ul>
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
			  <h2>Developers</h2>
			  	<div>
					<ul>
						<li><p>Chaz Ortiz</p></li>
						<li><p>Ernesto Gonzalez</p></li>
						<li><p>Ryan Tays</p></li>
						<li><p>Vico Abel</p></li>
					</ul>
				</div>
			</div>
		  </div>
	  </section>
    </div>
  </div>
<script src="assets/js/add-content.js"></script>
</body>
</html>
