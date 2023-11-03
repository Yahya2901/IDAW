<!DOCTYPE html>
<html>
<head>
    <title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>

<body>
    <header>
        <h1>Bienvenue sur iMangerMieux</h1>
        <p>Un Outil Simple pour suivre vos aliments et calories, pour une vie saine et energetique.</p>
       
    </header>

    <nav>
        <ul>
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="suivi.php">Historique des aliments</a></li>
            <li><a href="profil.php">Voir mon Profil</a></li>
        </ul>
    </nav>
    <body>
    <div class="circle">
        <div class="calories">0</div>
        <div class="label">Calories</div>
    </div>

    <script src="script.js"></script>

    <footer>
        <p>&copy; 2023 Tableau de Bord de Suivi de Nutrition.</p>
    </footer>

    <form action="logout.php" method="POST">
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>
    <footer>
        <p>&copy; 2023 iMangerMieux.</p>
    </footer>
    
</head>
<body>

<!-- Table HTML -->
<table id="usersTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Calories</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- Modal for editing users -->
<div id="editModal" style="display:none; position:fixed; top:50%; left:50%; transform: translate(-50%, -50%); background:white; padding:20px;">
    <h2>Edit User</h2>
    <form id="editForm">
        <input type="hidden" id="userId" name="userId">
        Name: <input type="text" id="userName" name="userName"><br><br>
        Email: <input type="text" id="userEmail" name="userEmail"><br><br>
        <input type="button" value="Save" onclick="saveEdit()">
        <input type="button" value="Cancel" onclick="closeEdit()">
    </form>
</div>
