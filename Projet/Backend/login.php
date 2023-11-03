<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
<?php

session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier les identifiants de l'utilisateur
    if ($username === 'yahya' && $password === '12345') {
        // Identifiants valides, connecter l'utilisateur et rediriger vers la page d'accueil
        $_SESSION['user_id'] = 1; // Vous pouvez stocker l'ID de l'utilisateur dans la session
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

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo '<p>Identifiants invalides. Veuillez réessayer.</p>';
        unset($_SESSION['login_error']);
    }
    ?>
    <form action="login.php" method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="register.php">S'inscrire</a></p>
</body>
</html>
