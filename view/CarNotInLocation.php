<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>No Car Set</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: url('../assets/bg-image.png') no-repeat center center fixed;
      background-size: cover;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-6 font-sans">

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl w-full mb-8">
    
    <!-- Add Location Card -->
    <div class="bg-gradient-to-r from-blue-400 to-indigo-500 rounded-2xl shadow-xl p-8 border-4 border-blue-600">
      <div class="text-center text-white">
        <div class="text-5xl mb-4 animate-pulse">🚘</div>
        <h1 class="text-2xl md:text-3xl font-semibold mb-4">Add Your Location</h1>
        <p class="text-lg mb-6">
          Set your car's location to make it visible to others.
        </p>
        <a href="AddLocation.php"
           class="bg-blue-700 text-white py-3 rounded-lg text-lg font-medium hover:bg-blue-800 transition-all w-full block shadow-md hover:shadow-lg">
          ➕ Add Location
        </a>
      </div>
    </div>
    
    <!-- Reserve in Others' Locations Card -->
    <div class="bg-gradient-to-r from-green-400 to-teal-500 rounded-2xl shadow-xl p-8 border-4 border-green-600">
      <div class="text-center text-white">
        <div class="text-5xl mb-4 animate-pulse">🛣️</div>
        <h1 class="text-2xl md:text-3xl font-semibold mb-4">Reserve in Others' Locations</h1>
        <p class="text-lg mb-6">
          You can reserve cars in other people's locations.
        </p>
        <a href="MakeLocation.php"
           class="bg-green-700 text-white py-3 rounded-lg text-lg font-medium hover:bg-green-800 transition-all w-full block shadow-md hover:shadow-lg">
          Reserve in Others' Locations
        </a>
      </div>
    </div>
    
  </div>

  <a href="../services/logout.php"
     class="bg-red-500 hover:bg-red-600 text-white py-3 px-10 rounded-lg text-lg font-semibold shadow-md transition">
    Disconnect
  </a>

</body>
</html>
