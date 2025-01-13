<?php
// class à définir
class voiture {
  public $marque;
  public $puissance;
  public $kilometrage;
  
 //function constuctor permet de construire un objet
  function __construct($paraA, $paraB,  $paraC) {
    $this->marque = $paraA; 
    $this->puissance = $paraB; 
    $this->kilometrage = $paraC; 
  }

  //fonction permet de définir des comportements, c'est une methode
  function accelerer() {return "accelerer"; }
  function ralentir() {}
  function tourner() {}
  function freiner() {}
  function test () {  $this->puissance += 20;
  return $this->puissance; } 
  function deplacement() {
    $this->kilometrage += 3500;
    $this->kilometrage += 1500;
    return $this->marque. " " . $this->kilometrage;
  }
}

