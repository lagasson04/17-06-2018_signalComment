<?php $title = 'AddPost'; ?>
<?php ob_start(); ?>
<h1>Ajouter un chapitre</h1><br />
<div class="chapitre">
	<p><form id="formulaire" action="index.php?action=adPost" method="post">
		<div>
			<label for="title">Titre</label><br />
			<input type="text" id="title" name="title" required="required" />
		</div><br />
		<div>
			<label for="content">Contenu</label><br />
			<textarea required="required" id="mytextarea" name="content"></textarea>
		</div><br />
		<div>
			<input type="submit" value="Ajouter" onclick="javascript:verification(this.form);"/>
		</div>
	</form>
</p>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>