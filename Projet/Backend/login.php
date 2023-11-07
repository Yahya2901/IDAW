<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet"  href="http://localhost/IDAW/Projet/Frontend/css/style.css">
<?php


session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Connexion à la base de données (utilisez les informations de config.php)
    $conn = new mysqli("localhost", "root", "", "dbfood");

    // Vérifiez si la connexion à la base de données a réussi
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " . $conn->connect_error);
    }

    // Préparez la requête SQL pour vérifier les informations de connexion
    $sql = "SELECT id, login, password FROM users WHERE login = ?";

    // Utilisez une déclaration préparée pour éviter les attaques par injection SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);

    // Exécutez la requête
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        // Récupérez le résultat de la requête
        $stmt->bind_result($id, $login, $password);
        $stmt->fetch();

        // Vérifiez si le mot de passe correspond
        if (password_verify($password, $password)) {
            // Mot de passe valide, connectez l'utilisateur et redirigez-le vers la page d'accueil
            $_SESSION['id'] = $id; // Stockez l'ID de l'utilisateur dans la session
            header('Location: accueil.php');
            exit;
        } else {
            // Mot de passe invalide, afficher un message d'erreur
            $_SESSION['login_error'] = 'Mot de passe incorrect. Veuillez réessayer.';
            header('Location: login.php'); // Redirigez vers la page de login
            exit;
        }
    } else {
        // Utilisateur non trouvé, afficher un message d'erreur
        $_SESSION['login_error'] = 'Utilisateur non trouvé. Veuillez réessayer.';
        header('Location: login.php'); // Redirigez vers la page de login
        exit;
    }

    // Fermez la déclaration préparée et la connexion à la base de données
    $stmt->close();
    $conn->close();
}
?>
<body>
    <h1>Bienvenue sur iMangerMieux</h1>
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