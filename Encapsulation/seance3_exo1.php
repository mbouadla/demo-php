<?php
//----------------------------------------------------
// fichier : partie2_exo1.php
// ---------------------------------------------------
// Notion d'encapsulation : protection des propriétés
// de l'objet.
//----------------------------------------------------
require 'personne.php';
// Nouvelle instance de class.Personne
$etudiant=new Personne('Martin','Paul',19);
echo $etudiant->sePresente().'<br>'; //Je m'appelle Paul Martin et j'ai 19
// Modification de l'attribut Nom
$etudiant->setNom('Durand');
echo $etudiant->sePresente().'<br>'; // Je m'appelle Paul Durand et j'ai 19