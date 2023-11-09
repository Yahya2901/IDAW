<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet"  href="http://localhost/IDAW/Projet/Frontend/css/style.css">
<?php



session_start();
require_once 'config.php';
$connection = new mysqli("localhost", "root", "", "dbfood");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($login) && empty($password)) {
        // Prépare une déclaration select
        $sql = "SELECT id, login, password,  FROM users WHERE login = ?";

        if ($stmt = $connection->prepare($sql)) {
            // Lie les variables à la déclaration préparée en tant que paramètres
            $stmt->bind_param("s", $login);

            // Définir les paramètres
            $login = $login;

            // Tentative d'exécution de la déclaration préparée
            if ($stmt->execute()) {
                // Stocke le résultat
                $stmt->store_result();

                // Vérifie si l'email existe, si oui, vérifie le mot de passe
                if ($stmt->num_rows == 1) {
                    // Lie les variables de résultat
                    $stmt->bind_result($id, $login, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Le mot de passe est correct, commence une nouvelle session
                            session_start();

                            // Stocke les données dans les variables de session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["login"] = $login;
                            

                            // Redirige l'utilisateur vers la page d'accueil
                            header("location: accueil.php");
                        } else {
                            // Affiche un message d'erreur si le mot de passe n'est pas valide
                            $password_err = "Le mot de passe que vous avez entré n'est pas valide.";
                        }
                    }
                } else {
                    // Affiche un message d'erreur si l'email n'existe pas
                    $login_err = "Aucun compte trouvé avec cet email.";
                }
            } else {
                echo "Oups ! Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
            }

            // Ferme la déclaration
            $stmt->close();
        }
    }
}    

?>
<head>
    <title>Connexion </title>
</head>
<body>
    <h1>Bienvenue sur iMangerMieux</h1>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo '<p>Identifiants invalides. Veuillez réessayer.</p>';
        unset($_SESSION['login_error']);
    }
    ?>
    <form action="login.php" method="POST">
        <label for="login">login:</label>
        <input type="text" name="username" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="register.php">S'inscrire</a></p>

   