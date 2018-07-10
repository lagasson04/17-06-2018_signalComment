<?php session_start(); ?>
<?php $title = 'ModifyPost'; ?>
<?php ob_start(); ?>
<h2>Modifier un chapitre</h2>
<div class="modify">
	<form action="index.php?action=modifiedPost&amp;postId=<?= $_GET['postId'] ?>" method="post">
		<div>
			<label for="title">Titre</label><br />
			<input type="text" id="title" name="title" value="<?= $post['title'] ?>" />
		</div>
		<div>
			<label for="content">Contenu</label><br />
			<textarea id="mytextarea" name="content" required="required"><?= $post['content'] ?></textarea>
		</div>
		<div>
			<input type="submit" value="Modifier" id="mytextarea" />
		</div>
	</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>