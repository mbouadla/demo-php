<?php
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=tp_netflixx_nom_prenom', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupération des films
$query = $pdo->query("SELECT id, title, urlphoto FROM film");
$films = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter tous les films</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: #fff;
        }
        header {
            background-color: #e50914;
            color: white;
            padding: 15px 20px;
            text-align: left;
            font-size: 1.2em;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        header a {
            text-decoration: none;
            color: #fff;
            margin-right: 20px;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        header a:hover {
            background-color: #f40612;
        }
        .title {
            text-align: center;
            margin: 100px 0 20px;
            font-size: 2em;
            font-weight: bold;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .film-card {
            background-color: #222;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .film-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.5);
        }
        .film-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .film-card h2 {
            font-size: 1.2em;
            margin: 15px;
            color: #fff;
        }
        .film-card a {
            display: block;
            text-align: center;
            margin: 10px 15px 15px;
            padding: 10px;
            background-color: #e50914;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .film-card a:hover {
            background-color: #f40612;
        }
        footer {
            text-align: center;
            padding: 15px 0;
            background-color: #222;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <a href="acceuil.php">Accueil</a>
        <a href="admin.php">Ajouter un Film</a>
    </header>
    <div class="title">Liste des Films</div>
    <div class="container">
        <?php if (count($films) > 0): ?>
            <?php foreach ($films as $film): ?>
                <div class="film-card">
                    <img src="<?= htmlspecialchars($film['urlphoto']) ?>" alt="Image du film">
                    <h2><?= htmlspecialchars($film['title']) ?></h2>
                    <a href="detail.php?id=<?= $film['id'] ?>">Consulter ce film</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; font-size: 1.5em; margin: 20px 0;">Aucun film disponible pour le moment.</p>
        <?php endif; ?>
    </div>
    <footer>
        © 2025 Netflix Clone - Tous droits réservés
    </footer>
</body>
</html>
