<?php 
function getConnection($login, $pass){
	//on teste si le couple login/pass existe dans la bdd 
	//si oui on renvoi 1 si ça existe, sinon on renvoi 0

	//  Récupération de l'utilisateur et de son pass hashé
	$login = $_POST['login'];
	$db = dbConnect();
	$req = $db->prepare('SELECT id, pass FROM users WHERE login = :login');
	$req->execute(array(
		'login' => $login));
	$result = $req->fetch();
	$isPasswordCorrect = password_verify($_POST['pass'], $result['pass']);

	if (!$result)
	{
		?>

		<p>Mauvais identifiant ou mot de passe !</p>
		<a href="index.php?action=connectionView">Retour</a>
		<?php 
	}
	else
	{
		if ($isPasswordCorrect) {
			session_start();
			$_SESSION['id'] = $result['id'];
			$_SESSION['login'] = $login;
			echo 'Vous êtes connecté !';
			?>
			<p><META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php?action=adminView">Vous allez être redirigé dans quelques secondes....</p>
			<?php 
		}
		else {
			?>
			<p>Mauvais identifiant ou mot de passe !!</p>
			<a href="index.php?action=connectionView">Retour</a>
			<?php 


		}
	}
}
