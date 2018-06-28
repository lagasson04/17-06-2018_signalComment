<?php session_start(); ?>
<?php $title = 'ModifyPost'; ?>
<?php ob_start(); ?>
<?php $post = getPost($_GET['idp']); ?>
<h2>Modifier un chapitre</h2>
<div class="modify">
	<form action="index.php?action=modifiedPost" method="post">
		<div>
			<label for="title">Titre</label><br />
			<input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" />
		</div>
		<div>
			<label for="content">Contenu</label><br />
			<textarea id="content" name="content" required="required"><?= htmlspecialchars($post['content']) ?></textarea>
		</div>
		<div>
			<input type="submit" value="Modifier" />
		</div>
	</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>