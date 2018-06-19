<?php
function connectionTest($login, $pass){
	//si la connexion marche, on envoi vers l'espace d'administration. Sinon on renvoi vers la vue de connexion
	$affectedLines = getConnection($login, $pass);
	if ($affectedLines === false) {
		die('Impossible de vous connecter !');
	}
	else {
		header('Location: adminViewPage.php');
	}

}

function showAdminPage(){
	require('view/backend/adminViewPage.php');
}

function logOut(){
	require('view/backend/log_Out.php');
}