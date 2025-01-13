<?php
require "chiens.php";
// permet de créer un objet de la class voiture
$chien1 = new Chien("Labrador", 4, 25); //$this->type = $parametreA
$chien2= new Chien("Berger Allemand", 6, 20 ); //$this->type = $parametreB */

//var_dump permet de voir les propriétés de l'objet
/* var_dump($chien1);
var_dump($chien2); */

// permet d'afficher les propriétés de l'objet
echo $chien1->Race. " " . $chien1->Age. " " . $chien1->Poids."<br>";
echo $chien2->Race. " " . $chien2->Age. " " . $chien2->Poids."<br>";
echo $chien1->test()."<br>";
echo $chien1->accelerer(). " " . $chien1->test2()."<br>";
echo $chien2->accelerer(). " " . $chien1->test2()."<br>";


