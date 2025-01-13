<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';

// On tente d'établir la connexion
try {
    $conn = new PDO("mysql:host=$servername;dbname=dw2_bdd", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie <br>';

    /* On capture les exceptions (erreurs) si une exception est lancée
    et on affiche les informations relatives à celle ci */
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


// _________ RECUPERER TOUTES LES DONNEES _________

// Sans requête préparée
//$requete = $conn->query('SELECT * FROM superheros');

// Avec une requête préparée
$query = $conn->prepare('SELECT * FROM superhero');
$query->execute();
$results = $query->fetchAll(); // Renvoie toutes les lignes de résultat

foreach ($results as $row) {
    echo $row['id'] . " - ";
    echo $row['nom'] . " ";
    echo $row['ville'] . "<br>";
}


// _________ RECUPERER UNE DONNEE avec une requête préparée _________
$query = $conn->prepare('SELECT * FROM superhero WHERE id = :param');

/* Remarque : La méthode bindParam() est similaire à la méthode bindValue(), sauf qu'au lieu de lui transmettre une
valeur pour un paramètre, on lie le paramètre avec un nom de variable, variable qui sera dé
nie plus tard. */
$param = 1;
$query->bindParam(':param', $param, PDO::PARAM_INT);

$query->execute();
$result = $query->fetch(); // Renvoie une seule ligne de résultat

echo $result['id'] . " - ";
echo $result['nom'] . " ";
echo $result['ville'] . "<br>";


// _________ AJOUTER UNE DONNEE avec une commande préparée _________
$query = $conn->prepare("INSERT INTO superhero SET nom = :value1, ville = :value2");
$query->bindValue(':value1', 'Bob l\'éponge', PDO::PARAM_STR);
$query->bindValue(':value2', 'Bikini Bottom', PDO::PARAM_STR);
$query->execute();

echo "Superhero ajouté <br>";


// _________ MODIFIER UNE DONNEE avec une commande préparée _________
$query = $conn->prepare('UPDATE superhero SET nom = :value WHERE id =:id');
$query->bindValue(':value', 'Nouveau nom', PDO::PARAM_STR);
$query->bindValue(':id', 1, PDO::PARAM_INT);
$query->execute();

echo "Superhero modifié <br>";


// _________ SUPPRIMER UNE DONNEE avec une commande préparée _________
$query = $conn->prepare('DELETE FROM superhero WHERE id = :id');
$query->bindValue(':id', 11, PDO::PARAM_INT);
$query->execute();

echo "Superhero supprimé <br>";


// On ferme la connexion
$conn = null;