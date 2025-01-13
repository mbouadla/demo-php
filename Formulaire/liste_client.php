<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Formulaire";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si les données sont envoyées via le formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $date_naissance = htmlspecialchars($_POST['date_de_naissance']) ;
        $adresse = htmlspecialchars($_POST['adresse']);
        $telephone = htmlspecialchars($_POST['telephone']);

        // Préparer la requête SQL
        $sql = "INSERT INTO entreprise (nom, date_de_naissance, adresse, telephone)
                VALUES (:nom, :date_de_naissance, :adresse, :telephone)";
        $stmt = $conn->prepare($sql);

        // Lier les valeurs
        $stmt->bindValue(param:':nom',value: $nom);
        $stmt->bindValue(param:':date_de_naissance', value: $date_naissance);
        $stmt->bindValue(param:':adresse', value: $adresse);
        $stmt->bindValue(param:':telephone', value: $telephone);

        // Exécuter la requête
        $stmt->execute();

        echo "Données ajoutées avec succès !";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$conn = null;
$_SESSION['nom'] = $nom;
$_SESSION['date_de_naissance'] = $date_naissance;
$_SESSION['adresse'] = $adresse;
$_SESSION['telephone'] = $telephone;  

header("Location: page_incription.php");  
exit();
