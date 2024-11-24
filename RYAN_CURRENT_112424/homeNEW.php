<?php
session_start();
include("functions.php");

if (!isset($_SESSION['user_id'])) {
   header("Location: login.php");
   exit();
}

// check for search term 
$search = isset($_GET['search']) ? htmlspecialchars(trim($_GET['search'])) : '';
$events = get_all_events($search);

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
          <li class="nav-item active"><a class="nav-link" href="home.php">HOME</a></li>
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
        <h3>FILLER</h3>
        <h3>FILLER</h3>
      </div>
      <div class="jumbotron">
        <h2>UPCOMING EVENTS</h2>
      </div>

      <!-- Search form -->
      <form action="home.php" method="get" class= "form-inline mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search for an event" value ="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit" class="btn btn-primary ml-2">Search</button>
      </form>

      <!-- Table centered with space on each side -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive table-container">
                    <table class="table text-center">
					            <thead>
                        <tr> 
						              <th style = "text-align: center;">Performer Name</th>
						              <th style = "text-align: center;">Date</th>						  
						            </tr>
					            </thead>
           				    <tbody id="form_info">
                        <?php if ($events): ?>
                          <?php foreach ($events as $event): ?>
                            <tr>
                              <td><?php echo htmlspecialchars($event['event_name']); ?></td>
                              <td><?php echo htmlspecialchars($event['event_date']); ?></td>
                              <td>
                                <!-- Link to editadmin.php with event_id as query paramater -->
                                <a href="editadmin.php?event_id=<?php echo $event['event_id']; ?>">Edit Event</a>
                              </td>
                            </tr>
                          <?php endforeach; ?>   
                        <?php else: ?>
                          <tr>
                            <td colspan="3">No upcoming events found.</td>
                          </tr>
                        <?php endif; ?>   
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- /container-fluid -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/add-content.js"></script>
    <!-- <script>
        function refresh_data() {
            $.ajax({
                type: 'get',
                url: 'https://ec2-3-18-111-72.us-east-2.compute.amazonaws.com/SEproject1030/contact_query.php',
                success: function(data) {
                    $('#form_info').html(data);
                }
            });
        }
        setInterval(function() { refresh_data(); }, 500);
    </script> -->
  </div>  
  <div id="hl-aria-live-message-container" aria-live="polite" class="visually-hidden"></div>
  <div id="hl-aria-live-alert-container" role="alert" aria-live="assertive" class="visually-hidden"></div>
  </body>
</html>