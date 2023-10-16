<?php
require_once('config1.php');

try {
    $pdo = new PDO("mysql:host=" . _MYSQL_HOST . ";port=" . _MYSQL_PORT . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Nom du fichier SQL à exécuter
    $sqlFile = 'create_db.sql'; 
  
    if (file_exists($sqlFile)) {
        $sqlQueries = file_get_contents($sqlFile);

        // Séparation des requêtes SQL par des points-virgules
        $queries = explode(';', $sqlQueries);

        foreach ($queries as $query) {
            $query = trim($query);

            if (!empty($query)) {
                $pdo->exec($query);
            }
        }

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


