<?php
require_once('../controllers/OwnerHistoryController.php');
require_once('../models/OwnerHistory.php');
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');

session_start();

$username = $_SESSION['username'];
$AC = new AccountController();
$OHC = new OwnerHistoryController();

$cinOwner = $AC->getCinbyUsername($username);

$history = $OHC->getHistoryByOwner($cinOwner);

// Pass the data to the view
include('ownerHistory.php'); 
?>
