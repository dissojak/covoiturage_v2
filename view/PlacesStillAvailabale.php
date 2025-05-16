<?php
require_once('../services/AutoTripRegistrar.php');
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
require_once('../controllers/VoitureController.php');
require_once('../models/Voiture.php');
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');

session_start();
$username = $_SESSION['username'] ?? null;

if (!$username) {
  header('Location: login.php');
  exit;
}

$autoRegistrar = new AutoTripRegistrar();
$autoRegistrar->registerFinishedTrips();

$AC = new AccountController();
$VC = new VoitureController();
$LC = new LocationController();

$cin = $AC->getCinbyUsername($username);
$mat = $VC->getMatbyCin($cin);
$id = $LC->getIdbyMat($mat);
$nbPlace = $LC->getNumberOfPlace($cin);

$_SESSION['mat'] = $mat;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Available Places</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background: url('../assets/bg-image.png') no-repeat center center fixed;
      background-size: cover;
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col justify-center items-center px-4">

  <div class="w-full max-w-xl bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-3xl font-bold text-center mb-6">Available Places</h1>

    <div class="flex justify-between mb-4">
      <span class="text-gray-700 font-medium">Car Location ID:</span>
      <span class="text-gray-900"><?php echo htmlspecialchars($id); ?></span>
    </div>

    <div class="flex justify-between mb-6">
      <span class="text-gray-700 font-medium">Available Places:</span>
      <span class="text-4xl font-bold text-green-600"><?php echo htmlspecialchars($nbPlace); ?></span>
    </div>

    <div class="flex flex-col gap-4 sm:flex-row sm:justify-between mb-4">
      <a href="UsersInCar.php" class="flex-1 text-center bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded transition">
        Users In Your Car
      </a>
      <a href="ownerHistory.php" class="flex-1 text-center bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded transition">
        Owner History
      </a>
      <a href="ShowLocation.php" class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition">
        Show Locations
      </a>
    </div>

    <a href="../services/logout.php" class="block w-full text-center bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded transition">
      Disconnect
    </a>

  </div>

</body>

</html>