<!-- did i break it -->
<?php
session_start();
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture username and password from the form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        $error_message = "Username and password cannot be empty.";
    } else {
        // Connect to the database
        $dblink = db_connect("contact_data");

        // SQL query to check if the username exists and retrieve the associated password
        $sql = "SELECT password_hash FROM Users WHERE username = ? LIMIT 1;";
        $stmt = $dblink->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch the plain text password from the database
            $row = $result->fetch_assoc();
            $db_password = $row['password_hash'];  // Get the hashed password from DB

            // Check if the entered password matches the stored plain text password
            if (password_verify($password, $db_password)) {
                $_SESSION['username'] = $username; // Set session variable
                header("Location: admin.php"); // Redirect to admin.php
                exit(); // Stop further execution
            } else {
                $error_message = "Invalid username or password.";
            }
        } else {
            $error_message = "Invalid username or password.";
        }

        // Close resources
        $stmt->close();
        $dblink->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PROJECT GROUP 10 | Login </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/justified-nav.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
	   <div class="header masthead">
       <h3 class="text-muted">Software Engineering Group Project</h3>
		  <nav>
			<ul class="nav nav-justified">
			  <li class="nav-item "><a class="nav-link" href="home1.php">UPCOMING EVENTS</a></li>
			  <li class="nav-item"><a class="nav-link" href="about.html">ABOUT US</a></li>
			  <li class="nav-item"><a class="nav-link" href="location.html">LOCATION</a></li>
			  <li class="nav-item active"><a class="nav-link" href="contact-new3.php">ADMIN LOGIN</a></li>
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
		
      <!-- Jumbotron -->
      <div class="jumbotron">
		<!-- <div id="output"></div> -->
        <h2> LOGIN </h2>
	  </div>
      <!-- example row of columns -->
		  <div class="row justify-content-center">
		  <div class="col-md-12 col-md-offset-3"> 
		
		
		
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
			
			<!-- REGISTER Button -->
        	<a href="registration.php" class="btn btn-secondary mt-3">REGISTER</a>
        </form>
    </div>
	</div>		  
	</div>	
	</div>	<!-- /container -->
		
</body>
</html>

<script src="assets/js/add-content.js"></script>
<script src="assets/js/event-attributes.js"></script>
