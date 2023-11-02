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