<html>
    <head>
    <title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet"  href="http://localhost/IDAW/Projet/Frontend/css/style.css">
        
              

    

    <?php
session_start()    ;
// Connexion à la base de données
require_once 'config.php';

$conn = new mysqli("localhost", "root", "", "dbfood");

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Requête pour récupérer l'utilisateur avec l'email fourni
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Utilisateur trouvé, vérifier le mot de passe
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"]=true ;
            $_SESSION["id"]=$row["id"] ;
            header("Location: accueil.php");
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous</title>
</head>
<body>
    <h2>Connexion</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Mot de passe:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Se connecter">
        <a href="register.php">S'inscrire</a></p>
    </form>
</body>
</html>




<style>
    /* Reset des styles par défaut du navigateur */
body, h2, form {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

h1, h2 {
    background-color: #333;
    color: #fff;
    padding: 10px;
    margin: 0;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px; /* Ajustez la largeur selon vos besoins */
    text-align: center;
}

label {
    display: block;
    margin-top: 10px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #555;
}

p {
    margin: 10px 0;
}

a {
    color: #333;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}


    </style>