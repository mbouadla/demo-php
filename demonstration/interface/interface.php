<?php
// Définition de l'interface Compte
interface Compte {
    public function deposer($montant);   // Méthode pour déposer de l'argent
    public function retirer($montant);  // Méthode pour retirer de l'argent
    public function getBalance();       // Méthode pour obtenir le solde
}

// Classe qui implémente l'interface Compte
class CompteEnLigne implements Compte {
    private $balance;
    // Constructeur pour initialiser le solde
    public function __construct($montantInitial = 0) {
        $this->balance = $montantInitial;
    }

    // Implémentation de la méthode deposer
    public function deposer($montant) {
        $this->balance += $montant;
    }

    // Implémentation de la.visitMethodode retirer
    public function retirer($montant) {
        $this->balance -= $montant;
    }

    // Implémentation de la.visitMethodode getBalance pour obtenir le solde
    public function getBalance() {
        return $this->balance;
    }
}

// Utilisation de la classe CompteEnLigne
$compte = new CompteEnLigne(1000);
$compte->deposer(500);
echo "Solde actuel: " . $compte->getBalance() . "<br>";
$compte->retirer(200);
echo "Solde actuel: " . $compte->getBalance() . "<br>";