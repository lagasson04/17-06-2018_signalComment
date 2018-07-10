<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
	<h3>
		<?= $post['title'] ?>
		<em>le <?= $post['creation_date_fr'] ?></em>
	</h3>

	<p>
		<?= nl2br($post['content']) ?>
	</p>
</div>

<h2>Commentaires</h2>

<?php
while ($comment = $comments->fetch())
{
	?>
	<div class="comment">
		<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?><a href="index.php?action=updateComment&amp;idc=<?= $comment['id'] ?>&amp;idp=<?= $comment['post_id'] ?>"> (modifier)</a></p>
		<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
		<p><a href="index.php?action=reportCom&amp;idc=<?=$comment['id'] ?>&amp;idp=<?=$comment['post_id'] ?>"> Signaler !!</a> <?= $comment['report'] ?></p> 
		<p><?php 
		if (isset($comment['report']) && $comment['report'] == 1) {
			echo  "<strong>Commentaire signalé !!!</strong>";
		} ?></p>
	</div>
	<!-- <?php var_dump($comment) ?> -->
	<?php 

}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<div class="container">
<h2>Ajouter des commentaires</h2>
<div class="comment">
	<form action="index.php?action=addComment&amp;id=<?=$post['id'] ?>" method="post">
		<div>
			<label for="author">Auteur</label><br />
			<input type="text" id="author" name="author" required="required" />
		</div>
		<div>
			<label for="comment">Commentaire</label><br />
			<textarea id="comment" name="comment" required="required"></textarea>
		</div>
		<div>
			<input type="submit" />
		</div>
	</form>
</div>
</div>