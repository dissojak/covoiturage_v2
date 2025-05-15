<?php
require_once('../controllers/TripHistoryController.php');
require_once('../models/TripHistory.php');
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
session_start();

$username = $_SESSION['username'];
$AC = new AccountController();
$THController = new TripHistoryController();

// Get CIN of the client (assuming it's stored in session or retrievable)
$cinClient = $AC->getCinbyUsername($username);

// Fetch the trip history for the client
$trips = $THController->getClientTrips($cinClient);

// Pass the data to the view
include('userTripHistoryView.php');  // Include the view file
?>
