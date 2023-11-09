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
// Connexion à la base de données
require_once 'config.php';

$conn = new mysqli("localhost", "root", "", "dbfood");

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Traitement du formulaire d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $activity_level = $_POST["activity_level"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];

    // Vérifier si les mots de passe correspondent
    if ($password != $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
    } else {
        // Hasher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insérer les données dans la table "users"
        $sql = "INSERT INTO users (email, password, age, gender, activity_level, height, weight) VALUES ('$email', '$hashed_password', $age, '$gender', '$activity_level', $height, $weight)";

        if ($conn->query($sql) === TRUE) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription : " . $conn->error;
        }
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
    <title>Inscrivez-vous</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Mot de passe:</label>
        <input type="password" name="password" required><br>

        <label>Confirmer le mot de passe:</label>
        <input type="password" name="confirm_password" required><br>

        <label>Âge:</label>
        <input type="number" name="age" required><br>

        <label>Sexe:</label>
        <select name="gender" required>
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select><br>

        <label>Niveau d'activité:</label>
        <select name="activity_level" required>
            <option value="low">Faible</option>
            <option value="moderate">Modéré</option>
            <option value="high">Élevé</option>
        </select><br>

        <label>Taille (cm):</label>
        <input type="number" name="height" required><br>

        <label>Poids (kg):</label>
        <input type="number" name="weight" required><br>

        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
