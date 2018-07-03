<?php
function connectionTest($login, $pass) {
	//si la connexion marche, on envoi vers l'espace d'administration. Sinon on renvoi vers la vue de connexion
	$trueConnection = getConnection($_POST['login'], $_POST['pass']); 
	if ($trueConnection === false) {
		die('Impossible de vous connecter !');
	}
	else  {
		session_start();
		//$_SESSION['id'] = $result['id'];
		$_SESSION['login'] = $login;
		$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$_SESSION['pass_hache'] = $pass_hache;
		$_SESSION['pass'] = $_POST['pass'];
		require('view/backend/trueConnectionView.php'); 
	}

}

function showAdminPage() {
	$posts = getPosts();
	require('view/backend/adminViewPage.php');
}

function logOut() {
	require('view/backend/log_Out.php');
}

function adPostView() {
	require('view/backend/addPostView.php');
}

function adPost($title, $content) {

	$apost = postPost($title, $content);
	if ($apost === false) {
		die('Impossible d\'ajouter le chapitre !');
	}
	else {
		header('Location: index.php?action=adminView');
	}
}

function modifPostView($idp) {
	$post = getPost($idp);
	require('view/backend/modifyPostView.php');
}

function modifiedPost($title, $content, $idp) {

	$modPost = modifyPost($title, $content, $idp);
	if ($modPost === false) {
		die('Impossible de modifier le chapitre !');
	}
	else {
		header('Location: index.php?action=adminView');
	}
}

function deletedPost($postId) {

	$del = deletePost($postId);
	if ($del === false) {
		die('Impossible de supprimer le chapitre !');
	}
	else {
		header('Location: index.php?action=adminView');
	}
}
