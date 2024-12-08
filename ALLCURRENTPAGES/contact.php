<?php
session_start();
include("functions.php");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>PROJECT GROUP 10 | LOGIN </title>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/justified-nav.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet"> <!-- Custom CSS -->
</head>
<body>
  <div class="container-fluid">
    <!-- Header -->
    <div class="header masthead">
      <h3 class="text-muted">Software Engineering Group Project </h3>
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
        <h2> </h2>
	  </div>
      <!-- example row of columns -->
		  <div class="row justify-content-center">
		  <div class="col-md-12 col-md-offset-3"> 
		
			  
			<?php
			  if (!isset($_POST['submit']))
			  {  
			?>  
			<form action="contact.php" method="post">
			<?php
				if (isset($_GET['fnamerr']))
				{
					if ($_GET['fnamerr']=="NULL")
					{
						echo '<div class="form-group has-error" >';
						echo '<label class="control-label" for="firstname">First Name</label>';
						echo '<input name="firstName" type="text" class="form-control" id="FirstName" placeholder="First Name">';
						echo '<div id="fnFeedback" class="help-block">First name cannnot be BLANK!!!</div>';
						echo '</div>';
					}
					elseif ($_GET['fnamerr']=="invalidSize")
					{
						echo '<div class="form-group has-error">';
						echo '<label class="control-label" for="firstname">First Name</label>';
						echo '<input name="firstName" type="text" class="form-control" id="FirstName"   value="'.$_SESSION['firstname'].'">';
						echo '<div id="fnFeedback" class="help-block">First name must have more than two characters!</div>';
						echo '</div>';
					}
					elseif ($_GET['fnamerr']=="invalidChar")
					{
						echo '<div class="form-group has-error">';
						echo '<label class="control-label" for="firstname">First Name</label>';
						echo '<input name="firstName" type="text" class="form-control" id="FirstName"  value="'.$_SESSION['firstname'].'">';
						echo '<div id="fnFeedback" class="help-block">First name cannnot contain invalid characters!</div>';
						echo '</div>';
					}
				}
				else // my element without errors or initial load
				{
					if (isset($_SESSION['firstname']) && $_SESSION['firstname']!=NULL) // previous first name success data load
					{
						echo '<div class="form-group has-success" >';
						echo '<label class="control-label" for="firstname">First Name</label>';
						echo '<input name="firstName" type="text" class="form-control" id="FirstName" value="'.$_SESSION['firstname'].'">';
						echo '<div id="fnFeedback" class="help-block"></div>';
						echo '</div>';
					}
					else // true first page load
					{
					echo '<div class="form-group" >';
					echo '<label class="control-label" for="firstname">First Name</label>';
					echo '<input name="firstName" type="text" class="form-control" id="FirstName" placeholder="First Name">';
					echo '<div id="fnFeedback" class="help-block"></div>';
					echo '</div>';
					}
				}
			?>

			  
			
			<!-- New input field -->	
			<div class="form-group" id="firstnameStatus">
			  <label class="control-label" for="firstname">First Name</label>
			  <input name="firstName" type="text" class="form-control" id="FirstName" placeholder="First Name">
			  <div id="lnFeedback" class="help-block"></div>
			</div>
			

			<div class="form-group" id="lastnameStatus">
			  <label class="control-label" for="lastname">Last Name</label>
			  <input name="lastName" type="text" class="form-control" id="LastName" placeholder="Last Name">
			  <div id="lnFeedback" class="help-block"></div>
			</div>



			<div class="form-group" id="emailStatus">
				<label class="control-label" for="email">Email</label>
				<input name="email" type="email" class="form-control" id="Email" placeholder="Email Address">
				<span class="help-block" id="emailFeedback"></span>
  			</div>	

				
	
			<div class="form-group" id="phoneStatus">
				<label class="control-label"  for="phone">Phone</label>
				<input name="phone" type="phone" class="form-control" id="Phone" placeholder="Phone"/>
				<div id="phoneFeedback" class="help-block"></div>
			</div>

			  
			<div class="form-group" id="usernameStatus">
				<label class="control-label" for="username">Create a username: </label>
				<input name="username" type="text" class="form-control" id="username" placeholder="Username"/>
				<div id="unFeedback" class="help-block"></div>
			</div>
			
			<div class="form-group" id="passwordStatus">				
				<label class="control-label" for="password">Create a password: </label>
				<input name="password" type="password" class="form-control" id="password" placeholder="Password"/>
				<div id="pwFeedback" class="help-block"></div>
			</div>
			  
				
			<!--	
			<div class="form-group" id="commentsStatus">				
				<label class="control-label" for="comments">Comments</label>
				<textarea name="comments" class="form-control" id="comments" placeholder="Comments"></textarea>
				<div id="commentsFeedback" class="help-block"></div>
			</div> 
			-->


            <!-- Submit Button -->
              <button name="submit" value="SUBMIT" type="submit" class="btn btn-primary custom-portfolio-btn">LOGIN</button>

			</form>
			  
			<?php
			    }
			else
			{
				$fnamerr='';
				$firstname=addslashes($_POST['firstName']);  // Had to change this to 'firstName', not 'firstname'
				$lastname=addslashes($_POST['lastName']);
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$username=$_POST['username'];
				$password=$_POST['password'];

                // Password hash
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
				
				if ($firstname==NULL)			
					$fnamerr="NULL";
				elseif(strlen($firstname)<3)
				{
					$fnamerr="invalidSize";
					$_SESSION['firstname']=$firstname;
				}					
				elseif(preg_match('/^[a-zA-Z\'-]{2,}$/',$firstname)===FALSE)
				{
					$fnamerr="invalidChar";
					$_SESSION['firstname']=$firstname;
				}
								
				if ($fnamerr!=NULL)
					redirect("contact.php?fnamerr=$fnamerr&lnamerr=$lnamerr&emailerr=$emailerr");
				$dblink=db_connect("contact_data");
				$sql="Insert into `Users` (`first_name`,`last_name`,`email`,`phone`,`username`,`password_hash`) values('$firstname','$lastname','$email','$phone','$username','$passwordHash')";
				$dblink->query($sql) or 
					die("<p>Something went wrong with: <br>$sql<br>".$dblink->error);
				echo '<h1>Data successfully entered into the database!</h1>';
				
			}
			?>
			  
      	</div>
	   </div>
	</div>

    <!-- Footer -->
    <div class="footer">
      <p>&copy; Website created by Chaz Ortiz.</p>
    </div>
  </div> <!-- /container-fluid -->
   </body>
</html>
<script src="assets/js/add-content.js"></script>
<script src="assets/js/event-attributes.js"></script>
