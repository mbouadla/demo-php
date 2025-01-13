<?php

include('animal.php');

class bestiole extends Animal {
    public $regime = []; // Initialiser comme tableau vide

    public function mange($aliment) {
        $this->regime[] = $aliment; // Ajouter l'aliment au régime
        //array_push($this->aliment, $aliment);
    }

    public function lire_regime() {
        return $this->regime; // Retourne le tableau des aliments consommés
    }

    public function lire_informations() {
        $regime_animal = implode(', ', $this->lire_regime());
        return "Âge : {$this->age}, Régime : {$regime_animal}, Nom : {$this->nom}, État : {$this->etat}, Âge max : {$this->age_theorique_max} <br>";
    }

    public function vieillir($annees) {
        $this->age += $annees; // Augmenter l'âge
        if ($this->age >= $this->age_theorique_max) {
            $this->etat = 'mort'; // Mettre à jour l'état si l'âge dépasse l'âge théorique max
        }
    }
}

// Créer une instance de la classe bestiole
$bestiole = new bestiole('Une drôle de bête', 1, 10, 'vivant');

echo $bestiole->nom . " de " . $bestiole->age . " ans et dont son état est " . $bestiole->etat . " avec un âge max de " . $bestiole->age_theorique_max . " ans <br>";

// Appeler les méthodes
$bestiole->mange('fruits');
$bestiole->mange('légumes');

echo "Régime : " . implode(', ', $bestiole->lire_regime()) . "<br>";
echo $bestiole->lire_informations();

$bestiole->vieillir(4);
echo $bestiole->lire_informations();

$bestiole->vieillir(6);
echo $bestiole->lire_informations();
