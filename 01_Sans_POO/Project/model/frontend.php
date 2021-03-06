<?php
function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, SUBSTRING(content, 1, 50) AS extractString, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh %imin %ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

    return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh %imin %ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, post_id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh %imin %ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC LIMIT 0, 6');
    $comments->execute(array($postId));

    return $comments;
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function postComment($postId, $author, $comment)
{
    $db = dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
//echo $affectedLines;
        return $affectedLines;
}

function getComment($commentId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, post_id, author, comment FROM comments WHERE id = ?');
    $req->execute(array($commentId));
    $comment = $req->fetch();

    return $comment;
}

function validModifComment($newComment, $idc)
{

    // echo $idc . ' ' . $idc . ' ' . $newComment;
    $db = dbConnect();
    $req = $db->prepare('UPDATE comments SET comment = :newComment WHERE id = :idc');
    $req->execute(array(
        'newComment' => $newComment,
        'idc' => $idc
    ));
    
}

function reportComment($idc)
{
    $db = dbconnect();
    $req = $db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
    $affectedLines = $req->execute(array($idc));

    return $affectedLines;
}