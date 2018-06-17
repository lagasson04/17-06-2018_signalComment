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
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<h1>Bienvenue sur la page d'inscription</h1>
	<p>Pour vous inscrire, veuillez saisir les informations ci-dessous : </p><br />

		<form action="insert_bdd.php" method="POST">
			<p>
				<p><label>Pseudo* : <input type="text" name="pseudo" required="required"></label></p>
				<p><label>Adresse mail* : <input type="email" name="email" required="required"></label></p>
				<p><label>Mot de passe* : <input type="password" name="pass" required="required"></label></p>
				<p><label>Confirmez le mot de passe* : <input type="password" name="repass" required="required"></label></p>

				<p><input type="submit" name="valider" value="Valider"></p>
		</p>
	</form>

</body>

<a href="index.php">Retour</a>
<?php
}
?>
</html>