<?php

$servername = "localhost";
$username = "root";
$password = "root";
$basededonnee = "dw2_bdd";

// Connexion à la base de donnée
$conn = new mysqli($servername, $username, $password, $basededonnee);

if ($conn->connect_error) {
    echo $conn->connect_error;
} else {
    echo "connexion réussie <br>";
}

// On récupère la colonne id, nom et prenom de la table utilisateur dans la base de donnée
$sql1 = "SELECT * FROM superhero";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // On affiche les données sur la page un par un
        echo $row["id"] . " " . $row["nom"] . " " . $row["ville"] . "<br>";
    }
} else {
    echo " 0 résultat. Base de donnée vide";
}

// On ajoute une nouvelle colonne dans la base de donnée
/* 
    Note: On peut très bien mettre des variables à la place de données brut dans VALUES()
    Cela nous permettra, par exemple, d'envoyer en base de données des informations récupérées 
    depuis un formulaire avec $_POST[""] ou $_GET[""].
*/

 $sql2 = "INSERT INTO superhero (nom, ville) VALUES ('Batman', 'Gotham')";

if ($conn->query($sql2) === TRUE) {
    echo "Nouveau héro ajouté avec succès";
} else {
    echo "Erreur";
} 