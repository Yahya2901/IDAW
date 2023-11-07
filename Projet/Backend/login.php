<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet"  href="Frontend/css/style.css">

        
<?php
session_start();

if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    // Connexion à la base de données
    require_once "config.php";
    $conn = new mysqli("localhost", "root", "", "dbfood");

    // Vérification des identifiants
    $sql = "SELECT * FROM users WHERE login = '$login'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['password'])) {
            // Les identifiants sont valides, connectez l'utilisateur
            $_SESSION["login"] = $login;
            header("Location: accueil.php");
            exit;
        } else {
            // Identifiants invalides, afficher un message d'erreur
            $_SESSION['login_error'] = 'Identifiants invalides. Veuillez réessayer.';
            header('Location: login.php');
            exit;
        }
    } else {
        // Erreur de requête SQL
        echo "Erreur de requête SQL : " . mysqli_error($conn);
    }
}
?>

<head>
    <title>Connexion </title>
</head>
<body>
    <h1>Bienvenue sur iMangerMieux</h1>
    <form action="login.php" method="POST">
        <label for="login">login:</label>
        <input type="text" name="login" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore de compte ? <a href="register.php">S'inscrire</a></p>
</body>
</html>

