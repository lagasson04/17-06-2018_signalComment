<?php 
session_start();
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
	echo 'Bonjour ' . $_SESSION['pseudo'];
	header('location: vueSite.php');
}
else 
{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Connexion</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Bienvenue sur la page de connexion</h1>

		<p>Veuillez saisir les informations ci-dessous : </p><br />
		<form action="verif_connexion.php" method="POST">
			<p>
				<p><label>Pseudo* : <input type="text" name="pseudo" required="required" value="<?php  if (isset($_COOKIE['login'])) {echo $_COOKIE['login'];} ?>"></label></p>
				<p><label>Mot de passe* : <input type="password" name="pass" required="required" value="<?php  if (isset($_COOKIE['pass_hache'])) {echo $_COOKIE['pass_hache'];} ?>"></label></p>
				<p><label>Connexion automatique <input type="checkbox" name="case" checked></label></p>
				<p><input type="submit" name="validation" value="Se connecter"></p>
			</p>
		</form>

	</body>

	<a href="index.php">Retour</a>
	<?php
}
?>
</html>

