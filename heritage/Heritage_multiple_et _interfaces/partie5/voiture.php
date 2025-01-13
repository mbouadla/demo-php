<?php

abstract class VehiculeAMoteur {
    protected $typemoteur;
    protected $nombrepassagers;
    protected static $nbvehicules = 0; // Static, pour tous les véhicules

    public function __construct($typemoteur, $nombrepassagers) {
        $this->typemoteur = $typemoteur;
        $this->nombrepassagers = $nombrepassagers;
        self::$nbvehicules++; // Incrémente le nombre de véhicules
    }

    public function verificationPassagers() {
        if ($this->nombrepassagers > 4) {
            echo "Attention, il y a plus de 4 passagers !\n";
        }
    }

    public static function getNbVehicules() {
        return self::$nbvehicules;
    }
}

class Voiture extends VehiculeAMoteur {
    private $marque;
    private $puissance;

    public function __construct($typemoteur, $nombrepassagers, $marque, $puissance) {
        parent::__construct($typemoteur, $nombrepassagers);
        $this->marque = $marque;
        $this->puissance = $puissance;
    }

    public function lire_caracteristiques() {
        echo "Marque: {$this->marque}, Puissance: {$this->puissance} chevaux, Type de moteur: {$this->typemoteur}, Nombre de passagers: {$this->nombrepassagers}\n";
    }
}

class Camion extends VehiculeAMoteur {
    private $tonnage;
    private $nbessieux;

    public function __construct($typemoteur, $nombrepassagers, $tonnage, $nbessieux) {
        parent::__construct($typemoteur, $nombrepassagers);
        $this->tonnage = $tonnage;
        $this->nbessieux = $nbessieux;
    }

    public function lire_caracteristiques() {
        echo "Tonnage: {$this->tonnage} tonnes, Nombre d'essieux: {$this->nbessieux}, Type de moteur: {$this->typemoteur}, Nombre de passagers: {$this->nombrepassagers}\n";
    }
}

class VoitureDeSport extends Voiture {
    private $zerocent;

    public function __construct($typemoteur, $nombrepassagers, $marque, $puissance, $zerocent) {
        parent::__construct($typemoteur, $nombrepassagers, $marque, $puissance);
        $this->zerocent = $zerocent;
    }

    public function lire_caracteristiques() {
        parent::lire_caracteristiques(); // Appelle la méthode de la classe parent
        echo "Accelération 0-100: {$this->zerocent} secondes\n";
    }
}

class VoitureTourisme extends Voiture {
    private $consommation;
    private $kilometrage;

    public function __construct($typemoteur, $nombrepassagers, $marque, $puissance, $consommation, $kilometrage = 0) {
        parent::__construct($typemoteur, $nombrepassagers, $marque, $puissance);
        $this->consommation = $consommation;
        $this->kilometrage = $kilometrage;
    }

    public function lire_caracteristiques() {
        parent::lire_caracteristiques(); // Appelle la méthode de la classe parent
        echo "Consommation: {$this->consommation} L/100 km, Kilométrage: {$this->kilometrage} km\n";
    }

    public function utiliser($distance) {
        $this->kilometrage += $distance;
    }
}

// Exemple d'utilisation
$voiture = new Voiture("E", 4, "Tesla", 500);
$voiture->lire_caracteristiques()."<br>";

$camion = new Camion("T", 2, 18.5, 6);
$camion->lire_caracteristiques()."<br>";

$voitureDeSport = new VoitureDeSport("T", 2, "Ferrari", 650, 3.5);
$voitureDeSport->lire_caracteristiques()."<br>";

$voitureTourisme = new VoitureTourisme("T", 5, "Renault", 120, 6.5);
$voitureTourisme->utiliser(150);
$voitureTourisme->lire_caracteristiques()."<br>";

echo "Nombre total de véhicules: " . VehiculeAMoteur::getNbVehicules()."<br>";
