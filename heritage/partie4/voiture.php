<?php
require_once('vehicule.php');
class Voitures extends Vehiculer
{
  public  $couleur= "rouge";
  public $marque= "audi";
  public $type= [];

  public function __construct($marque, $puissance, $kilometrage)
  {
    parent::__construct($marque, $puissance, $kilometrage);
  }
  public function showCouleur(){
    return $this->couleur;
  }
  public function marque (){
    return $this->marque;
  }

  public function detail($berline, $SUV, $quatre, $break ){
    //return $this->type; 
    array_push ($this->type, $berline, $SUV, $quatre, $break);
  
  }

  public function lire_caracteristiques()
  {
    return "Marque: {$this->marque}, Puissance: {$this->puissance}, Kilometrage: {$this->kilometrage}, Couleur: {$this->couleur}, Type: {$this->type}";
  }

}

  $audi = new Voitures("audi", 150, 12000);
  echo "La couleur de la voiture par défaut est : " . $audi->showCouleur() . "<br>";

  $audi->couleur = "bleu";
  echo "La couleur de la voiture après modification : " . $audi->showCouleur() . "<br>";

  /* var_dump($audi); */

  // appler les métodes
  $audi->parcourir(100);
  echo $audi->lire_caracteristiques()."<br>";

  $mercedes= new Voitures("mercedes", 350, 10000);
  echo "La couleur de la voiture par défaut est : " . $mercedes->showCouleur() . "<br>";

  $mercedes->parcourir(100);
  echo $mercedes->lire_caracteristiques()."<br>";

  $mercedes-> lire_caracteristiques();
  echo $mercedes->lire_caracteristiques()."<br>";
  echo "$mercedes: " . implode(', ', $mercedes->lire_caracteristiques())."<br>";


  echo "Régime : " . implode(', ', $bestiole->lire_regime()) . "<br>";