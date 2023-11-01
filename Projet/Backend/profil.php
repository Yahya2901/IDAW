<?php
// Vous devrez inclure des mécanismes d'authentification pour accéder à cette page.

// Supposons que vous avez des informations de profil dans une base de données.
// Vous devrez inclure la connexion à la base de données.

// Exemple de code pour se connecter à la base de données (à adapter à votre configuration):
// $conn = new mysqli('votre_hôte', 'votre_utilisateur', 'votre_mot_de_passe', 'votre_base_de_données');

// Vérifiez la connexion à la base de données
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

// Supposons que vous avez une table "utilisateurs" avec des colonnes telles que "nom", "prénom" et "email".
// Vous devrez personnaliser ce code en fonction de votre propre schéma de base de données.

// Récupérez les informations de l'utilisateur (exemple de requête SQL)
$query = "SELECT nom, prenom, email FROM utilisateurs WHERE id = ?"; // Remplacez ? par l'identifiant de l'utilisateur connecté

// Préparez la requête SQL
$stmt = $conn->prepare($query);

// Vérifiez si la préparation de la requête a réussi
if ($stmt) {
    // Remplacez ? par l'identifiant de l'utilisateur connecté
    $userId = 1; // Exemple d'identifiant d'utilisateur, vous devez le personnaliser

    // Liez l'identifiant de l'utilisateur à la requête
    $stmt->bind_param("i", $userId);

    // Exécutez la requête
    $stmt->execute();

    // Récupérez les résultats
    $stmt->bind_result($nom, $prenom, $email);
    $stmt->fetch();

    // Fermez la requête
    $stmt->close();

    // Fermez la connexion à la base de données
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil - IMangerMieux</title>
</head>
<body>
    <header>
        <h1>Profil de l'Utilisateur</h1>
    </header>

    <nav>
        <ul>
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="aliments.php">Mes Aliments</a></li>
            <li><a href="suivi.php">Suivi</a></li>
            <li><a href="profil.php">Profil</a></li>
        </ul>
    </nav>

    <main>
        <h2>Informations de Profil</h2>
        <p>Nom : <?php echo $nom; ?></p>
        <p>Prénom : <?php echo $prenom; ?></p>
        <p>Email : <?php echo $email; ?></p>
    </main>

    <footer>
        <p>&copy; 2023 IMangerMieux. Tous droits réservés.</p>
    </footer>
</body>
</html>
