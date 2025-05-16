<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="validation.js" defer></script>
  <style>
    body {
      background: url('../assets/bg-image.png') no-repeat center center fixed;
      background-size: cover;
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Login</h2>
    <form action="loginaction.php" method="POST" id="loginForm" class="space-y-4">
      <div>
        <label for="username" class="block text-gray-700 mb-1">Username</label>
        <input type="text" id="username" name="username" required class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>
      <div>
        <label for="pw" class="block text-gray-700 mb-1">Password</label>
        <input type="password" id="pw" name="pw" required class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>
      <div class="flex items-center justify-between">
        <input type="submit" value="Login" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer" />
        <button type="button" onclick="location.href='signup.php';" class="text-blue-600 hover:underline">Sign Up</button>
      </div>
    </form>
  </div>
</body>

</html>