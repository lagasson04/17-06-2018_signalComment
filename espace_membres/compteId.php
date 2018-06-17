<?php 
//connexion
try {
	$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
$nom = $bdd->query('SELECT pseudo FROM membres');
while ($nomId = $nom->fetch())
{
	
	if (strtolower($_POST['pseudo']) == strtolower($nomId['pseudo'])) {
		?>
		<p>Ce pseudo est déjà utilisé, veuillez en choisir un autre svp!!!</p>
		
		<p>Vous allez être redirigé sur la page d'inscription</p>
		<META HTTP-EQUIV="Refresh" CONTENT="4; URL=inscription.php">
		<?php
		exit();
	}
}

?>