<?php
require_once 'config.php';
$connectionString = "mysql:host=". _MYSQL_HOST;
if(defined('_MYSQL_PORT')) {
$connectionString .= ";port=". _MYSQL_PORT;
}
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );

try {
    $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query("SELECT id, name, email FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $erreur) {
    $response['error'] = 'Erreur : ' . $erreur->getMessage();
    echo json_encode($response);
    exit;
}

// Endpoint pour lister tous les utilisateurs (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT id, name, email FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($users);
}

// Endpoint pour obtenir un utilisateur par ID (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        header('Content-Type: application/json');
        echo json_encode($user);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Utilisateur non trouvé"]);
    }
}

// Endpoint pour créer un utilisateur (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['name']) && isset($data['email'])) {
        $nom = $data['name'];
        $email = $data['email'];
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (name, email)");
        $stmt->execute([$name, $email]);

        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode(["message" => "Utilisateur ajouté avec succès"]);
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Requête invalide"]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['name']) && isset($data['email'])) {
        $nom = $data['name'];
        $email = $data['email'];

        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$nom, $prenom, $id]);

        header('Content-Type: application/json');
        echo json_encode(["message" => "Utilisateur mis à jour avec succès"]);
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Requête invalide"]);
    }
}

// Endpoint pour supprimer un utilisateur par ID (DELETE)
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        header('Content-Type: application/json');
        http_response_code(204);
        echo json_encode(["message" => "Utilisateur supprimé avec succès"]);
    } else {
        http_response_code(404);
        echo json_encode(["message" => "Utilisateur non trouvé"]);
    }
}
?>






