<?php
class Animal{
  public $nom;
  public $age;
  public $age_theorique_max;
  public $tableau_aliments;
  public $etat;

  public function __construct($nom, $age, $age_max){
    $this->nom = $nom;
    $this->age = $age;
    $this->age_theorique_max = $age_max;
    $this->etat = 'vivant';
  } 
}


