<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<h1>Liste des Chapitres</h1><br />
<?php 
while ($data = $posts->fetch())
{
$text = nl2br(htmlspecialchars($data['content']));
?>
<div class="col-lg-12">
	<table class="table table-striped"> 
		<tr>
			<th>Titre</th>
			<th>Contenu</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		<tr>
			<td><?= htmlspecialchars($data['title']) ?></td>
			<td><?= shortenText($text, 20) ?><a href="index.php?action=post&amp;id=<?= $data['id'] ?>"> ...Lire plus</a></td>
			<td>le <?= $data['creation_date_fr'] ?></td>
			<td class="row"><form action="index.php?action=modifPost&amp;postId=<?= $data['id'] ?>" method="post">
				<input class="btn btn-primary" type="submit" value="Modifier">
			</form>
			<form class="col-lg-2" action="index.php?action=deletedPost&amp;idp=<?= $data['id'] ?>" method="post">
				<input class="btn btn-danger" type="submit" value="Supprimer">
			</form></td>
		</tr>
	</table>
</div>
<?php
}
$posts->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>