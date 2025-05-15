<?php
include_once('../database/connexion.php');
include_once('../models/TripHistory.php');
include_once('../models/OwnerHistory.php');

class AutoTripRegistrar extends Connexion
{
    public function registerFinishedTrips()
    {
        $sql = "SELECT l.idlocation, l.datedepare, l.prix, v.cin AS CinOwner, u.cin AS CinClient
                FROM location l
                JOIN voiture v ON l.mat = v.mat
                JOIN user u ON l.mat = u.placeRes
                WHERE l.datedepare < NOW()";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $row) {
            $idLocation = $row['idlocation'];
            $datedepare = $row['datedepare'];
            $prix = $row['prix'];
            $cinOwner = $row['CinOwner'];
            $cinClient = $row['CinClient'];

            // Check if trip already exists for this client
            $stmtCheckClient = $this->pdo->prepare("SELECT COUNT(*) FROM trip_history WHERE CinClient = ? AND idLocation = ?");
            $stmtCheckClient->execute([$cinClient, $idLocation]);
            if ($stmtCheckClient->fetchColumn() == 0) {
                $stmtInsertClient = $this->pdo->prepare("INSERT INTO trip_history (CinClient, idLocation, dateOfTrip, totalPrice) VALUES (?, ?, ?, ?)");
                $stmtInsertClient->execute([$cinClient, $idLocation, $datedepare, $prix]);
            }

            // Check if owner history already exists for this location
            $stmtCheckOwner = $this->pdo->prepare("SELECT COUNT(*) FROM owner_history WHERE CinOwner = ? AND idLocation = ?");
            $stmtCheckOwner->execute([$cinOwner, $idLocation]);
            if ($stmtCheckOwner->fetchColumn() == 0) {
                $stmtInsertOwner = $this->pdo->prepare("INSERT INTO owner_history (CinOwner, idLocation, totalEarnings) VALUES (?, ?, ?)");
                $stmtInsertOwner->execute([$cinOwner, $idLocation, $prix]);
            }
        }
    }
}

$registrar = new AutoTripRegistrar();
$registrar->registerFinishedTrips();
?>
