<?php

class TripHistory {
    private $idHistory;
    private $CinClient;
    private $idLocation;
    private $dateOfTrip;
    private $price;

    public function __construct($idHistory = "", $CinClient = "", $idLocation = "", $dateOfTrip = "", $price = "") {
        $this->idHistory = $idHistory;
        $this->CinClient = $CinClient;
        $this->idLocation = $idLocation;
        $this->dateOfTrip = $dateOfTrip;
        $this->price = $price;
    }

    public function getIdHistory() {
        return $this->idHistory;
    }

    public function setIdHistory($idHistory) {
        $this->idHistory = $idHistory;
    }

    public function getCinClient() {
        return $this->CinClient;
    }

    public function setCinClient($CinClient) {
        $this->CinClient = $CinClient;
    }

    public function getIdLocation() {
        return $this->idLocation;
    }

    public function setIdLocation($idLocation) {
        $this->idLocation = $idLocation;
    }

    public function getdateOfTrip() {
        return $this->dateOfTrip;
    }

    public function setdateOfTrip($dateOfTrip) {
        $this->dateOfTrip = $dateOfTrip;
    }

    public function getprice() {
        return $this->price;
    }

    public function setprice($price) {
        $this->price = $price;
    }
}
?>
