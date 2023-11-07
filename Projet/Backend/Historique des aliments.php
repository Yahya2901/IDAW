<!DOCTYPE html>
<html>
<head>
<title> iMangerMieux - Tracker d'Aliments et de Calories </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="styles.css">
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
            <li><a href="http://localhost/IDAW/Projet/Frontend/dashboard.php">Dashboard</a></li>
            <li><a href="Historique des aliments.php">Historique des aliments</a></li>
            <li><a href="profil.php">Voir mon Profil</a></li>
            <li><a href="sport.php">Sports</a></li>
            <li><a href="logout.php">Deconnexion</a></li>
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
<style>
    body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background: #50b3a2;
    color: #fff;
    padding-top: 30px;
    min-height: 70px;
    border-bottom: #bbb 1px solid;
}

header a {
    color: #ffffff;
    margin-top: 20px;
    padding-right: 15px;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 16px;
}

nav {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #333;
    padding: 10px 0;
}

nav a {
    color: white;
    padding: 0 15px;
    text-decoration: none;
}

nav a:hover {
    background-color: #ddd;
    color: black;
}

nav ul {
    padding: 0;
    list-style: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

section {
    margin: 15px;
    padding: 15px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    text-align: center;
    padding: 40px;
}

section h2, section h3 {
    color: #333;
}

section h1{
    font-size: 2.5rem;
  margin-bottom: 20px;
  color: #333;
}
section p {
    text-align: justify;
    font-size: 1.2rem;
  margin: 20px 0;
  color: #666;
}

section ul {
    list-style: square;
    padding-left: 20px;
}

footer {
    text-align: center;
    padding: 1px 1px;
    background: #50b3a2;
    position: fixed;
    left: 0;
    bottom: 0;
    color: white;
    width: 100%;
}

.footer p {
    margin: 0;
    padding: 0;
}
.image-container {
    text-align: center;
  }
  
  .image-container img {
    width: 200px;
    border-radius: 50%;
  }
  pre {
    font-size: 2em;
    line-height: 0.6;
  }
#currentpage {
    background-color: #50b3a2;
    font-weight: bold;
    color: #fafafa;
}
.center-vertical {
    display: flex;
    align-items: center;
    height: 100vh;
  }
  .bandeau_haut {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 20px;
    background-color: #50b3a2;
}

.titre {
    margin: 0;
    font-size: 2em;
    color: #333;
}
.contact-section {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    margin: 20px 0;
}

.contact-section h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.contact-section p {
    font-size: 18px;
    line-height: 1.6;
    color: #000000;
}

.contact-section a {
    color: #0066cc;
    text-decoration: none;
}

.contact-section a:hover {
    text-decoration: underline;
}
</style>
</body>
</html>
