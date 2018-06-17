<?php $title = 'Mon Blog 12'; ?>
<?php ob_start(); ?>

<h1>Mon petit Blog 12 !!!</h1>
<p>Liste des derniers billets :</p>
<?php 
while ($data = $posts->fetch()) 
{
?>
	<div class="news">
		<h3>
			<?= htmlspecialchars($data['title']) ?>
			<em>le <?= ($data['creation_date_fr']) ?></em>

		</h3>

		<p>
			<!-- On affiche le contenu du billet -->
			<?= nl2br(htmlspecialchars($data['content'])) ?>
			<br />
			<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
		</p>
	</div>
<?php
}
$posts->closeCursor(); 
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');