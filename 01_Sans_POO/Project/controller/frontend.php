<?php

require('model/frontend.php');

function listPosts()
{
	$posts = getPosts();

	require('view/frontend/listPostsView.php');
}

function post()
{
	$post = getPost($_GET['id']);
	$comments = getComments($_GET['id']);

	require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
	$affectedLines = postComment($postId, $author, $comment);
	if ($affectedLines === false) {
		die('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id=' . $postId);
	}
}

function updateComment($idc, $idp)
{
	$comment = getComment($idc);

	require('view/frontend/editCommentView.php');

	// var_dump($comment);

    // $post = getPost($_GET['id']);
    // $comments = getComments($_GET['id']);

    // require('view/frontend/postView.php');
    // echo $idc . " " . $idp;
}

function validComment($newComment, $idc, $idp)
{

	// echo $idc . ' ' . $idp . ' ' . $newComment;
/*	$oldComment = modifComment($oldComment);
	$newComment = modifComment($newComment);
	
	require('view/frontend/editCommentView.php');*/
	validModifComment($newComment, $idc);
	header('Location: index.php?action=post&id=' . $idp);
	// echo $idp;
}

function reportCom($idc, $idp)
{
	$affectedLines = reportComment($idc);
	header('Location: index.php?action=post&id=' . $idp);

}

function showConnectionPage(){
	require('view/frontend/vueConnexion.php');
}