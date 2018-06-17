<?php
	if (isset($_POST['pseudo']) AND isset($_POST['pass'])) 
	{
		setcookie('login', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
		setcookie('pass_hache', $_POST['pass'], time() + 365*24*3600, null, null, false, true);
	}
require ('compteId.php');
if (isset($_POST['pass']) AND isset($_POST['repass']) AND $_POST['pass'] == $_POST['repass']) {

//connexion à la base de donnée
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}


// Hachage du mot de passe
	$pseudo = $_POST['pseudo'];
	$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$email = $_POST['email'];


// Insertion
	$requete = $bdd->prepare('INSERT INTO membres (pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');
	$requete->execute(array(
		'pseudo' => $pseudo,
		'pass' => $pass_hache,
		'email' => $email));
		?>
		<p>Merci, votre inscription à bien été prise en compte, vous allez être redirigé(e) vers la page de connexion dans quelques secondes...</p>
		<p><META HTTP-EQUIV="Refresh" CONTENT="4; URL=connexion.php">
			<?php
		}

		else {
			require ('inscription.php');
			echo '<p style="color: red;"> Les 2 mots de passe doivent être identiques !!!</p>';
		}
