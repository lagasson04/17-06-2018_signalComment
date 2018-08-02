<?php
function connectionTest($login, $pass) {
	//si la connexion marche, on envoi vers l'espace d'administration. Sinon on renvoi vers la vue de connexion
	$isPasswordCorrect = getConnection($_POST['login'], $_POST['pass']); 
	if ($isPasswordCorrect === false) {
		errorConnectionView(); 
	}
	else  {

		session_start();
		//$_SESSION['id'] = $result['id'];
		$_SESSION['login'] = $login;
		$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$_SESSION['pass'] = $_POST['pass'];
		require('view/backend/trueConnectionView.php');
	}

}

function showAdminPage() {
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
		header('Location: index.php?action=showModifPage');
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
		header('Location: index.php?action=showModifPage');
	}
}

function deletedPost($postId) {

	$del = deletePost($postId);
	if ($del === false) {
		die('Impossible de supprimer le chapitre !');
	}
	else {
		header('Location: index.php?action=showModifPage');
	}
}

function showModifPage() {
	$posts = getPosts();
	require('view/backend/showModifPage.php');
}

function moderComment () {
	$comments = moderateComment(1);
	if ($comments === false) {
		throw new Exception('Impossible de moderer le commentaire');
	}
	else {
		require('view/backend/commentAdminView.php');
	}
}
//Tester si la requête a fonctionnée (ligne 25 controller/frontend)
function modComment ($idc) {
	$affectedLines = moderatedComment($idc);
	//utiliser header comme ligne 29 controller/frontend
	$comments = moderateComment(1);
	require('view/backend/commentAdminView.php');
}

function delComment ($idc) {
	deleteComment($idc);
	//utiliser header comme ligne 29 controller/frontend
	$comments = moderateComment(1);
	require('view/backend/commentAdminView.php');
}