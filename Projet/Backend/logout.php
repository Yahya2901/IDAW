<?php
session_start();

// Déconnecter l'utilisateur en détruisant la session
session_destroy();

// Rediriger vers la page de connexion
header('Location: login.php');
exit;

?>
