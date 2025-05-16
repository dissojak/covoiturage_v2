<?php
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
require_once('../controllers/LocationController.php');
require_once('../models/Location.php');

session_start();

$username = $_POST['username'] ?? null;
$pw = $_POST['pw'] ?? null;

$AC = new AccountController();
$LC = new LocationController();

if ($AC->verifyLogin($username, $pw)) {
    $_SESSION['username'] = $username;
    $role = $AC->selectRole($username);

    if ($role === 'user') {
        header('Location: ShowLocation.php');
        exit();
    } elseif ($role === 'owner') {
        $cin = $AC->getCinByUsername($username); // Make sure this method is implemented
        if ($LC->checkLocationByCin($cin)) {
            header('Location: PlacesStillAvailabale.php');
        } else {
            header('Location: CarNotInLocation.php');
        }
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Unknown role: $role</p>";
        exit();
    }
} else {
    $error = "Invalid username or password. Please try again.";
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Login Error</title>
      <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans p-4">
      <div class="bg-white shadow-lg rounded-xl p-8 max-w-md w-full text-center">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Login Failed</h2>
        <p class="text-red-700 mb-6">' . htmlspecialchars($error) . '</p>
        <a href="login.php" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition">
          Back to Login
        </a>
      </div>
    </body>
    </html>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reservation Made</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f0f4f8] min-h-screen flex items-center justify-center p-6 font-sans">
  <div class="bg-white w-full max-w-4xl rounded-2xl shadow-xl p-8 md:p-10 border border-gray-200">

    <div class="mb-6 text-center">
      <?php if ($role == 'owner'): ?>
        <h2 class="text-2xl font-semibold text-blue-600">As an owner, you can make reservations for your location!</h2>
        <p class="text-gray-600 mt-2">Please ensure you set your car's location before proceeding.</p>
      <?php else: ?>
        <h2 class="text-2xl font-semibold text-green-600">You're a regular user!</h2>
        <p class="text-gray-600 mt-2">You can make a reservation for an existing location or check available ones.</p>
      <?php endif; ?>
    </div>

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
        <?php if (!empty($showReservation)): ?>
          <?php foreach ($showReservation as $location): ?>
            <tr class="border-b border-gray-200">
              <td class="px-6 py-4"><?= $location['prix'] ?></td>
              <td class="px-6 py-4"><?= $location['datedepare'] ?></td>
              <td class="px-6 py-4"><?= $location['villedepare'] ?></td>
              <td class="px-6 py-4"><?= $location['villefin'] ?></td>
              <td class="px-6 py-4"><?= $location['cin'] ?></td>
              <td class="px-6 py-4"><?= $location['mat'] ?></td>
              <td class="px-6 py-4">
                <form method="POST" action="deleteReservation.php">
                  <input type="hidden" name="username" value="<?= $username ?>">
                  <button type="submit" class="btn bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Cancel Reservation</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center py-4 text-gray-500">No reservations found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <div class="mt-6 text-center">
      <a href="showlocation.php" class="btn bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600">Go to Show Location</a>
    </div>

  </div>
</body>
</html>
