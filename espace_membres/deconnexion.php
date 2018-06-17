<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');
echo "Vous vous êtes bien déconnecté(e)!!!";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<META HTTP-EQUIV="Refresh" CONTENT="4; URL=index.php">
<p>Vous allez être redirigé vers la page d'accueil dans quelques secondes....</p>
</body>
</html>

