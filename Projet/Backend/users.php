<?php

require_once('config.php');
$connectionString = "mysql:host=". _MYSQL_HOST;
if(defined('_MYSQL_PORT'))
$connectionString .= ";port=". _MYSQL_PORT;
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
$pdo = NULL;
try {
    $db = new PDO('mysql:host=hostname;dbname=dbfood', 'username', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire d'ajout d'aliment
    $food_name = $_POST['food_name'];
    $quantity = $_POST['quantity'];
    $date_consumed = $_POST['date_consumed'];

    $stmt = $db->prepare("INSERT INTO food_entries (user_id, food_name, quantity, date_consumed) VALUES (:user_id, :food_name, :quantity, :date_consumed)");
    $stmt->execute([
        'user_id' => $_SESSION['user_id'],
        'food_name' => $food_name,
        'quantity' => $quantity,
        'date_consumed' => $date_consumed
    ]);

    // Rediriger l'utilisateur vers la page d'historique des aliments
    header('Location: food_history.php');
    exit();
}
?>
<!-- Formulaire d'ajout d'aliment -->
<form method="POST" action="create_food.php">
    <input type="text" name="food_name" placeholder="Nom de l'aliment" required>
    <input type="number" name="quantity" placeholder="Quantité" step="0.01" required>
    <input type="date" name="date_consumed" required>
    <input type="submit" value="Ajouter l'aliment">
</form>

<?php
// Connexion à la base de données

// Requête pour récupérer l'historique des aliments consommés par l'utilisateur
$query = "SELECT * FROM food_entries WHERE user_id = :user_id ORDER BY date_consumed DESC";
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $_SESSION['user_id']);
$stmt->execute();
$food_entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <?php foreach ($food_entries as $entry) : ?>
            <tr>
                <td><?= $entry['food_name'] ?></td>
                <td><?= $entry['quantity'] ?></td>
                <td><?= $entry['date_consumed'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php
// Connexion à la base de données
try {
    $db = new PDO('mysql:host=hostname;dbname=food_tracker', 'username', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $food_id = $_POST['food_id']; // L'ID de l'aliment à mettre à jour
    $new_quantity = $_POST['new_quantity'];

    // Assurez-vous de valider et de sécuriser les données entrées par l'utilisateur.

    $stmt = $db->prepare("UPDATE food_entries SET quantity = :new_quantity WHERE id = :food_id AND user_id = :user_id");
    $stmt->execute([
        'new_quantity' => $new_quantity,
        'food_id' => $food_id,
        'user_id' => $_SESSION['user_id']
    ]);

    // Rediriger l'utilisateur vers la page d'historique des aliments
    header('Location: food_history.php');
    exit();
} else {
    $food_id = $_GET['id']; // Récupérez l'ID de l'aliment à partir de la requête GET
}
?>

<!-- Formulaire de mise à jour d'aliment -->
<form method="POST" action="update_food.php">
    <input type="hidden" name="food_id" value="<?= $food_id ?>">
    <input type="number" name="new_quantity" placeholder="Nouvelle quantité" step="0.01" required>
    <input type="submit" value="Mettre à jour l'aliment">
</form>



<?php
// Connexion à la base de données
try {
    $db = new PDO('mysql:host=hostname;dbname=food_tracker', 'username', 'password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $food_id = $_POST['food_id']; // L'ID de l'aliment à supprimer

    $stmt = $db->prepare("DELETE FROM food_entries WHERE id = :food_id AND user_id = :user_id");
    $stmt->execute([
        'food_id' => $food_id,
        'user_id' => $_SESSION['user_id']
    ]);

    // Rediriger l'utilisateur vers la page d'historique des aliments
    header('Location: food_history.php');
    exit();
} else {
    $food_id = $_GET['id']; // Récupérez l'ID de l'aliment à partir de la requête GET
}
?>

<!-- Formulaire de suppression d'aliment -->
<form method="POST" action="delete_food.php">
    <input type="hidden" name="food_id" value="<?= $food_id ?>">
    <p>Êtes-vous sûr de vouloir supprimer cet aliment ?</p>
    <input type="submit" value="Supprimer l'aliment">
</form>
