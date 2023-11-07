<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet"  href="http://localhost/IDAW/Projet/Frontend/css/style.css">
<?php



session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['login'];
    $password = $_POST['password'];

    // Vérifier les identifiants de l'utilisateur
    if ($username === $_SESSION['user_login'] && $password === 'password') {
        // Identifiants valides, connectez l'utilisateur et redirigez vers la page d'accueil
        $_SESSION['user_id'] = $user_id; // Vous pouvez stocker l'ID de l'utilisateur dans la session
        header('Location: accueil.php');
        exit;
    } else {
        // Identifiants invalides, afficher un message d'erreur
        $_SESSION['login_error'] = 'Identifiants invalides. Veuillez réessayer.';
        header('Location: login.php'); // Rediriger vers la page de login
        exit;
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
</body>
</html>

