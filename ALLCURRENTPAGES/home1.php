<?php
session_start();
include("functions.php");

//$search = isset($_GET['search']) ? htmlspecialchars(trim($_GET['search'])) : '';

?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>PROJECT GROUP 10 | UPCOMING EVENTS</title>
	  <link href="assets/css/bootstrap.css" rel="stylesheet">
	  <link href="assets/css/justified-nav.css" rel="stylesheet">
	  <link href="assets/css/styles.css" rel="stylesheet">
	  <style>
		.table-container {
		  display: flex;
		  justify-content: center;
		  margin: 0 auto;
		  padding: 20px;
		}
		table {
		  width: 60%; 
		  text-align: center;
		  border-spacing: 0; 
		}
		th, td {
		  padding: 15px;
		  vertical-align: middle;
		}
	  </style>
	</head>
	<body>
  <div class="container-fluid">
    <div class="header masthead">
      <h3 class="text-muted">Software Engineering Group Project</h3>
      <nav>
        <ul class="nav nav-justified">
          <li class="nav-item active"><a class="nav-link" href="home1.php">UPCOMING EVENTS</a></li>
		      <li class="nav-item"><a class="nav-link" href="about.php">ABOUT US</a></li>
		      <li class="nav-item"><a class="nav-link" href="location.php">LOCATION</a></li>

		      <?php if (isset($_SESSION['username'])): ?>
            <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="contact-new3.php">ADMIN LOGIN</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>

    <div class="content">
      <div class="jumbotron">
        <h3>FILLER</h3>
        <h3>FILLER</h3>
      </div>
      <div class="jumbotron">
        <h2>UPCOMING EVENTS</h2>
      </div>

      <!-- Search form -->
      <form action="contact_query.php" method="get" class= "form-inline mb-3">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search for an event" value ="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">
        <button type="submit" class="btn btn-primary ml-2" id="searchButton">Search</button>
        
        <select name="sort_by" id="sort_by" class="form-control ml-2">
            <option value="name" <?php echo isset($_GET['sort_by']) && $_GET['sort_by'] == 'name' ? 'selected' : '';?>>Sort By Name</option>
            <option value="date" <?php echo isset($_GET['sort_by']) && $_GET['sort_by'] == 'date' ? 'selected' : '';?>>Sort By Date</option>
        </select>

        <button type="submit" class="btn btn-secondary ml-2" id="sortButton">Sort</button>
      </form>        

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive table-container">
                    <table class="table text-center">
					  <thead>
						<tr>
						  <tr>
							  <th style="text-align: center;">Performer Name</th>
							  <th style="text-align: center;">Date</th>
                <?php if (isset($_SESSION['username'])): ?> <!-- change w appropriate DB values -->
                  <th style="text-align: center;">Actions</th>
                <?php endif; ?>  
						  </tr>
						</tr>
					  </thead>
           				<tbody id="form_info"> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/add-content.js"></script>
    <script src="assets/js/eventsSorting.js"></script>
    <script> 
        function refresh_data() {
            $.ajax({
                type: 'get',
                url: 'http://18.217.97.3/music-venue-app/contact_query.php',
                success: function(data) {
                    $('#form_info').html(data);
                }
            });
        }
        setInterval(function() { refresh_data(); }, 500);
    </script>