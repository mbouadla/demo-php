<?php
// class à définir
class Chien {
  public $Race;
  public $Age;
  public $Poids;
  
 //function constuctor permet de construire un objet
  function __construct($paraA, $paraB,  $paraC) {
    $this->Race = $paraA; 
    $this->Age = $paraB; 
    $this->Poids = $paraC; 
  }

  //fonction permet de définir des comportements, c'est une methode
  function accelerer() {return "accelerer"; }
  function ralentir() {}
  function tourner() {}
  function freiner() {}
  function test() {
    $this->Age -= 1;
  return $this->Age;
  }
  function test2 () {  
    $this->Poids += 1.5;
    $this->Poids -= 2;
  return $this->Poids; } 

}