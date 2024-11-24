<?php
session_start();
include("functions.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventName = $_POST['eventName'] ?? null;     // use updated field name
    $eventDate = $_POST['eventDate'] ?? null;
    $createdBy = $_SESSION['user_id'];            // logged in user's id

    if( empty($eventName) || empty($eventDate) ) {
        die("All fields are required.");
    } 

    $newEventID = create_event($eventName, $eventDate, $createdBy); // create event w/ function from functions.php

    if( $newEventID ) {
        header("Location: adminSuccess.php");
        exit();
    } else {
        echo "Failed to created event, please try again later.";   
    }
}
?>