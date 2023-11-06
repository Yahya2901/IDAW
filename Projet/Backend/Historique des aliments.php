<!DOCTYPE html>
<html>
<head>
<title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>

<body>
    <header>
        <h1>Aliments</h1>

        <nav>
        <ul>
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="Historique des aliments.php">Historique des aliments</a></li>
            <li><a href="profil.php">Voir mon Profil</a></li>
            <li><a href="sport.php">Sports</a></li>
            
        </ul>
    </nav>


<!-- Table HTML -->
<table id="usersTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Calories</th>
            <th>Actions</th>
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
        Type: <input type="text" id="userType" name="userType"><br><br>
        Calories: <input type="text" id="userCalories" name="userCalories"><br><br>
        <input type="button" value="Save" onclick="saveEdit()">
        <input type="button" value="Cancel" onclick="closeEdit()">
    </form>
</div>

<script>
$(document).ready(function() {
    const table = $('#usersTable').DataTable({
        "ajax": {
            "url": "http://localhost/IDAW/Projet/Backend/users.php",
            "dataSrc": ""  // Utilisation de la clé "users" comme source de données
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "type" }, // Remplace "email" par "type"
            { "data": "calories" }, // Ajoute la colonne "calories"
            {
                "data": null,
                "render": function(data, type, row) {
                    return `<button onclick="editUser(${data.id}, '${data.name}', '${data.type}', '${data.calories}')">Edit</button> <button onclick="deleteUser(${data.id})">Delete</button>`;
                }
            }
        ]
    });

    window.editUser = function(id, name, type, calories) {
        document.getElementById("userId").value = id;
        document.getElementById("userName").value = name;
        document.getElementById("userType").value = type;
        document.getElementById("userCalories").value = calories;
        document.getElementById("editModal").style.display = "block";
    };

    window.deleteUser = function(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: `http://localhost/IDAW/Projet/Backend/users.php?id=${id}`,
                type: 'DELETE',
                success: function() {
                    table.ajax.reload();
                },
                error: function() {
                    alert('Failed to delete user.');
                }
            });
        }
    };

    window.closeEdit = function() {
        document.getElementById("editModal").style.display = "none";
    };

    window.saveEdit = function() {
        const id = document.getElementById("userId").value;
        const name = document.getElementById("userName").value;
        const type = document.getElementById("userType").value;
        const calories = document.getElementById("userCalories").value;

        $.ajax({
            url: `http://localhost/IDAW/Projet/Backend/users.php?id=${id}`,
            type: 'PUT',
            data: JSON.stringify({ name: name, type: type, calories: calories }), // Met à jour les propriétés
            contentType: 'application/json',
            success: function() {
                table.ajax.reload();
                closeEdit();
            },
            error: function() {
                alert('Failed to update user.');
            }
        });
    };
});
</script>

</body>
</html>