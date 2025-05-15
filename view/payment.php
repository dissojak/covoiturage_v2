<?php
session_start();
$locationId = $_POST['idlocation'];
$_SESSION['idlocation'] = $locationId;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Payment</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      overflow: hidden;
      position: relative;
      font-family: sans-serif;
    }

    .triangle-left {
      position: absolute;
      top: 0;
      left: 0;
      width: 0;
      height: 0;
      border-top: 100vh solid #7F5CFF; /* Dark Purple */
      border-right: 100vw solid transparent;
      z-index: 0;
    }

    .triangle-right {
      position: absolute;
      bottom: 0;
      right: 0;
      width: 0;
      height: 0;
      border-bottom: 100vh solid #D16BA5; /* Dark Pink */
      border-left: 100vw solid transparent;
      z-index: 0;
    }

    .content {
      position: relative;
      z-index: 10;
    }
  </style>
</head>
<body>
  <div class="triangle-left"></div>
  <div class="triangle-right"></div>

  <div class="flex items-center justify-center min-h-screen px-6 content">
    <div class="bg-white p-8 shadow-2xl rounded-xl w-full max-w-lg">
      <h2 class="text-3xl font-semibold text-gray-900 mb-8 text-center">Payment Information</h2>

      <!-- Error handling -->
      <?php if (isset($error)): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
          <p class="text-sm"><?= $error; ?></p>
        </div>
      <?php endif; ?>

      <!-- Payment form -->
      <form class="space-y-6" method="POST" action="paymentAction.php">
        <div>
          <label class="block text-gray-700 font-medium mb-2" for="card">Card Number</label>
          <input type="text" id="card" name="card" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-500" placeholder="1234 5678 9101 1121" required>
        </div>

        <div class="flex space-x-4">
          <div class="w-1/2">
            <label class="block text-gray-700 font-medium mb-2" for="dateCard">Expiry Date</label>
            <input type="text" id="dateCard" name="dateCard" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-500" placeholder="MM/YY" required>
          </div>

          <div class="w-1/2">
            <label class="block text-gray-700 font-medium mb-2" for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-500" placeholder="CVV" required>
          </div>
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-2" for="nameOwner">Cardholder Name</label>
          <input type="text" id="nameOwner" name="nameOwner" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-500" placeholder="John Doe" required>
        </div>

        <div class="flex justify-center">
          <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">Pay Now</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
