<!DOCTYPE html>
<html>
<head>
<title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>

<body>
    <header>
        <h1>Aliments</h1>
        
       <!-- Table HTML -->
<table id="usersTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
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
        calories: <input type="text" id="usercalories" name="usercalories"><br><br>
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
            { "data": "calories" },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `<button onclick="editUser(${data.id}, '${data.name}', '${data.calories}')">Edit</button> <button onclick="deleteUser(${data.id})">Delete</button>`;
                }
            }
        ]
    });

    window.editUser = function(id, name, calories) {
        document.getElementById("userid").value = id;
        document.getElementById("username").value = name;
        document.getElementById("usercalories").value = calories;
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
        const id = document.getElementById("userid").value;
        const name = document.getElementById("username").value;
        const calories = document.getElementById("usercalories").value;

        $.ajax({
            url: `http://localhost/IDAW/Projet/Backend/users.php?id=${id}`,
            type: 'PUT',
            data: JSON.stringify({ name: name, calories: calories }),
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
