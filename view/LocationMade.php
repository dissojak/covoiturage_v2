<?php
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');

session_start();
$username = $_SESSION['username'];

// Initialize Controllers
$AC = new AccountController();
$LC = new LocationController();

// Get the role of the user (owner or user)
$role = $AC->selectRole($username);

// Get the user's location reservation (mat)
$mat = $AC->getPlaceResbyUsername($username);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservation Made</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('../assets/bg-image.png') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="bg-white w-full max-w-4xl rounded-2xl shadow-xl p-8 md:p-10 border border-gray-200">

        <!-- Custom Message for Owner or Normal User -->
        <div class="mb-6 text-center">
            <?php if ($role == 'owner'): ?>
                <h2 class="text-2xl font-semibold text-blue-600">As an owner, you can reserve a place in another car if needed!</h2>
                <p class="text-gray-600 mt-2">In case your car is unavailable, feel free to reserve a place in another vehicle.</p>
            <?php else: ?>
                <h2 class="text-2xl font-semibold text-green-600">You're a regular user!</h2>
                <p class="text-gray-600 mt-2">You can reserve a place in an available car or check out other options.</p>
            <?php endif; ?>
        </div>

        <!-- Reservations Table -->
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Your Reservations</h1>
        <table class="table-auto w-full text-sm text-left text-gray-500 border-collapse">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Departure Date</th>
                    <th class="px-6 py-3">Departure City</th>
                    <th class="px-6 py-3">Destination City</th>
                    <th class="px-6 py-3">CIN</th>
                    <th class="px-6 py-3">Mat</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch reservations for the user's mat
                $showReservation = $LC->showReservation($mat);
                foreach ($showReservation as $location) {
                    echo "<tr class='border-b border-gray-200'>";
                    echo "<td class='px-6 py-4'>" . $location['prix'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['datedepare'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['villedepare'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['villefin'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['cin'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['mat'] . "</td>";
                    echo "<td class='px-6 py-4'>";
                    echo "<form method='POST' action='deleteReservation.php'>";
                    echo "<input type='hidden' name='username' value='" . $username . "'>";
                    echo "<button type='submit' class='btn bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600'>Cancel Reservation</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Button to go to location page -->
        <div class="mt-6 text-center">
            <a href="showlocation.php" class="btn bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600">Go to Show Location</a>
        </div>
    </div>

</body>

</html>