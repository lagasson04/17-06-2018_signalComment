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
			<input type="submit" name="AddChapter" value="Ajouter un chapitre">
		</form></td>
	</tr>
</table>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>