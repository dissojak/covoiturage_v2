<?php
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$LC = new LocationController();
$placeres = $LC->getplaceres($username);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reserved Matricule</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('../assets/bg-image.png') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 bg-gray-100 bg-opacity-50">

    <div class="bg-white bg-opacity-90 rounded-xl shadow-lg p-8 max-w-md w-full">
        <?php if ($placeres !== null && isset($placeres['placeRes'])): ?>
            <h1 class="text-2xl font-semibold mb-6 text-center">Reserved Matricule</h1>
            <p class="text-xl text-center mb-6 font-mono"><?php echo htmlspecialchars($placeres['placeRes']); ?></p>
            <form action="delete_reservation.php" method="post" onsubmit="return confirm('Are you sure you want to delete this reservation?');" class="flex justify-center mb-4">
                <input type="hidden" name="matricule" value="<?php echo htmlspecialchars($placeres['placeRes']); ?>">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded transition">
                    Delete Reservation
                </button>
            </form>
            <div class="flex justify-center">
                <button onclick="history.back()" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded transition">
                    Go Back
                </button>
            </div>
        <?php else: ?>
            <h1 class="text-2xl font-semibold mb-4 text-center">No Reservation</h1>
            <p class="text-center text-gray-700 mb-6">No place is currently reserved.</p>
            <div class="flex justify-center">
                <button onclick="history.back()" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded transition">
                    Go Back
                </button>
            </div>
        <?php endif; ?>
    </div>

</body>


</html>
