<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=tp_netflixx_nom_prenom', 'root', 'root');
// Récupération des 5 derniers films ajoutés
$query = $pdo->query("SELECT id, title, urlphoto FROM film ORDER BY id DESC LIMIT 5");
$films = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Netflix</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: white;
        }

        /* Menu */
        header.header {
            background-color: #141414;
            padding: 20px 0;
            text-align: center;
        }

        header .header-image {
            max-width: 150px;
            height: auto;
        }

        /* Contenu principal */
        .main-content {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .main-content h2 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Liste de films */
        .film-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        /* Carte film */
        .film-item {
            background-color: #222;
            border-radius: 8px;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .film-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.7);
        }

        .film-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .film-item h3 {
            font-size: 1.5em;
            margin: 15px 0;
            text-transform: uppercase;
            color: white;
        }

        .film-item a {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 20px;
            background-color: #e50914;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .film-item a:hover {
            background-color: #f40612;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .film-list {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
    </style>
</head>
<body>
    <?php include('menu.php'); ?>
    <header class="header">
        <img src="./images/netflix.png" alt="Logo Netflix" class="header-image">
    </header>
    <main class="main-content">
        <h2>Les 5 derniers films ajoutés</h2>
        <div class="film-list">
            <?php foreach ($films as $film): ?>
                <div class="film-item">
                    <img src="<?= htmlspecialchars($film['urlphoto']) ?>" alt="<?= htmlspecialchars($film['title']) ?>">
                    <h3><?= strtoupper(htmlspecialchars($film['title'])) ?></h3>
                    <a href="detail.php?id=<?= $film['id'] ?>">Consulter ce film</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
