<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <h1>Accès à la page protégée</h1>
    <form action="liste_client.php" method="POST">
      <div>
        <label for="nom">nom :</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required>
      </div>
      <div>
        <label for="date-naissance">date de naissance :</label>
        <input type="date" id="date-naissance" name="date-naissance" placeholder="Entrez votre date de naissance" required>
      </div>
      <div>
        <label for="adresse">adresse :</label>
        <input type="text" id="adresse" name="adresse" placeholder="Entrez votre adresse" required>
      </div>
      <div>
        <label for="telephone">telephone :</label>
        <input type="tel" id="telephone" name="telephone" placeholder="Entrez votre telephone" required>
      </div>
        <button type="submit">S'inscire</button>
    </form>
</body>
</html>
