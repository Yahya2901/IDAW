<!DOCTYPE html>
<html>
<head>
    <title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/style1.css">
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>
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

    /// Inclure le fichier de configuration de la base de données ou établir la connexion à la base de données
// Assurez-vous que cette étape est correctement configurée.

try {
    // Les informations de connexion à la base de données (à remplacer par les vôtres)
    $dsn = "mysql:host=localhost;dbname=users.sql";
    $username = "login";
    $password = "password";

    // Créer une instance PDO
    $pdo = new PDO($dsn, $username, $password);

    // Préparer la requête d'insertion avec des paramètres liés
    $sql = "INSERT INTO table_utilisateurs (login, age, gender, activity_level, password) VALUES (:login, :age, :gender, :activity_level, :password)";
    $stmt = $pdo->prepare($sql);

    // Lié les paramètres
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':activity_level', $activity_level);
    $stmt->bindParam(':password', $password);

    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $activity_level = $_POST['activity_level'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasher le mot de passe

    // Exécuter la requête
    $stmt->execute();

    // Rediriger l'utilisateur vers la page d'accueil après l'inscription
    header('Location: Accueil.php');
    exit();
} catch (PDOException $e) {
    // En cas d'erreur de la base de données, afficher un message d'erreur
    echo "Erreur lors de l'inscription : " . $e->getMessage();
}

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
