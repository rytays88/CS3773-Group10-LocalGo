<?php
// functions.php

// Database connection details
$host = 'localgodbschema.c5uw0emaalmq.us-east-2.rds.amazonaws.com';
$dbname = 'LocalGoDBSchema';
$user = 'admin';
$pass = 'adminpassword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Set an error message to be handled on the pages that include functions.php
    $dbConnectionError = "Could not connect to the database. Please try again later.";
    // Optionally log the detailed error message for debugging (but don’t display to users)
    error_log("Database Connection Error: " . $e->getMessage());
}

// function to retrieve event by ID
function get_event_by_id($event_id) {     // think current database uses firstName for eventID? 
    global $pdo;    // global pdo instance 

    // SQL query: retrieve event details w/event_id
    $sql = "SELECT * FROM Event WHERE event_id = :event_id";   // edit as needed

    try {
        // prepare and execute query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);    // bind event_id parameter
        $stmt->execute();

        // fetch result as an associative array
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        // return event data if found
        return $event ? $event : false;
    } catch (PDOException $e) {
        error_log("Error fetching event : " . $e->getMessage());
        return false; 
    }
}

function create_event($name, $date, $created_by) {
    global $pdo;

    $sql = "INSERT INTO Event (event_name, event_date, created_by) VALUES (?, ?, ?)";


    try {
        // prepare and execute query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $name, PDO::PARAM_STR);    // bind name parameter
        $stmt->bindParam(2, $date, PDO::PARAM_STR);    // bind date parameter
        $stmt->bindParam(3, $created_by, PDO::PARAM_INT);    // bind created_by parameter
        $stmt->execute();

        // return ID of new event
        return $pdo->lastInsertId(); 
    } catch (PDOException $e) {
        error_log("Error creating event : " . $e->getMessage());
        return false; 
    }
}

// function to update event details 
function update_event($event_id, $name, $date) {
    global $pdo; 

    // SQL query: retrieve event details w/event_id
    $sql = "UPDATE Event SET event_name = ?, event_date = ? WHERE event_id = ?";   // edit as needed

    try {
        // prepare and execute query
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $name, PDO::PARAM_STR);    // event name string
        $stmt->bindParam(2, $date, PDO::PARAM_STR);    // event date string
        $stmt->bindParam(3, $event_id, PDO::PARAM_INT);    // event id integer
        $stmt->execute();

        return true; // return true if update is successful, optional
    } catch (PDOException $e) {
        error_log("Error updating event : " . $e->getMessage());
        return false; 
    }
}
?>
