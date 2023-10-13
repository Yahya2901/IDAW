<?php
session_start();
// on simule une base de données
$users = array(
// login => password
'yaya' => '12345',
'ouss' => 'ama123' );
$login = "anonymous";
$errorText = "";
$successfullyLogged = false;

if(isset($_POST['login']) && isset($_POST['password'])) {
    $tryLogin=$_POST['login'];
$tryPwd=$_POST['password'];
// si login existe et password correspond
if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
$successfullyLogged = true;
$_SESSION['username'] = $tryLogin;
$login = $tryLogin;
if (isset($_SESSION['username'])) {
    echo "<h1>Bienvenu " . $_SESSION['username'] . "</h1>";
    echo '<a href="logout.php">Se déconnecter</a>';
}
} else
$errorText = "Erreur de login/password";
}  else
$errorText = "Merci d'utiliser le formulaire de login";

?>
