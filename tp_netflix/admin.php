<?php
// Démarrer la session
ob_start();
session_start();

try {
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=tp_netflixx_nom_prenom', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $titre = isset($_POST['Titre']) ? htmlspecialchars($_POST['Titre']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $urlvideo = isset($_POST['urlvideo']) ? htmlspecialchars($_POST['urlvideo']) : '';
    $imagePath = '';

    // Vérification et gestion de l'upload d'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $uploadDir = 'uploads/';
        $imagePath = $uploadDir . $imageName;

        // Créer le dossier d'upload si nécessaire
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Déplacer le fichier uploadé
        if (!move_uploaded_file($imageTmpPath, $imagePath)) {
            die("Erreur lors du téléchargement de l'image.");
        }
    } else {
        echo "<p style='color:red;'>Veuillez sélectionner une image valide.</p>";
    }

    // Insertion des données dans la base
    if ($titre && $description && $imagePath) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO film (title, description, urlphoto, urlvideo)
                VALUES (:title, :description, :urlphoto, :urlvideo)
            ");
            $stmt->execute([
                ':title' => $titre,
                ':description' => $description,
                ':urlphoto' => $imagePath,
                ':urlvideo' => $urlvideo,
            ]);
            echo "<p style='color:green;'>Film ajouté avec succès !</p>";
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Erreur lors de l'ajout du film : " . $e->getMessage() . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Ajouter un Film</title>
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
    }

    form {
      background-color: #222;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
      width: 400px;
    }

    form div {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="textarea"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #333;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      font-size: 14px;
    }

    input::placeholder {
      color: #777;
    }

    input[type="file"] {
      padding: 5px;
    }

    button {
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

    button:hover {
      background-color: #f40612;
    }
  </style>
</head>
<body>
  <form action="films.php" method="POST" enctype="multipart/form-data">
    <div>
      <label for="Titre">Titre :</label>
      <input type="text" id="Titre" name="Titre" placeholder="Entrez le titre du film" required>
    </div>
    <div>
      <label for="description">Description :</label>
      <input type="textarea" id="description" name="description" placeholder="Entrez la description du film" required>
    </div>
    <div>
      <label for="image">Image :</label>
      <input type="file" id="image" name="image" required>
    </div>
    <div>
      <label for="urlvideo">URL de la vidéo :</label>
      <input type="text" id="urlvideo" name="urlvideo" placeholder="Entrez l'URL de la vidéo">
    </div>
    <button type="submit">Ajouter</button>
  </form>
</body>
</html>
