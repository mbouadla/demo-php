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
        $date_naissance = htmlspecialchars($_POST['date-naissance']); // Aligné avec le formulaire HTML
        $adresse = htmlspecialchars($_POST['adresse']);
        $telephone = htmlspecialchars($_POST['telephone']);

        // Validation minimale
        if (!empty($nom) && !empty($date_naissance) && !empty($adresse) && !empty($telephone)) {
            // Préparer la requête SQL
            $sql = "INSERT INTO entreprise (nom, date_de_naissance, adresse, telephone)
                    VALUES (:nom, :date_naissance, :adresse, :telephone)";
            $stmt = $conn->prepare($sql);

            // Lier les valeurs
            $stmt->bindValue(':nom', $nom);
            $stmt->bindValue(':date_naissance', $date_naissance);
            $stmt->bindValue(':adresse', $adresse);
            $stmt->bindValue(':telephone', $telephone);

            // Exécuter la requête
            $stmt->execute();

            // Message de succès et redirection
            echo "Données ajoutées avec succès !";
            header("Location: liste_client.php");
            exit();
        } else {
            echo "Tous les champs sont obligatoires.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
