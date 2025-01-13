<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'tp_netflixx_nom_prenom';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Récupération des données du formulaire
$login = htmlspecialchars($_POST['login']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash du mot de passe

// Vérification si le login existe déjà dans la table `user`
$stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE login = ?");
$stmt->execute([$login]);
if ($stmt->fetchColumn() > 0) {
    die("Ce login est déjà utilisé. Veuillez en choisir un autre.");
}

// Insertion des données dans la base de données
$stmt = $pdo->prepare("INSERT INTO user (login, password) VALUES (?, ?)");
if ($stmt->execute([$login, $password])) {
    // Redirection vers la page de connexion
    header("Location: connexion.php");
    exit();
} else {
    die("Une erreur s'est produite lors de l'inscription.");
}

