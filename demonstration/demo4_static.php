<?php

class Voitures
{
  public static $couleur= "rouge";
  public $marque= "audi";

  public static function showCouleur(){
    return self::$couleur;
  }
  
  }
  echo "la couleur de la voiture par défaut est : ". Voitures::showCouleur()."<br>";
  $audi = new Voitures();
  $audi->marque="audi";
  var_dump($audi);

  Voitures::$couleur="bleu";
  echo"La couleur de la voiture par défaut;" . Voitures::showCouleur() . "<br>";