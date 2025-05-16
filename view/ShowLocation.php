<?php
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');

session_start();
$username = $_SESSION['username'];

$AC = new AccountController();
$LC = new LocationController();

$mat = $AC->getPlaceResbyUsername($username);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Available Locations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('../assets/bg-image.png') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6 font-sans">
    <div class="bg-white w-full max-w-5xl rounded-2xl shadow-xl p-8 md:p-10 border border-gray-200 relative">

        <button onclick="history.back()" aria-label="Go Back" class="absolute top-6 left-6 flex items-center gap-2 text-gray-600 hover:text-gray-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="hidden sm:inline">Back</span>
        </button>

        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Available Locations</h1>

        <!-- Search block -->
        <div class="mb-6 transition-all duration-300 ease-in-out">
            <input
                type="text"
                id="searchInput"
                placeholder="Filter by any field..."
                class="w-full border border-gray-300 rounded-xl px-4 py-3 text-base bg-white shadow-sm transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-blue-500 focus:shadow-lg transform focus:scale-[1.02]" />
        </div>

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
            <tbody id="locationsTable">
                <?php
                $loc = new LocationController();
                $availableLocations = $loc->showAvailableLocations();

                foreach ($availableLocations as $location) {
                    echo "<tr class='border-b border-gray-200'>";
                    echo "<td class='px-6 py-4'>" . htmlspecialchars($location['nbplace']) . "</td>";
                    echo "<td class='px-6 py-4'>" . htmlspecialchars($location['prix']) . "</td>";
                    echo "<td class='px-6 py-4'>" . htmlspecialchars($location['datedepare']) . "</td>";
                    echo "<td class='px-6 py-4'>" . htmlspecialchars($location['villedepare']) . "</td>";
                    echo "<td class='px-6 py-4'>" . htmlspecialchars($location['villefin']) . "</td>";
                    echo "<td class='px-6 py-4'>" . htmlspecialchars($location['Cin']) . "</td>";
                    echo "<td class='px-6 py-4'>" . htmlspecialchars($location['mat']) . "</td>";
                    echo "<td class='px-6 py-4'>";
                    echo "<form method='POST' action='payment.php'>";
                    echo "<input type='hidden' name='idlocation' value='" . htmlspecialchars($location['idlocation']) . "'>";
                    echo "<button type='submit' class='bg-blue-500 text-white py-2 px-4 w-32 rounded hover:bg-blue-600 transition'>Make Location</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="mt-6 flex items-center justify-between flex-wrap">
            <div class="flex gap-4">
                <?php if ($mat): ?>
                    <a href="LocationMade.php" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600 transition">Location Made</a>
                <?php endif; ?>
                <a href="AddVoiture.php" class="bg-yellow-500 text-white py-2 px-6 rounded-lg hover:bg-yellow-600 transition">Add Voiture</a>
            </div>

            <a href="../services/logout.php" class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600 transition">Disconnect</a>
        </div>

    </div>

    <!-- Search filter script -->
    <script>
        const synonymMap = {
            "TOUNES": ["TUNIS", "TUNISIA"],
            "SOUSSA": ["SOUSSE"],
            "MESTIR": ["MONASTIR"],
            "GAFSAA": ["GAFSA"],
            "SFA9ES": ["SFAX"],
            "NABEL": ["NABEUL"],
            "MEHDIA": ["MAHDIA"]
        };
        const searchInput = document.getElementById("searchInput");
        const rows = document.querySelectorAll("#locationsTable tr");

        function normalize(input) {
            input = input.toUpperCase().trim();
            for (const [wrong, correctList] of Object.entries(synonymMap)) {
                if (input.includes(wrong)) return correctList;
            }
            return [input];
        }

        function fuzzyMatch(a, b) {
            a = a.toUpperCase();
            b = b.toUpperCase();
            let maxLen = Math.max(a.length, b.length);
            let mismatches = 0;
            for (let i = 0; i < maxLen; i++) {
                if (a[i] !== b[i]) mismatches++;
                if (mismatches > 2) return false; // allow 2 typos max
            }
            return true;
        }

        searchInput.addEventListener("input", function() {
            const filters = normalize(searchInput.value);

            rows.forEach(row => {
                const rowText = row.textContent.toUpperCase();
                const match = filters.some(filter =>
                    rowText.includes(filter) || rowText.split(/\s+/).some(word => fuzzyMatch(word, filter))
                );
                row.style.display = match ? "" : "none";
            });
        });
    </script>

    <!-- Placeholder animation script -->
    <script>
        const fixedText = "Filter by any field ";
        const phrases = [
            "Like Sousse 🌊",
            "Like Rades 🔧",
            "Like Nabeul 🌶️",
            "Like Tounes 🇹🇳",
            "Like Mestir 🏖️",
            "Place you need 📍"
        ];


        const input = document.getElementById("searchInput");
        let phraseIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function animatePlaceholder() {
            let currentPhrase = phrases[phraseIndex];
            let displayText;

            if (isDeleting) {
                charIndex--;
                displayText = fixedText + currentPhrase.substring(0, charIndex);
            } else {
                charIndex++;
                displayText = fixedText + currentPhrase.substring(0, charIndex);
            }

            input.placeholder = displayText;

            if (!isDeleting && charIndex === currentPhrase.length) {
                isDeleting = true;
                setTimeout(animatePlaceholder, 1000); // pause before deleting
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                phraseIndex = (phraseIndex + 1) % phrases.length;
                setTimeout(animatePlaceholder, 300); // pause before typing next
            } else {
                setTimeout(animatePlaceholder, isDeleting ? 60 : 100);
            }
        }

        animatePlaceholder();
    </script>
</body>

</html>