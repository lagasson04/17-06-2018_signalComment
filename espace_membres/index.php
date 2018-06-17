<!DOCTYPE html>
<html>
<head>
	<title>Espace membre</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
</head>
<body>
	<h1>Bienvenue sur mon espace membres</h1>
	<p><strong>Bienvenue sur mon site internet</strong>.<br /> <br />Veuillez vous enregistrer ou bien vous connecter pour pouvoir accéder au contenu du site.</p><br />
	<p>
		
		Pour vous inscrire, cliquez sur le bouton ci-dessous et laissez-vous guider.
		<form action="inscription.php" method="POST">
			<p><input type="submit" name="inscription" value="Inscription"></p>
		</form><br />
		Si vous êtes déjà inscrit, veuillez vous identifier en cliquant sur le bouton ci-dessous :
		<form action="connexion.php" method="POST">
			<p><input type="submit" name="connexion" value="Connexion"></p>
		</form>
		
	</p>
</body>
</html>