<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=tp_netflixx_nom_prenom', 'root', 'root');

// Vérification et récupération de l'ID du film
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Film introuvable.");
}
$id = (int)$_GET['id'];

// Récupération des détails du film
$query = $pdo->prepare("SELECT * FROM film WHERE id = :id");
$query->execute(['id' => $id]);
$film = $query->fetch(PDO::FETCH_ASSOC);
if (!$film) {
    die("Film introuvable.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($film['title']) ?> - Netflix</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: white;
        }

        header {
            background-color: #141414;
            padding: 20px;
            text-align: center;
        }

        header img {
            max-width: 150px;
            height: auto;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #222;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        }

        .content h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
        }

        .content p {
            font-size: 1.2em;
            margin: 15px 0;
            line-height: 1.6;
        }

        .content img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 8px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .content h3 {
            margin: 20px 0 10px;
            font-size: 1.8em;
            color: #e50914;
        }

        .content .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #e50914;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .content .back-link:hover {
            background-color: #f40612;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #141414;
            color: white;
            margin-top: 20px;
            border-top: 1px solid #333;
        }

        footer p {
            font-size: 0.9em;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .content h1 {
                font-size: 2em;
            }

            .content img {
                max-height: 300px;
            }

            .content p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <header>
        <?php include('menu.php'); ?>
    </header>
    <div class="container">
        <div class="content">
            <h1><?= htmlspecialchars($film['title']) ?></h1>
            <p><strong>Description :</strong> <?= htmlspecialchars($film['description']) ?></p>
            <img src="<?= htmlspecialchars($film['urlphoto']) ?>" alt="Image du film">
            <h3>Bande-annonce :</h3>
            <div><?= $film['urlvideo'] ?></div>
            <a href="films.php" class="back-link">Retour à la liste des films</a>
        </div>
    </div>
    <footer>
        &copy; <?= date('Y') ?> Netflix by wish - Tous droits réservés.
    </footer>
</body>
</html>
