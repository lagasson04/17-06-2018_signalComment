<?php session_start(); ?>
<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<?php $posts = getPosts();
while ($data = $posts->fetch())
{
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
		<td><?= nl2br(htmlspecialchars($data['content'])) ?></td>
		<td>le <?= $data['creation_date_fr'] ?></td>
		<td><form action="index.php?action=addPost" method="post">
			<input class="btn btn-success" type="submit" value="Ajouter">
		</form></td>
	</tr>
</table>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>