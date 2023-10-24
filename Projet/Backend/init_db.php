<?php
require_once('config.php');

try {
    $pdo = new PDO("mysql:host=" . _MYSQL_HOST . ";port=" . _MYSQL_PORT . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Charger le contenu du fichier SQL
    $sqlFile = 'sql/create_db.sql'; // Remplacez ceci par le chemin complet vers votre fichier SQL

    if (file_exists($sqlFile)) {
        $sqlQueries = file_get_contents($sqlFile);

        // Exécutez les requêtes SQL
        $pdo->exec($sqlQueries);
        echo "Le fichier SQL a été exécuté avec succès.";
    } else {
        echo "Le fichier SQL n'a pas été trouvé.";
    }

    // Fermer la connexion à la base de données
    $pdo = null;
} catch (PDOException $erreur) {
    echo 'Erreur : ' . $erreur->getMessage();
}
?>
