<?php

class Vehiculer {
  public $marque;
  public $puissance;
  public $kilometrage;

  public function __construct($marque, $puissance, $kilometrage)
  {
    $this->marque = $marque;
    $this->puissance = $puissance;
    $this->kilometrage = $kilometrage;
  }

  public function parcourir($distance){
    $this->kilometrage += $distance;
  }

  public function lire_caracteristiques() {
    return "Marque: {$this->marque}, Puissance: {$this->puissance}, Kilometrage: {$this->kilometrage}";
  }
}