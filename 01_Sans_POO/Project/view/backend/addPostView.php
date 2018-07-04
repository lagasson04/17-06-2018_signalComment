<!-- <?php session_start(); ?> -->
<?php $title = 'AddPost'; ?>
<?php ob_start(); ?>
<h2>Ajouter un chapitre</h2>
<div class="comment">
	<form action="index.php?action=adPost" method="post">
		<div>
			<label for="title">Titre</label><br />
			<input type="text" id="title" name="title" required="required" />
		</div>
		<div>
			<label for="content">Contenu</label><br />
			<textarea id="content" name="content" required="required"></textarea>
		</div>
		<div>
			<input type="submit" value="Ajouter" />
		</div>
	</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>