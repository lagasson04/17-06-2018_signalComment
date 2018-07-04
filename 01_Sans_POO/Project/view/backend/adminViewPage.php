<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<h1>Tableau de bord</h1>
<div class="separation"><hr></div>
<form action="index.php?action=addPost" method="post">
	<input class="btn btn-success col-lg-12" type="submit" value="Ajouter un chapitre">
</form>
<div class="separation"><hr></div>
<form action="index.php?action=showModifPage" method="post">
	<input class="btn btn-warning col-lg-12" type="submit" value="Modifier ou supprimer un chapitre">
</form>
<div class="separation"><hr></div>
<form action="#" method="post">
	<input class="btn btn-danger col-lg-12" type="submit" value="Modérer les commentaires">
</form>
<div class="separation"><hr></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>