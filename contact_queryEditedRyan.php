<?php
    session_start();
	include("functions.php");
	$dblink=db_connect("contact_data");
	$sql="SELECT * FROM `form_data` WHERE 1";
	$results=$dblink->query($sql) or 
		die("<h2>Something went wrong with $sql</h2>".$dblink->error);
	while ($data=$results->fetch_array(MYSQLI_ASSOC))
	{
		echo '<tr>';
		echo '<td>'.$data['first_name'].'</td>';
		echo '<td>'.$data['last_name'].'</td>';
		echo '<td>'.$data['email'].'</td>';
		echo '<td>'.$data['phone'].'</td>';
		echo '<td>'.$data['username'].'</td>';
		echo '<td>'.$data['password'].'</td>';
		echo '<td>'.$data['comments'].'</td>';

        // if logged in, add an edit link NEED TO EDIT VALUES TO MATCH DB
        if( isset($_SESSION['user_id']) ) {
            echo '<td><a href="editadmin.php?form_id=' . $data['id'] . '">Edit</a></td>';
        }

		echo '</tr>';
	}
?> 