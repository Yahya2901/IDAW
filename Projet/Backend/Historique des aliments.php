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
            <th>Code</th>
            <th>Product Name</th>
            <th>Nutrition Data Per</th>
            <th>Energy (kcal)</th>
            <th>Fat (g)</th>
            <th>Saturated Fat (g)</th>
            <th>Carbohydrates (g)</th>
            <th>Sugars (g)</th>
            <th>Fiber (g)</th>
            <th>Proteins (g)</th>
            <th>Salt (g)</th>
            <th>Sodium (g)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- Modal for editing products -->
<div id="editModal" style="display:none; position:fixed; top:50%; left:50%; transform: translate(-50%, -50%); background:white; padding:20px;">
    <h2>Edit Product</h2>
    <form id="editForm">
        <input type="hidden" id="productCode" name="productCode">
        Code: <input type="text" id="productCodeInput" name="productCodeInput"><br><br>
        Product Name: <input type="text" id="productName" name="productName"><br><br>
        Nutrition Data Per: <input type="text" id="nutritionDataPer" name="nutritionDataPer"><br><br>
        Energy (kcal): <input type="text" id="energyKcal" name="energyKcal"><br><br>
        Fat (g): <input type="text" id="fatValue" name="fatValue"><br><br>
        Saturated Fat (g): <input type="text" id="saturatedFatValue" name="saturatedFatValue"><br><br>
        Carbohydrates (g): <input type="text" id="carbohydratesValue" name="carbohydratesValue"><br><br>
        Sugars (g): <input type="text" id="sugarsValue" name="sugarsValue"><br><br>
        Fiber (g): <input type="text" id="fiberValue" name="fiberValue"><br><br>
        Proteins (g): <input type="text" id="proteinsValue" name="proteinsValue"><br><br>
        Salt (g): <input type="text" id="saltValue" name="saltValue"><br><br>
        Sodium (g): <input type="text" id="sodiumValue" name="sodiumValue"><br><br>
        <input type="button" value="Save" onclick="saveEdit()">
        <input type="button" value="Cancel" onclick="closeEdit()">
    </form>
</div>

<script>
$(document).ready(function()) {
    const table = $('#usersTable').DataTable({
        "ajax": {
            "url": "http://localhost/IDAW/Projet/Backend/users.php",
            "dataSrc": ""  // Utilisation de la clé "products" comme source de données
        },
        "columns": [
            { "data": "code" },
            { "data": "product_name_fr" },
            { "data": "nutrition_data_per" },
            { "data": "energy_kcal_value_kcal" },
            { "data": "fat_value_g" },
            { "data": "saturated_fat_value_g" },
            { "data": "carbohydrates_value_g" },
            { "data": "sugars_value_g" },
            { "data": "fiber_value_g" },
            { "data": "proteins_value_g" },
            { "data": "salt_value_g" },
            { "data": "sodium_value_g" },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `<button onclick="editProduct(${data.code}, '${data.product_name_fr}', '${data.nutrition_data_per}', ${data.energy_kcal_value_kcal}, ${data.fat_value_g}, ${data.saturated_fat_value_g}, ${data.carbohydrates_value_g}, ${data.sugars_value_g}, ${data.fiber_value_g}, ${data.proteins_value_g}, ${data.salt_value_g}, ${data.sodium_value_g})">Edit</button> <button onclick="deleteProduct(${data.code})">Delete</button>`;
                }
            }
        ]
    });
}
    window.editProduct = function(code, product_name_fr, nutrition_data_per, energy_kcal_value_kcal, fat_value_g, saturated_fat_value_g, carbohydrates_value_g, sugars_value_g, fiber_value_g, proteins_value_g, salt_value_g, sodium_value_g) {
        document.getElementById("productCode").value = code;
        document.getElementById("productCodeInput").value = code;
        document.getElementById("productName").value = product_name_fr;
        document.getElementById("nutritionDataPer").value = nutrition_data_per;
        document.getElementById("energyKcal").value = energy_kcal_value_kcal;
        document.getElementById("fatValue").value = fat_value_g;
        document.getElementById("saturatedFatValue").value = saturated_fat_value_g;
        document.getElementById("carbohydratesValue").value = carbohydrates_value_g;
        document.getElementById("sugarsValue").value = sugars_value_g;
        document.getElementById("fiberValue").value = fiber_value_g;
        document.getElementById("proteinsValue").value = proteins_value_g;
        document.getElementById("saltValue").value = salt_value_g;
        document.getElementById("sodiumValue").value = sodium_value_g;
        document.getElementById("editModal").style.display = "block";
    };

    window.deleteProduct = function(code) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: `http://localhost/IDAW/Projet/Backend/userss.php?code=${code}`,
                type: 'DELETE',
                success: function() {
                    table.ajax.reload();
                },
                error: function() {
                    alert('Failed to delete product.');
                }
            });
        }
    };

    window.closeEdit = function() {
        document.getElementById("editModal").style.display = "none";
    };

    window.saveEdit = function() {
        const code = document.getElementById("productCode").value;
        const product_name_fr = document.getElementById("productName").value;
        const nutrition_data_per = document.getElementById("nutritionDataPer").value;
        const energy_kcal_value_kcal = document.getElementById("energyKcal").value;
        const fat_value_g = document.getElementById("fatValue").value;
        const saturated_fat_value_g = document.getElementById("saturatedFatValue").value;
        const carbohydrates_value_g = document.getElementById("carbohydratesValue").value;
        const sugars_value_g = document.getElementById("sugarsValue").value;
        const fiber_value_g = document.getElementById("fiberValue").value;
        const proteins_value_g = document.getElementById("proteinsValue").value;
        const
    }
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
