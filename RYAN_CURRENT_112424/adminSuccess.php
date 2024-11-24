<?php
session_start();
include("functions.php");
if (!isset($_SESSION['user_id'])) {
   header("Location: login.php");
   exit();
}
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Chaz Ortiz - ADMIN | SE Group Project</title>
	  <link href="assets/css/bootstrap.css" rel="stylesheet">
	  <link href="assets/css/justified-nav.css" rel="stylesheet">
	  <link href="assets/css/styles.css" rel="stylesheet"> <!-- Custom CSS -->
    </head>
    <body>
    <div class="container-fluid">
        <div class="header masthead">
            <h3 class="text-muted">Software Engineering Group Project</h3>
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

        <!-- Scrollable Content -->
        <div class="content">
            <!-- Jumbotron -->
            <div class="jumbotron">
                <h3>Welcome to Event Management Page</h3>
                <h3>Add New event</h3>
            </div>
            <div class="jumbotron">
                <h2>BOOKING ADMINISTRATION PAGE. FILL OUT THE FORM</h2>
            </div>
            <!-- Table centered with space on each side -->
            <div class="row justify-content-center">
                <div class="col-md-12 col-md-offset-3"> 
                    <h1>Data successfully entered into the database!</h1>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/add-content.js"></script>
    <script src="assets/js/event-attributes.js"></script>
    <div id="hl-aria-live-message-container" aria-live="polite" class="visually-hidden"></div>
    <div id="hl-aria-live-alert-container" role="alert" aria-live="assertive" class="visually-hidden"></div>
    </body>
</html>