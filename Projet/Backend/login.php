<?php
// Connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire d'inscription
    $login = $_POST['login'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $activity_level = $_POST['activity_level'];

    // Insérez les données de l'utilisateur dans la base de données
    // Assurez-vous d'ajouter une validation et une sécurité appropriées ici
}
?>

<!-- Formulaire d'inscription -->
<form method="POST" action="register.php">
    <input type="text" name="login" placeholder="Login" required>
    <input type="number" name="age" placeholder="Age" required>
    <select name="gender">
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
    </select>
    <select name="activity_level">
        <option value="bas">Bas</option>
        <option value="moyen">Moyen</option>
        <option value="élevé">Élevé</option>
    </select>
    <input type="submit" value="S'inscrire">
</form>
