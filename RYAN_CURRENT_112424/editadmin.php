<?php
session_start();
include("functions.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// check if event ID (edit to what your events are in DB) is provided
if( isset($_GET['event_id']) ) {
    $event_id = $_GET['event_id'];

    // get event data from DB
    $event = get_event_by_id($event_id); // defined in my functions.php
    if(!$event) {
        echo "Event not found";
        exit();
    }
} else {
    echo "No event ID provided";
    exit();
}

// handle form submission to update the event (change values where needed)
if( isset($_POST['submit']) ) {
    $name = htmlspecialchars(trim($_POST['eventName'])); // change for DB
    $date = htmlspecialchars(trim($_POST['eventDate']));

    if( empty($name) || empty($date) ) {
        echo "All fields are required.";
        exit();
    } 

    // update event in DB
    if(update_event($event_id, $name, $date)) {    // function in functions.php
        header("Location: adminSuccess.php");
        exit();
    } else {
        echo "Failed to update event.";
    }
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
                <h3>Edit Event</h3>
                <p>Modify the event details below</p>
            </div>

            <!-- Table centered with space on each side -->
            <div class="row justify-content-center">
                <div class="col-md-12 col-md-offset-3"> == $0
                    <form action="editadmin.php?event_id=<?php echo $event_id; ?>" method="post">  <!-- edit w correct edit php name and event_id in DB-->
                        <div class ="form-group">
                            <label class="control-label" for="eventName">PERFORMER NAME</label>
                            <input name="eventName" type="text" class="form-control" id="eventName" value="<?php echo $event['event_name']; ?>" placeholder="Name">
                            <!-- <div id="fnFeedback" class="help-block"></div> (dont think if we need this for editing)-->
                        </div>
                        <div class ="form-group">
                            <label class="control-label" for="eventDate">DATE</label>
                            <input name="eventDate" type="text" class="form-control" id="eventDate" value="<?php echo $event['event_date']; ?>" placeholder="Date">
                            <!-- <div id="lnFeedback" class="help-block"></div> -->
                        </div>
                        <button name="submit" value="SUBMIT" type="submit" class="btn btn-primary custom-portfolio-btn">Update event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/add-content.js"></script>
    <script src="assets/js/event-attributes.js"></script>
    <div id="hl-aria-live-message-contatiner" aria-live="polite" class="visually-hidden"></div>
    <div id="hl-aria-live-alert-contatiner" role="alert" aria-live="assertive" class="visually-hidden"></div>
    </body>
</html>