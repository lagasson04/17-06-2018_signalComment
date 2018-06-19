<?php $title = "Connexion"; ?>
<?php 
session_start();
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
	echo 'Bonjour ' . $_SESSION['pseudo'];
	header('location: index.php');
}
else 
{
?>
<?php ob_start(); ?>
<header><h1>Connexion</h1></header>
	<div class="container">
		<div class="row">
			<form class="col-lg-offset-3 col-lg-6" action="verif_connexion.php" method="post">
				<!-- on envoi vers l'action de test de la connexion du routeur -->
				<div class="form-group">
					<label for="pseudo">Pseudo*</label>
					<input type="text" class="form-control" name="pseudo" id="pseudo" required="required" placeholder="Votre pseudo" value="<?php  if (isset($_COOKIE['login'])) {echo $_COOKIE['login'];} ?>">
				</div>
				<div class="form-group">
					<label for="pass">Mot de passe*</label>
					<input type="password" class="form-control" name="pass" id="pass" required="required" placeholder="Mot de passe" value="<?php  if (isset($_COOKIE['pass_hache'])) {echo $_COOKIE['pass_hache'];} ?>">
				</div>
				<button type="submit" class="pull-right btn btn-danger" name="envoyer"><span class="glyphicon glyphicon-ok-sign"> </span> Envoyer</button>
			</form>
		</div>
	</div>			
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
<?php
}
?>