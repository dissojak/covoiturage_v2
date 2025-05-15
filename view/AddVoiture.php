<?php
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');

session_start();

if (isset($_SESSION['cin'])) {
  $cin = $_SESSION['cin'];
} else {
  $AC = new AccountController();
  $username = $_SESSION['username'];
  $cin = $AC->getCinbyUsername($username);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Car</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <style>
    body {
      background: linear-gradient(135deg, #7f5cff, #d16ba5);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }

    .form-container {
      background: #fff;
      padding: 2rem 2.5rem;
      border-radius: 1rem;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    .form-title {
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .btn-primary {
      background-color: #7f5cff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #6b4dd4;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <div class="form-title">Add Your Car</div>

    <form action="OwnerVoitureAction.php" method="POST">
      <div class="form-group">
        <label for="mat">Matricule</label>
        <input type="text" class="form-control" id="mat" name="mat" placeholder="e.g. 20010001" required />
      </div>

      <div class="form-group">
        <label for="model">Car Model</label>
        <input type="text" class="form-control" id="model" name="model" placeholder="e.g. Toyota Yaris" required />
      </div>

      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
  </div>

</body>
</html>
