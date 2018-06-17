<?php $title = 'Modif commentaire'; ?>

<?php ob_start(); ?>
<h2>Commentaires à modifier</h2>
<div class="comment">
<form action="index.php?action=validComment" method="post">
	<div>
		<label for="author">Auteur</label><br />
		<input type="text" id="author" name="author" value="<?= $comment['author'] ?>" disabled="disabled" />
	</div>
	<div>
		<label for="comment">Commentaire</label><br />
		<textarea id="comment" name="comment" required="required"><?= htmlspecialchars($comment['comment']) ?></textarea>
	</div>
	<input type="hidden" name="idc" value="<?= $comment['id'] ?>" />
	<input type="hidden" name="idp" value="<?= $comment['post_id'] ?>" />
	<div>
		<input type="submit" />
	</div>
</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>