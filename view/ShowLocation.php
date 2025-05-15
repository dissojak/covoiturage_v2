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

// Get the user's location reservation (mat)
$mat = $AC->getPlaceResbyUsername($username);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Available Locations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="bg-white w-full max-w-5xl rounded-2xl shadow-xl p-8 md:p-10 border border-gray-200">

        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Available Locations</h1>

        <!-- Locations Table -->
        <table class="table-auto w-full text-sm text-left text-gray-500 border-collapse mb-6">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Number of Places</th>
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
                // Fetch available locations
                $loc = new LocationController();
                $availableLocations = $loc->showAvailableLocations();

                foreach ($availableLocations as $location) {
                    echo "<tr class='border-b border-gray-200'>";
                    echo "<td class='px-6 py-4'>" . $location['nbplace'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['prix'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['datedepare'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['villedepare'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['villefin'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['Cin'] . "</td>";
                    echo "<td class='px-6 py-4'>" . $location['mat'] . "</td>";
                    echo "<td class='px-6 py-4'>";
                    echo "<form method='POST' action='payment.php'>";
                    echo "<input type='hidden' name='idlocation' value='" . $location['idlocation'] . "'>";
                    echo "<button type='submit' class='btn bg-blue-500 text-white py-2 px-4 w-32 rounded hover:bg-blue-600'>Make Location</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Buttons Section -->
        <div class="mt-6 space-x-4">
            <?php if ($mat): ?>
                <a href="LocationMade.php" class="btn bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600">Location Made</a>
            <?php endif; ?>
            <a href="AddVoiture.php" class="btn bg-yellow-500 text-white py-2 px-6 rounded-lg hover:bg-yellow-600">Add Voiture</a>
        </div>

    </div>

</body>

</html>
