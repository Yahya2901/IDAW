<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Inclure la logique de connexion à la base de données

// Récupérer les informations de l'utilisateur à partir de la base de données en utilisant $_SESSION['user_id']
$user_id = $_SESSION['user_id'];

// Connectez-vous à votre base de données
// $db = new PDO('mysql:host=your_host;dbname=your_database', 'your_username', 'your_password');

// Exécutez une requête SQL pour obtenir les informations de l'utilisateur
// Assurez-vous d'adapter cette requête en fonction de votre structure de base de données
$sql = "SELECT login, gender, age, activity_level FROM users WHERE user_id = :user_id";
$query = $db->prepare($sql);
$query->execute(array(':user_id' => $user_id));
$userData = $query->fetch(PDO::FETCH_ASSOC);

// Assurez-vous de vérifier si les données ont été récupérées avec succès
if ($userData) {
    $login = $userData['login'];
    $gender = $userData['gender'];
    $age = $userData['age'];
    $activity_level = $userData['activity_level'];
} else {
    // Gérer le cas où l'utilisateur n'est pas trouvé
    // Vous pouvez rediriger ou afficher un message d'erreur
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon Profil</title>
</head>
<body>
    <h1>Mon Profil</h1>
    <p>Login : <?php echo $login; ?></p>
    <p>Sexe : <?php echo $gender; ?></p>
    <p>Âge : <?php echo $age; ?></p>
    <p>Niveau d'activité : <?php echo $activity_level; ?></p>
    <!-- Autres informations de profil -->
</body>
</html>
