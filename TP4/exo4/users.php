<?php
require_once('config.php');
$connectionString = "mysql:host=". _MYSQL_HOST;
if(defined('_MYSQL_PORT'))
$connectionString .= ";port=". _MYSQL_PORT;
$connectionString .= ";dbname=" . _MYSQL_DBNAME;
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
$pdo = NULL;
try {
$pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $erreur) {
echo 'Erreur : '.$erreur->getMessage();
}


// Code pour ajouter un utilisateur
if(isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $pdprepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$name, $email]);
}

// Code pour supprimer un utilisateur
if(isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];
    $stmt = $pdprepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
}

// Code pour modifier un utilisateur
if(isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $pdprepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $email, $id]);
}
$request = $pdo->prepare("select * from users");
$request->execute();
$users = $request->fetchAll(PDO::FETCH_OBJ);

?>

<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>






<?php
$pdo = null;
?>



