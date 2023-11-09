<html>
    <head>
    <title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
        <link rel="stylesheet"  href="http://localhost/IDAW/Projet/Frontend/css/style.css">
<?php


require_once 'config.php';
$connection = new mysqli("localhost", "root", "", "dbfood");
// Vérifier la connexion
if (empty($email_err) && empty($password_err)) {
    // Prépare une déclaration select
    $sql = "SELECT id, email, password, FROM users WHERE email = ?";

    if ($stmt = $connection->prepare($sql)) {
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
                        

                        // Stocke les données dans les variables de session
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;
                        

                        // Redirige l'utilisateur vers la page d'accueil
                        header("location: accueil.php");
                    } else {
                        // Affiche un message d'erreur si le mot de passe n'est pas valide
                        $password_err = "Le mot de passe que vous avez entré n'est pas valide.";
                    }
                }
            } else {
                // Affiche un message d'erreur si l'email n'existe pas
                $email_err = "Aucun compte trouvé avec cet email.";
            }
        } else {
            echo "Oups ! Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
        }

        // Ferme la déclaration
        $stmt->close();
    }
}
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
