<?php
    session_start();
	include("functions.php");
	$dblink=db_connect("contact_data");

    /* retrieve search and sort parameters from URL */
    $search = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "%";  // default to all results if no search
    $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'first_name';        // default sort by name
    $valid_sort_columns = ['first_name', 'last_name'];
    $order_by = in_array($sort_by, $valid_sort_columns) ? $sort_by : 'first_name';
    

	//$sql="SELECT * FROM `form_data` WHERE 1";

    $sql = "SELECT * FROM `form_data` 
            WHERE `first_name` LIKE ? OR `last_name` LIKE ? 
            ORDER BY $order_by ASC";

    $stmt = $dblink->prepare($sql);
    $stmt->bind_param('ss', $search, $search);
    $stmt->execute();

    $results = $stmt->get_result() or 
        die("<h2>Something went wrong with $sql</h2>".$dblink->error);

	//$results=$dblink->query($sql) or 
	//	die("<h2>Something went wrong with $sql</h2>".$dblink->error);
	
    while ($data=$results->fetch_array(MYSQLI_ASSOC))
	{
		echo '<tr>';
		echo '<td>'.$data['first_name'].'</td>';
		echo '<td>'.$data['last_name'].'</td>';
		echo '<td>'.$data['email'].'</td>';
		echo '<td>'.$data['phone'].'</td>';
		echo '<td>'.$data['username'].'</td>';
		echo '<td>'.$data['password_hash'].'</td>';

        // if logged in, add an edit link NEED TO EDIT VALUES TO MATCH DB
        if( isset($_SESSION['username']) ) {
            echo '<td><a href="editadmin.php?auto_id=' . htmlspecialchars($data['auto_id']) . '">Edit</a></td>';
        }

		echo '</tr>';
	}
?> 