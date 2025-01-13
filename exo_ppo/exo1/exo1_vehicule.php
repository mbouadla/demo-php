<?php
require "vehicule.php";
// permet de créer un objet de la class voiture
$vehicule1 = new voiture("RENAULT", 90, 15000); //$this->type = $parametreA
$vehicule2= new voiture("PEUGEOT", 110, 20000 ); //$this->type = $parametreB */

//var_dump permet de voir les propriétés de l'objet
/* var_dump($voitureA);
var_dump($voitureB); */

// permet d'afficher les propriétés de l'objet
echo $vehicule1->marque. " " . $vehicule1->puissance. " " . $vehicule1->kilometrage."<br>";
echo $vehicule2->marque. " " . $vehicule2->puissance. " " . $vehicule2->kilometrage."<br>";
echo $vehicule1->accelerer(). " " . $vehicule1->test()."<br>";
echo $vehicule1->deplacement()."<br>"; 
echo $vehicule2->deplacement();
