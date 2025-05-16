<?php
session_start();

$isLoggedIn = isset($_SESSION['username']);
$username = $isLoggedIn ? $_SESSION['username'] : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Accueil - Covoiturage</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: url('../assets/bg-image.png') no-repeat center center fixed;
      background-size: cover;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.3);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 50;
      display: none;
    }

    .spinner {
      border: 4px solid #f3f3f3;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      width: 48px;
      height: 48px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body class="text-white min-h-screen flex flex-col bg-black bg-opacity-80">

  <!-- Header -->
  <header class="bg-gray-900 bg-opacity-90 text-white py-6 shadow">
    <div class="max-w-6xl mx-auto px-4 flex justify-between items-center">
      <div>
        <h1 class="text-3xl font-bold transition duration-300 hover:text-blue-400 cursor-pointer">
          Bienvenue sur CarGo
        </h1>
        <p class="text-sm mt-1 text-gray-300">Simplifiez vos trajets quotidiens</p>
      </div>
      <div class="flex items-center gap-4">
        <?php if ($isLoggedIn): ?>
          <span>Bonjour, <strong><?php echo htmlspecialchars($username); ?></strong></span>
          <a href="javascript:void(0);" id="logoutBtn" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-100 transition">Déconnexion</a>
        <?php else: ?>
          <a href="login.php" class="bg-white text-blue-600 hover:text-white px-4 py-2 rounded hover:bg-blue-600 transition">Connexion</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow">
    <!-- Hero / Intro -->
    <section class="py-12">
      <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-semibold mb-4">Une plateforme de covoiturage simple et efficace</h2>
        <p class="text-gray-300 text-lg">Réservez ou proposez des trajets en toute confiance avec notre application sécurisée et intuitive.</p>
      </div>
    </section>

    <!-- How it works -->
    <section class="py-12">
      <div class="max-w-6xl mx-auto px-4">
        <h3 class="text-xl font-bold mb-10 text-center">Comment ça marche</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-gray-900 rounded-2xl p-6 shadow-lg flex flex-col items-center text-center hover:scale-105 transition transform duration-300">
            <div class="text-5xl mb-4">📝</div>
            <h4 class="text-lg font-semibold mb-2">Inscription</h4>
            <p class="text-sm text-gray-300">Créez un compte gratuitement en quelques secondes.</p>
          </div>
          <div class="bg-gray-900 rounded-2xl p-6 shadow-lg flex flex-col items-center text-center hover:scale-105 transition transform duration-300">
            <div class="text-5xl mb-4">🚗</div>
            <h4 class="text-lg font-semibold mb-2">Publiez ou Réservez</h4>
            <p class="text-sm text-gray-300">Ajoutez votre trajet ou trouvez celui qui vous correspond.</p>
          </div>
          <div class="bg-gray-900 rounded-2xl p-6 shadow-lg flex flex-col items-center text-center hover:scale-105 transition transform duration-300">
            <div class="text-5xl mb-4">✅</div>
            <h4 class="text-lg font-semibold mb-2">Voyagez</h4>
            <p class="text-sm text-gray-300">Rejoignez votre conducteur ou passager et profitez du trajet.</p>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-4 text-center text-sm">
    &copy; <?php echo date("Y"); ?> Covoiturage. Tous droits réservés.
  </footer>

  <!-- Full-page loading overlay -->
  <div id="loadingOverlay" class="overlay">
    <div class="spinner"></div>
  </div>

  <script>
    const logoutBtn = document.getElementById('logoutBtn');
    if (logoutBtn) {
      logoutBtn.addEventListener('click', function() {
        document.getElementById('loadingOverlay').style.display = 'flex';
        setTimeout(function() {
          window.location.href = '../services/logout.php';
        }, 2000);
      });
    }
  </script>

</body>

</html>