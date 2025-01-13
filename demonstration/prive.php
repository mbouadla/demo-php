<?php
class Fruit{
  // private veut dire que les données sont accéssibles uniquement dans la classe
  private $origin;
  private $nom;

  // méthode Getter qui a pour rôle d'afficher une propriété private
  public function getNOM(){
    return $this->nom;
    }
  
   // methode Setter qui a pour rôle de modifier une propriété private
    public function setNOM($nouvelleDonnee){
     return $this->nom = $nouvelleDonnee;
    }
}

  $banane = new Fruit();
  $banane->setNOM("Banane plantin");
  echo $banane->getNOM();