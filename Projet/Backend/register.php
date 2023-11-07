<!DOCTYPE html>
<html>
<head>
    <title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet"  href="http://localhost/IDAW/Projet/Frontend/css/style1.css">
</head>


<?php
session_start();
require_once 'config.php';
// Vérifier si l'utilisateur est déjà connecté, rediriger s'il est connecté
if (isset($_SESSION['id'])) {
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
    
}   

$conn = new mysqli("localhost", "root", "", "dbfood");

// Vérifiez si la connexion à la base de données a réussi
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Préparez la requête SQL pour insérer les données dans la table "users"
$sql = "INSERT INTO users (login, age, gender, activity_level, password) VALUES (?, ?, ?, ?, ?)";

// Utilisez une déclaration préparée pour éviter les attaques par injection SQL
$stmt = $conn->prepare($sql);

// Liez les paramètres
$stmt->bind_param("sisss", $login, $age, $gender, $activity_level, $password);


// Exécutez la requête
if ($stmt->execute()) {
    // Redirigez l'utilisateur vers la page d'accueil après l'inscription
    header('Location: login.php');
    exit();
}

// Fermez la déclaration préparée et la connexion à la base de données
$stmt->close();
$conn->close();

?>



<h2 style="text-align: center;">Inscrivez-vous</h2>


<form method="POST" action="register.php" style="text-align: center;">
    <input type="text" name="login" placeholder="Login" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br> 
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




