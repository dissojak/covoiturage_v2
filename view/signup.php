  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body {
        background: url('../assets/bg-image.png') no-repeat center center fixed;
        background-size: cover;
      }
    </style>
  </head>

  <body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-4xl">
      <h2 class="text-xl font-bold text-center text-blue-600 mb-4">Create an Account</h2>
      <form action="signupaction.php" method="POST" onsubmit="return validateForm()">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="nom" class="text-sm">Nom</label>
            <input type="text" id="nom" name="nom" required class="w-full border px-3 py-1 rounded" />
          </div>
          <div>
            <label for="pr" class="text-sm">Prénom</label>
            <input type="text" id="pr" name="pr" required class="w-full border px-3 py-1 rounded" />
          </div>
          <div>
            <label for="cin" class="text-sm">CIN</label>
            <input type="text" id="cin" name="cin" required class="w-full border px-3 py-1 rounded" />
          </div>
          <div>
            <label for="adresse" class="text-sm">Adresse</label>
            <input type="text" id="adresse" name="adresse" required class="w-full border px-3 py-1 rounded" />
          </div>
          <div>
            <label for="tel" class="text-sm">Téléphone</label>
            <input type="tel" id="tel" name="tel" required class="w-full border px-3 py-1 rounded" />
          </div>
          <div>
            <label for="role" class="text-sm">Role</label>
            <select id="role" name="role" class="w-full border px-3 py-1 rounded">
              <option value="user">User</option>
              <option value="owner">Owner</option>
            </select>
          </div>
          <div>
            <label for="username" class="text-sm">Username</label>
            <input type="text" id="username" name="username" required class="w-full border px-3 py-1 rounded" />
          </div>
          <div>
            <label for="password" class="text-sm">Password</label>
            <input type="password" id="password" name="password" required class="w-full border px-3 py-1 rounded" />
          </div>
          <div>
            <label for="confirm_password" class="text-sm">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required class="w-full border px-3 py-1 rounded" />
          </div>
        </div>
        <div class="flex justify-between mt-6">
          <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
            Sign Up
          </button>
          <a href="login.php" class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300 transition text-center">
            Retour à la connexion ⬅
          </a>
        </div>

      </form>
    </div>

    <script>
      function validateForm() {
        const pw = document.getElementById("password").value;
        const cpw = document.getElementById("confirm_password").value;
        if (pw !== cpw) {
          alert("Passwords do not match.");
          return false;
        }
        return true;
      }
    </script>
  </body>

  </html>