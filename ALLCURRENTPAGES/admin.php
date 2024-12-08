<?php
session_start();
include("functions.php");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>PROJECT GROUP 10 | ADMIN </title>
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
          <li class="nav-item "><a class="nav-link" href="home.php">UPCOMING EVENTS</a></li>
		  <li class="nav-item"><a class="nav-link" href="about.html">ABOUT US</a></li>
		  <li class="nav-item"><a class="nav-link" href="location.html">LOCATION</a></li>
		  <li class="nav-item active"><a class="nav-link" href="contact-new3.php">ADMIN LOGIN</a></li>
        </ul>
      </nav>
    </div>
    <div class="content">
      <div class="jumbotron">
        <h3>FILLERthisCanbeReplacedByaSpacer</h3>
		<h3>FILLER</h3>
	  </div>
      <div class="jumbotron">
        <h2>BOOKING ADMINISTRATION PAGE.</h2>
		<h2>PLEASE FILL OUT THE FORM</h2>
		<h2>TO ADD AN EVENT TO THE</h2>
		<h2>UPCOMING EVENTS PAGE</h2>
	  </div>
		  <div class="row justify-content-center">
		  <div class="col-md-12 col-md-offset-3"> 
			<?php
			  if (!isset($_POST['submit']))
			  {  
			?>  
			<form action="contactEvents.php" method="post">   
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
				else 
				{
					if (isset($_SESSION['firstname']) && $_SESSION['firstname']!=NULL) // previous first name success data load
					{
						echo '<div class="form-group has-success" >';
						echo '<label class="control-label" for="firstname">First Name</label>';
						echo '<input name="firstName" type="text" class="form-control" id="FirstName" value="'.$_Session['firstname'].'">';
						echo '<div id="fnFeedback" class="help-block"></div>';
						echo '</div>';
					}
					else 
					{
					echo '<div class="form-group" >';
					echo '<label class="control-label" for="firstname">PERFORMER NAME</label>';
					echo '<input name="firstName" type="text" class="form-control" id="FirstName" placeholder="Name">';
					echo '<div id="fnFeedback" class="help-block"></div>';
					echo '</div>';
					}
				}
			?>	
			<div class="form-group" id="lastnameStatus">
			  <label class="control-label" for="lastname">DATE</label>
			  <input name="lastName" type="text" class="form-control" id="LastName" placeholder="Date">
			  <div id="lnFeedback" class="help-block"></div>
			</div> 	
              <button name="submit" value="SUBMIT" type="submit" class="btn btn-primary custom-portfolio-btn">Submit</button>
			</form> 
			<?php
			    }
			else
			{
				$fnamerr='';
				$firstname=addslashes($_POST['firstName']);  
				$lastname=addslashes($_POST['lastName']);
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$comment=$_POST['comments'];
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
					redirect("contact-new3.php?fnamerr=$fnamerr&lnamerr=$lnamerr&emailerr=$emailerr");    /// home or contact
				$dblink=db_connect("contact_data");
				$sql="Insert into `form_data` (`first_name`,`last_name`,`email`,`phone`,`username`,`password`,`comments`) values('$firstname','$lastname','$email','$phone','$username','$password','$comments')";
				$dblink->query($sql) or 
					die("<p>Something went wrong with: <br>$sql<br>".$dblink->error);
				echo '<h1>Data successfully entered into the database!</h1>';
			}
			?> 
      	</div>
	   </div>
	</div>
  </div> 
   </body>
</html>
<script src="assets/js/add-content.js"></script>
<script src="assets/js/event-attributes.js"></script>
