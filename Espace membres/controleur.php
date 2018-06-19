<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}



// Vérification de la validité des informations


// Hachage du mot de passe
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// Insertion
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
	'pseudo' => $pseudo,
	'pass' => $pass_hache,
	'email' => $email));


//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
	'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
	echo 'Mauvais identifiant ou mot de passe !';
}
else
{
	if ($isPasswordCorrect) {
		session_start();
		$_SESSION['id'] = $resultat['id'];
		$_SESSION['pseudo'] = $pseudo;
		echo 'Vous êtes connecté !';
	}
	else {
		echo 'Mauvais identifiant ou mot de passe !';
	}
}