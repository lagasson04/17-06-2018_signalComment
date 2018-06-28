<?php session_start(); ?>
<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<hr />
<hr />
<form action="index.php?action=addPost" method="post">
	<input class="btn btn-success col-lg-12" type="submit" value="Ajouter un chapitre">
</form>
<hr />
<hr />
<?php $posts = getPosts();
while ($data = $posts->fetch())
{
$text = nl2br(htmlspecialchars($data['content']));
?>
	<table class="table table-striped"> 
		<tr>
			<th style="width:25%;">Titre</th>
			<th style="width:25%;">Contenu</th>
			<th style="width:25%;">Date</th>
			<th style="width:25%;">Action</th>
		</tr>
		<tr>
			<td><?= htmlspecialchars($data['title']) ?></td>
			<td><?= shortenText($text, 50) ?><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire plus</a></td>
			<td>le <?= $data['creation_date_fr'] ?></td>
			<td class="row"><form action="index.php?action=modifPost&amp;idp=<?= $data['id'] ?>" method="post">
				<input class="btn btn-primary" type="submit" value="Modifier">
			</form>
			<form action="index.php?action=deletedPost&amp;idp=<?= $data['id'] ?>" method="post">
				<input class="btn btn-danger" type="submit" value="Supprimer">
			</form></td>
		</tr>
	</table>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>