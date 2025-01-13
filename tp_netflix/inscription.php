<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #141414;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #e50914;
        }

        form {
            background-color: #222;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
            width: 300px;
        }

        form label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            font-size: 14px;
            margin-bottom: 20px;
        }

        form input::placeholder {
            color: #777;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #e50914;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #f40612;
        }
    </style>
</head>
<body>
    <h1>Inscription</h1>
    <form action="traitement_inscription.php" method="POST">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" placeholder="Entrez votre login" required>
        
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
        
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
