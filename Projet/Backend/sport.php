<head>
    <title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<header>
        <h1>Sports</h1>
        <br>
       
    </header>
    <nav>
        <ul>
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="Historique des aliments.php">Historique des aliments</a></li>
            <li><a href="profil.php">Voir mon Profil</a></li>
            <li><a href="sport.php">Sports</a></li>
            
        </ul>
    </nav>
<body>

<table id="sportTable" class="display">
    <thead>
        <tr>
            <th>Sport</th>
            <th>Taux de Calories brûlées par heure</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Définir un tableau de sports avec les taux de calories correspondants
        $sports = array(
            "Course à pied" => 600,
            "Natation" => 500,
            "Cyclisme" => 450,
            "Tennis" => 350,
            "Yoga" => 200,
            "Basket-ball" => 450,
            "Football" => 600,
            "Squash" => 800,
            "Escalade" => 700,
            "Musculation" => 400,
            "Randonnée" => 350,
            "Boxe" => 700,
            "Golf" => 250
        );

        // Parcourir le tableau et afficher chaque sport et son taux de calories dans le tableau
        foreach ($sports as $sport => $calories) {
            echo "<tr><td>$sport</td><td>$calories</td></tr>";
        }
        ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#sportTable').DataTable();
    } );
</script>

</body>
</html>
