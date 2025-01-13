<?php

class Voituress
{
  public  $couleur= "rouge";
  public $marque= "audi";
  public const PRIX_TVA=20;

  public function showCouleur(){
    return $this->couleur;
  }
  public function gePrixTVA(){
    return "le taux de tva est fixé à: ". self::PRIX_TVA;
  }
  
}
  // utilisationdes constantes
  // méthode sans instanciation de la classe
  echo Voituress::PRIX_TVA."<br>";

  //avec instanciation de la classe (soit création d'un objet)
  $obj= new Voituress();
  echo $obj->showCouleur()."<br>";
  echo $obj->gePrixTVA();
  

  