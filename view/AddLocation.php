<?php
require_once('../services/AutoTripRegistrar.php');
$autoRegistrar = new AutoTripRegistrar();
$autoRegistrar->registerFinishedTrips();

require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
require_once('../controllers/VoitureController.php');
require_once('../models/Voiture.php');

session_start();
$username = $_SESSION['username'];
$AC = new AccountController();
$VC = new VoitureController();

$cin = $AC->getCinbyUsername($username);
$mat = $VC->getMatbyCin($cin);
$_SESSION['cin'] = $cin;
$_SESSION['mat'] = $mat;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nouvelle Location</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f7fa] min-h-screen flex items-center justify-center p-4 font-sans">
  <div class="grid md:grid-cols-2 w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden transition-transform duration-300 transform hover:scale-105">

    <!-- Form Section -->
    <div class="p-8 md:p-10 flex flex-col justify-center">
      <h1 class="text-3xl font-bold text-gray-900 mb-6">Nouvelle Location</h1>
      <form action="AddLocationAction.php" method="post" class="space-y-5">

        <div>
          <label for="nbplace" class="text-sm text-gray-600 font-medium mb-1 block">Nombre de places</label>
          <div class="relative">
            <input type="number" name="nbplace" id="nbplace" required
              placeholder="Ex: 4"
              class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" />
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🧍</span>
          </div>
        </div>

        <div>
          <label for="prix" class="text-sm text-gray-600 font-medium mb-1 block">Prix</label>
          <div class="relative">
            <input type="number" name="prix" id="prix" required
              placeholder="Ex: 150 DH"
              class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" />
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">💰</span>
          </div>
        </div>

        <div>
          <label for="datedepare" class="text-sm text-gray-600 font-medium mb-1 block">Date de départ</label>
          <div class="relative">
            <input type="datetime-local" name="datedepare" id="datedepare" required
              class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" />
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">📅</span>
          </div>
        </div>

        <div>
          <label for="villedepare" class="text-sm text-gray-600 font-medium mb-1 block">Ville de départ</label>
          <div class="relative">
            <input type="text" name="villedepare" id="villedepare" required
              placeholder="Ex: Casablanca"
              class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" />
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🚩</span>
          </div>
        </div>

        <div>
          <label for="villefin" class="text-sm text-gray-600 font-medium mb-1 block">Ville de destination</label>
          <div class="relative">
            <input type="text" name="villefin" id="villefin" required
              placeholder="Ex: Marrakech"
              class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm" />
            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">📍</span>
          </div>
        </div>

        <button type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg text-sm">
          🚗 Soumettre
        </button>
      </form>

      <div class="mt-5 text-center">
        <a href="CarEmpty.php" class="text-sm text-blue-600 font-medium hover:underline">→ Voir les voitures disponibles</a>
      </div>
    </div>

    <!-- Image Section -->
    <div class="hidden md:block bg-blue-50 relative">
      <img src="https://plus.unsplash.com/premium_photo-1687575292568-02ec1e942c14?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
           alt="car travel" class="object-cover w-full h-full"/>
      <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-white/10"></div>
    </div>

  </div>
</body>
</html>
