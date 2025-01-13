<?php
// Déconnexion de la session
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion - Netflix</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            background-color: #222;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #e50914;
        }

        p {
            font-size: 1.2em;
            margin: 20px 0;
        }

        .back-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e50914;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #f40612;
        }

        footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            background-color: #141414;
            color: white;
        }

        footer p {
            font-size: 0.9em;
        }

        /* Responsive */
        @media (max-width: 768px) {
            h1 {
                font-size: 2em;
            }

            p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Déconnexion réussie</h1>
        <p>Vous avez été déconnecté avec succès.</p>
        <a href="connexion.php" class="back-link">Retour à la connexion</a>
    </div>
    <footer>
        &copy; <?= date('Y') ?> © 2025 Netflix Clone - Tous droits réservés
    </footer>
</body>
</html>

