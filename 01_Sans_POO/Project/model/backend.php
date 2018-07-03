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
	
	return $isPasswordCorrect;
	
}
function postPost($title, $content)
{
    $db = dbConnect();
    $adPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (?, ?, NOW())');
    $affectedLines = $adPost->execute(array($title, $content));
    return $affectedLines;
}

function shortenText($text, $size) {
    if (strlen($text) > $size)
        return substr($text, 0, $size).' ';
    return $text;
}

function modifyPost($title, $content, $postId)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
    $req->execute(array($title, $content, $postId)); 
}

function deletePost($idp) {
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM posts WHERE id = ?');
	$isDeleted = $req->execute(array($idp));
	return $isDeleted;
}

