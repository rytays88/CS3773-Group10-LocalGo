<?php
session_start();
include("functions.php");
//if (!isset($_SESSION['user_id'])) {
//    header("Location: login.php");
//    exit();
//}
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Chaz Ortiz - HOME | SE Group Project</title>
	  <link href="assets/css/bootstrap.css" rel="stylesheet">
	  <link href="assets/css/justified-nav.css" rel="stylesheet">
	  <link href="assets/css/styles.css" rel="stylesheet"> <!-- Custom CSS -->
	  <style>
		/* Center the table container with space on the sides */
		.table-container {
		  display: flex;
		  justify-content: center;
		  margin: 0 auto;
		  padding: 20px;
		}
		/* Table styling */
		table {
		  width: 60%; /* Adjust this value for more or less width */
		  text-align: center;
		  border-spacing: 0; /* Remove gaps between cells */
		}
		th, td {
		  padding: 15px;
		  vertical-align: middle;
		}
	  </style>
	</head>
	<body>
  <div class="container-fluid">
    <!-- Header -->
    <div class="header masthead">
      <h3 class="text-muted">Software Engineering Group Project</h3>
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
    <!-- Scrollable Content -->
    <div class="content">
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h3>FILLER</h3>
        <h3>FILLER</h3>
      </div>
      <div class="jumbotron">
        <h2>UPCOMING EVENTS</h2>
      </div>
      <!-- Table centered with space on each side -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive table-container">
                    <table class="table text-center">
					  <thead>
						<tr>
						  <th>Performer Name</th>
						  <th>Date</th>
						  <th>Time</th>
						  <th>Price</th>
						  <th>Details</th>
						</tr>
					  </thead>
           				<tbody id="form_info"> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- /container-fluid -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/add-content.js"></script>
    <script>
        function refresh_data() {
            $.ajax({
                type: 'get',
                url: 'https://ec2-3-18-111-72.us-east-2.compute.amazonaws.com/hw15/contact_quiery.php',
                success: function(data) {
                    $('#form_info').html(data);
                }
            });
        }
        setInterval(function() { refresh_data(); }, 500);
    </script>
