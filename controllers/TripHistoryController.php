<?php
include_once('../models/TripHistory.php');
include_once('../database/connexion.php');

class TripHistoryController extends Connexion
{
    // Insert new trip record
    public function insertTrip(TripHistory $trip)
    {
        $query = "INSERT INTO trip_history (CinClient, idLocation, dateOfTrip, price) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            $trip->getCinClient(),
            $trip->getIdLocation(),
            $trip->getDateOfTrip(),
            $trip->getPrice()
        ]);
    }

    // Get all trips for a client
    public function getClientTrips($cinClient)
    {
        $sql = "SELECT th.*, l.datedepare 
        FROM trip_history th
        JOIN location l ON th.idLocation = l.idlocation
        WHERE th.CinClient = ?
        ORDER BY l.datedepare DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cinClient]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get total spent by client
    public function getTotalSpent($cinClient)
    {
        $query = "SELECT SUM(price) as total FROM trip_history WHERE CinClient = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$cinClient]);
        return $stmt->fetchColumn() ?: 0;
    }
}
