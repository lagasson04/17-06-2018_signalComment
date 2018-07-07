<?php $title = 'Moderation'; ?>
<?php ob_start(); ?>

<h1>Gestion des commentaires</h1><br/>
<p>
<?php
while ($comment = $comments->fetch())
{
	?>
	<div class="comment">
		<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
		<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
		<p>
			<div class="row">
				<div class="col-lg-2">
					<form action="#" method="post">
						<input class="btn btn-success" type="submit" value="Modérer">
					</form>
				</div> 
				<div class="col-lg-offset-2 col-lg-2"> 
					<form action="#" method="post">
						<input class="btn btn-danger" type="submit" value="Supprimer">
					</form>
				</div>
			</div>
		</p> 
	</div>
</p>
<?php 
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>