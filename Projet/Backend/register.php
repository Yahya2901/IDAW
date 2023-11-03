<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté, rediriger s'il est connecté
if (isset($_SESSION['user_id'])) {
    header('Location: accueil.php');
    exit();
}

// Connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire d'inscription
    $login = $_POST['login'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $activity_level = $_POST['activity_level'];
    $password = $_POST['password'];

    // Insérez les données de l'utilisateur dans la base de données
    // Assurez-vous d'ajouter une validation et une sécurité appropriées ici

    // Après l'inscription, stockez les informations de l'utilisateur dans la session
    $_SESSION['user_id'] = $user_id; // Assurez-vous d'obtenir l'ID de l'utilisateur après l'insertion

    header('Location: Accueil.php');
    exit();
}
?>

<!-- Ajout du paragraphe "Inscrivez-vous" -->
<h2 style="text-align: center;">Inscrivez-vous</h2>

<!-- Formulaire d'inscription avec les cases centrées -->
<form method="POST" action="register.php" style="text-align: center;">
    <input type="text" name="login" placeholder="Login" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br> <!-- Champ de mot de passe -->
    <input type="number" name="age" placeholder="Age" required><br>
    <select name="gender">
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select><br>
    <select name="activity_level">
        <option value="bas">Bas</option>
        <option value="moyen">Moyen</option>
        <option value="élevé">Élevé</option>
    </select><br>
    <input type="submit" value="S'inscrire">
</form>
