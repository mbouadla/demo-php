<?php
ob_start();
// Démarrer la session
session_start();
// Vérification de la connexion
$isConnected = isset($_SESSION['user']);
?>
<nav class="navbar">
<img src="https://i.ibb.co/XW2vnBh/Netflix-logo.png" alt="logo" height="40">
    <ul>
        <li><a href="acceuil.php">Accueil</a></li>
        <li><a href="films.php">Consulter tous les Films</a> </li>
        <?php if ($isConnected): ?>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <?php else: ?>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="deconnexion.php">Deconnexion</a></li>
        <?php endif; ?>
    </ul>
</nav>
<style>
.navbar {
    background-color: #343a40;
    padding: 10px 20px;
}
.navbar ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    margin: 0;
    padding: 0;
}
.navbar a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}
.navbar a:hover {
    text-decoration: underline;
}
</style