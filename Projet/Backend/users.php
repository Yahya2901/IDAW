<?php
require_once 'config.php';
$connectionString = "mysql:host=" . _MYSQL_HOST;
if (defined('_MYSQL_PORT')) {
    $connectionString .= ";port=" . _MYSQL_PORT;
}
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT code, product_name_fr, nutrition_data_per, energy_kcal_value_kcal, fat_value_g, saturated_fat_value_g, carbohydrates_value_g, sugars_value_g, fiber_value_g, proteins_value_g, salt_value_g, sodium_value_g FROM food"); // Modifier la requête SQL pour inclure les colonnes demandées
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erreur) {
    $response['error'] = 'Erreur : ' . $erreur->getMessage();
    echo json_encode($response);
    exit;
}

// Endpoint pour lister tous les produits (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT code, product_name_fr, nutrition_data_per, energy_kcal_value_kcal, fat_value_g, saturated_fat_value_g, carbohydrates_value_g, sugars_value_g, fiber_value_g, proteins_value_g, salt_value_g, sodium_value_g FROM food"); // Modifier la requête SQL pour inclure les colonnes demandées
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($users);
}

// Endpoint pour obtenir un produit par son code (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['code'])) {
    $code = $_GET['code'];
    $stmt = $pdo->prepare("SELECT code, product_name_fr, nutrition_data_per, energy_kcal_value_kcal, fat_value_g, saturated_fat_value_g, carbohydrates_value_g, sugars_value_g, fiber_value_g, proteins_value_g, salt_value_g, sodium_value_g FROM food WHERE code = ?");
    $stmt->execute([$code]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        header('Content-Type: application/json');
        echo json_encode($product);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Produit non trouvé"]);
    }
}

// Endpoint pour créer un produit (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['code']) && isset($data['product_name_fr']) && isset($data['nutrition_data_per']) && isset($data['energy_kcal_value_kcal']) && isset($data['fat_value_g']) && isset($data['saturated_fat_value_g']) && isset($data['carbohydrates_value_g']) && isset($data['sugars_value_g']) && isset($data['fiber_value_g']) && isset($data['proteins_value_g']) && isset($data['salt_value_g']) && isset($data['sodium_value_g'])) {
        $code = $data['code'];
        $product_name_fr = $data['product_name_fr'];
        $nutrition_data_per = $data['nutrition_data_per'];
        $energy_kcal_value_kcal = $data['energy_kcal_value_kcal'];
        $fat_value_g = $data['fat_value_g'];
        $saturated_fat_value_g = $data['saturated_fat_value_g'];
        $carbohydrates_value_g = $data['carbohydrates_value_g'];
        $sugars_value_g = $data['sugars_value_g'];
        $fiber_value_g = $data['fiber_value_g'];
        $proteins_value_g = $data['proteins_value_g'];
        $salt_value_g = $data['salt_value_g'];
        $sodium_value_g = $data['sodium_value_g'];

        $stmt = $pdo->prepare("INSERT INTO food (code, product_name_fr, nutrition_data_per, energy_kcal_value_kcal, fat_value_g, saturated_fat_value_g, carbohydrates_value_g, sugars_value_g, fiber_value_g, proteins_value_g, salt_value_g, sodium_value_g) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$code, $product_name_fr, $nutrition_data_per, $energy_kcal_value_kcal, $fat_value_g, $saturated_fat_value_g, $carbohydrates_value_g, $sugars_value_g, $fiber_value_g, $proteins_value_g, $salt_value_g, $sodium_value_g]);

        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode(["message" => "Produit ajouté avec succès"]);
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Requête invalide"]);
    }
}

// Endpoint pour mettre à jour un produit par son code (PUT)
if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_GET['code'])) {
    $code = $_GET['code'];
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['product_name_fr']) && isset($data['nutrition_data_per']) && isset($data['energy_kcal_value_kcal']) && isset($data['fat_value_g']) && isset($data['saturated_fat_value_g']) && isset($data['carbohydrates_value_g']) && isset($data['sugars_value_g']) && isset($data['fiber_value_g']) && isset($data['proteins_value_g']) && isset($data['salt_value_g']) && isset($data['sodium_value_g'])) {
        $product_name_fr = $data['product_name_fr'];
        $nutrition_data_per = $data['nutrition_data_per'];
        $energy_kcal_value_kcal = $data['energy_kcal_value_kcal'];
        $fat_value_g = $data['fat_value_g'];
        $saturated_fat_value_g = $data['saturated_fat_value_g'];
        $carbohydrates_value_g = $data['carbohydrates_value_g'];
        $sugars_value_g = $data['sugars_value_g'];
        $fiber_value_g = $data['fiber_value_g'];
        $proteins_value_g = $data['proteins_value_g'];
        $salt_value_g = $data['salt_value_g'];
        $sodium_value_g = $data['sodium_value_g'];

        $stmt = $pdo->prepare("UPDATE food SET product_name_fr = ?, nutrition_data_per = ?, energy_kcal_value_kcal = ?, fat_value_g = ?, saturated_fat_value_g = ?, carbohydrates_value_g = ?, sugars_value_g = ?, fiber_value_g = ?, proteins_value_g = ?, salt_value_g = ?, sodium_value_g = ? WHERE code = ?");
        $stmt->execute([$product_name_fr, $nutrition_data_per, $energy_kcal_value_kcal, $fat_value_g, $saturated_fat_value_g, $carbohydrates_value_g, $sugars_value_g, $fiber_value_g, $proteins_value_g, $salt_value_g, $sodium_value_g, $code]);

        header('Content-Type: application/json');
        echo json_encode(["message" => "Produit mis à jour avec succès"]);
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Requête invalide"]);
    }
}

// Endpoint pour supprimer un produit par son code (DELETE)
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['code'])) {
    $code = $_GET['code'];

    $stmt = $pdo->prepare("DELETE FROM food WHERE code = ?");
    $stmt->execute([$code]);

    if ($stmt->rowCount() > 0) {
        header('Content-Type: application/json');
        http_response_code(204);
        echo json_encode(["message" => "Produit supprimé avec succès"]);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Produit non trouvé"]);
    }
}
