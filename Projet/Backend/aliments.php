<?php
// Connexion à la base de données

// Requête pour récupérer l'historique des aliments consommés par l'utilisateur
// Assurez-vous de récupérer les données de l'utilisateur actuellement connecté
$query = "SELECT * FROM food_entries WHERE user_id = :user_id ORDER BY date_consumed DESC";
// Exécutez la requête et affichez les résultats dans un tableau HTML
?>

<!-- Affichage de l'historique des aliments consommés -->
<table>
    <thead>
        <tr>
            <th>Nom de l'aliment</th>
            <th>Quantité</th>
            <th>Date consommée</th>
        </tr>
    </thead>
    <tbody>
        <!-- Affichez ici les données récupérées de la base de données -->
    </tbody>
</table>
