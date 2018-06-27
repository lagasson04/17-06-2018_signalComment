<?php session_start(); ?>
<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<table class="table table-striped"> 
	<tr>
		<th>Titre</th>
		<th>Contenu</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td><form action="index.php?action=addPost" method="post">
			<input class="btn btn-success" type="submit" value="Ajouter">
			<a class="btn btn-primary" href="#" role="button">Modifier</a>
			<a class="btn btn-danger" href="#" role="button">Supprimer</a>
		</form></td>
	</tr>
</table>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>