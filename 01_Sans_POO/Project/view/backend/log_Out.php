<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');
$title = "Deconnexion"; ?>
<?php ob_start(); ?>
<?= "Vous vous êtes bien déconnecté(e)!!!"; ?>
<META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php">
<p>Vous allez être redirigé vers la page d'accueil dans quelques secondes....</p>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
