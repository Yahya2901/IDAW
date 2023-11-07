<!DOCTYPE html>
<html>
<head>
    <title>iMangerMieux - Tracker d'Aliments et de Calories</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="http://localhost/IDAW/Projet/Backend/accueil.php">Accueil</a></li>
            <li><a href="http://localhost/IDAW/Projet/Frontend/dashboard.php">Dashboard</a></li>
            <li><a href="http://localhost/IDAW/Projet/Backend/Historique des aliments.php">Historique des aliments</a></li>
            <li><a href="http://localhost/IDAW/Projet/Backend/profil.php">Voir mon Profil</a></li>
            <li><a href="http://localhost/IDAW/Projet/Backend/sport.php">Sports</a></li>
            
        </ul>
    </nav>
<body>

    <!-- Table HTML -->
    <table id="usersTable" class="display">
        <!-- Table content here -->
    </table>

    <!-- Chart.js canvas for the circular chart -->
    <div style="text-align: center;">
        <canvas id="caloriesChart" width="100" height="100"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            // Initialize Chart.js
            var ctx = document.getElementById('caloriesChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'doughnut', // Circular chart type
                data: {
                    labels: ['Calories Consommées', 'Calories Restantes'],
                    datasets: [
                        {
                            data: [0, 2000], // Initial values, replace with your total calories
                            backgroundColor: ['#FF5733', '#3333FF'], // Colors for the chart segments
                        },
                    ],
                },
            });

            const table = $('#usersTable').DataTable({
                "ajax": {
                    "url": "http://localhost/IDAW/Projet/Backend/users.php",
                    "dataSrc": "" // Utilisation de la clé "users" comme source de données
                },
                "columns": [
                    // Columns configuration here
                ],
            });

            // Function to update the chart when an item is selected
            function updateChart(caloriesConsumed) {
                // Update the data for the chart
                chart.data.datasets[0].data = [caloriesConsumed, 2000 - caloriesConsumed]; // Update with your total calories
                chart.update();
            }

            window.editUser = function (id, name, type, calories) {
                // Update the chart with the selected item's calories
                updateChart(calories);
                // Rest of the editUser function
                // ...
            };

            // Rest of your JavaScript code
            // ...
        });
    </script>
</body>
</html>



