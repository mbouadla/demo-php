<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';

// On tente d'établir la connexion
try {
    $conn = new PDO("mysql:host=$servername;dbname=jeux_video", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie <br>';

    /* On capture les exceptions (erreurs) si une exception est lancée
    et on affiche les informations relatives à celle ci */
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$query = $conn->prepare('SELECT * FROM superhero');
$query->execute();
$results = $query->fetchAll( PDO::FETCH_ASSOC); // Renvoie toutes les lignes de résultat

foreach ($results as $row) {
    echo $row['id'] . " - ";
    echo $row['nom'] . " ";
    echo $row['possesseur'] . " ";
    echo $row['console'] . " ";
    echo $row['prix'] . " ";
    echo $row['nbre_joueurs_max'] . " ";
    echo $row['commentaires'] . "<br>";
}

