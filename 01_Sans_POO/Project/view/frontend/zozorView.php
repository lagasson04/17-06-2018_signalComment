<?php $title = 'zozor'; ?>
<?php ob_start(); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<p><img src="public/img/zozor4.jpg" class="img-fluid" id="zozor" alt="zozor" width="552" height="414"></p>
		</div>
	</div>
	<p id="textzozor">Veuillez-vous connecter pour accéder à l'espace Administration...</p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>