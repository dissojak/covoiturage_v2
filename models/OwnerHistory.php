<?php

class OwnerHistory {
    private $idHistory;
    private $CinOwner;
    private $idLocation;
    private $dateCompleted;
    private $totalEarnings;

    public function __construct($idHistory = "", $CinOwner = "", $idLocation = "", $dateCompleted = "", $totalEarnings = "") {
        $this->idHistory = $idHistory;
        $this->CinOwner = $CinOwner;
        $this->idLocation = $idLocation;
        $this->dateCompleted = $dateCompleted;
        $this->totalEarnings = $totalEarnings;
    }

    public function getIdHistory() {
        return $this->idHistory;
    }

    public function setIdHistory($idHistory) {
        $this->idHistory = $idHistory;
    }

    public function getCinOwner() {
        return $this->CinOwner;
    }

    public function setCinOwner($CinOwner) {
        $this->CinOwner = $CinOwner;
    }

    public function getIdLocation() {
        return $this->idLocation;
    }

    public function setIdLocation($idLocation) {
        $this->idLocation = $idLocation;
    }

    public function getDateCompleted() {
        return $this->dateCompleted;
    }

    public function setDateCompleted($dateCompleted) {
        $this->dateCompleted = $dateCompleted;
    }

    public function getTotalEarnings() {
        return $this->totalEarnings;
    }

    public function setTotalEarnings($totalEarnings) {
        $this->totalEarnings = $totalEarnings;
    }
}
?>
