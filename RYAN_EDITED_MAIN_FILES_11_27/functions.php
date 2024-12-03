<?php
function db_connect($db)  // modified to connect to my test database, change back to your stuff (didnt want to put in public repo)
{
	$dbUserName="admin";
	$dbPassword="adminpassword";
	$host="localgodbschema.c5uw0emaalmq.us-east-2.rds.amazonaws.com";
	$dblink=new mysqli($host,$dbUserName,$dbPassword,$db);

	// Check for database connection error
    if ($dblink->connect_error) {
        die("Connection failed: " . $dblink->connect_error);
    }

	return $dblink;
}
function redirect ( $uri )
{ ?>
	<script type="text/javascript">
	document.location.href=",?php echo $uri; ?>";
	</script>
<?php die;
}

// function to update event details 
function update_event($event_id, $name, $date) {
    $dblink = db_connect('contact_data');

    // SQL query: update event details w/auto_id
    $sql = "UPDATE form_data SET first_name = ?, last_name = ? WHERE auto_id = ?";   // edit as needed

    if( $stmt = $dblink->prepare($sql) ) {
		// bind params
		$stmt->bind_param("ssi", $name, $date, $event_id);	

		// execute query 
		if($stmt->execute()) {
			return true;
		} else {
			error_log("Error updating event: " . $stmt->error);
			return false;
		}
	} else {
		error_log("Error preparing statement: " . $dblink->error);
		return false;
	}
}

// function to retrieve event by ID
function get_event_by_id($event_id) {     // think current database uses firstName for eventID? 
    $dblink = db_connect('contact_data');

    // SQL query: update event details w/auto_id
    $sql = "SELECT * FROM form_data WHERE auto_id = ?";   // edit as needed

    if( $stmt = $dblink->prepare($sql) ) {
		// bind params
		$stmt->bind_param("i", $event_id);	

		// execute query 
		$stmt->execute();

		// get result 
		$result = $stmt->get_result();

		if( $event = $result->fetch_assoc() ) {
			return $event;
		} else {
			return false;
		}
	} else {
		error_log("Error preparing statement: " . $dblink->error);
		return false;
	}
}
?>