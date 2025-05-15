<?php
include_once('../models/OwnerHistory.php');
include_once('../database/connexion.php');

class OwnerHistoryController extends Connexion
{
    public function __construct()
    {
        parent::__construct();
    }

    // Add a new owner history record
    public function insertOwnerHistory($cinOwner, $idLocation, $totalEarnings)
    {
        $query = "INSERT INTO owner_history (CinOwner, idLocation, totalEarnings) 
                  VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$cinOwner, $idLocation, $totalEarnings]);
    }

    // Get all history records for an owner
    public function getHistoryByOwner($cinOwner)
    {
        $query = "SELECT oh.*, l.villedepare, l.villefin, l.datedepare 
                  FROM owner_history oh
                  JOIN location l ON oh.idLocation = l.idlocation
                  WHERE CinOwner = ? 
                  ORDER BY l.datedepare DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$cinOwner]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Calculate total earnings for an owner
    public function getTotalEarnings($cinOwner)
    {
        $query = "SELECT SUM(totalEarnings) as total FROM owner_history 
                 WHERE CinOwner = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$cinOwner]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
}
?>