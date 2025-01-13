<?php
// class à définir
class voiture {
  public $type;
  public $modele;
  public $prix;
  public $couleur;
 //function constuctor permet de construire un objet
  function __construct($paraA, $paraB,  $paraC,  $paraD) {
    $this->type = $paraA; // Audi
    $this->modele = $paraB; //2019
    $this->prix = $paraC; //9950
    $this->couleur = $paraD; // rouge
  }

  //fonction permet de définir des comportements, c'est une methode
  function accelerer() {return "accelerer"; }
  function ralentir() {}
  function tourner() {}
  function freiner() {}
  function test () { return $this->type;}
  function test2 () {  $this->prix -= 2000;
  return $this->prix; } 
}

// permet de créer un objet de la class voiture
$voitureA = new voiture("Audi", "2019", "9950", "rouge"); //$this->type = $parametreA
$voitureB= new voiture( "Peugeot", "2019", "9950", "jaune"); //$this->type = $parametreB */

//var_dump permet de voir les propriétés de l'objet
/* var_dump($voitureA);
var_dump($voitureB); */

// permet d'afficher les propriétés de l'objet
echo $voitureA->type."<br>";
echo $voitureA->accelerer(). " " . $voitureA->test2()."<br>";
echo $voitureB->couleur . " " . $voitureB->prix; 