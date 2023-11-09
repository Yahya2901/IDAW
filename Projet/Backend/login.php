<html>
    <head>
    <title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
        <link rel="stylesheet"  href="http://localhost/IDAW/Projet/Frontend/css/style.css">
        <?php
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

    // Prépare une déclaration select
    $sql = "SELECT id, email, password FROM users WHERE email = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Lie les variables à la déclaration préparée en tant que paramètres
        $stmt->bind_param("s", $param_email);

        // Définir les paramètres
        $param_email = $email;

        // Tentative d'exécution de la déclaration préparée
        if ($stmt->execute()) {
            // Stocke le résultat
            $stmt->store_result();

            // Vérifie si l'email existe, si oui, vérifie le mot de passe
            if ($stmt->num_rows == 1) {
                // Lie les variables de résultat
                $stmt->bind_result($id, $email, $hashed_password);
                if ($stmt->fetch()) {
                    if (password_verify($password, $hashed_password)) {
                        // Le mot de passe est correct, commence une nouvelle session

                        // Démarrer la session
                        session_start();

                        // Stocke les données dans les variables de session
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;

                        // Redirige l'utilisateur vers la page d'accueil
                        header("location: accueil.php");
                        exit;
                    } else {
                        // Mot de passe incorrect
                        echo "Le mot de passe que vous avez entré n'est pas valide.";
                    }
                }
            } else {
                // Email non trouvé
                echo "Aucun compte trouvé avec cet email.";
            }
        } else {
            echo "Oups ! Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
        }

        // Ferme la déclaration
        $stmt->close();
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
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Mot de passe:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Se connecter">
        <a href="register.php">Pas encore un compte ?</a></p>
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