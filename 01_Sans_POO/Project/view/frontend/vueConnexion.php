<?php session_start(); ?>
<?php $title = "Connexion"; ?>
<?php ob_start(); ?>
<header><h1>Connexion</h1></header>
	<div class="container">
		<div class="row">
			<form class="col-lg-offset-3 col-lg-6" action="index.php?action=connectTest" method="post">
				<!-- on envoi vers l'action de test de la connexion du routeur -->
				<div class="form-group">
					<label for="pseudo">Pseudo*</label>
					<input type="text" class="form-control" name="login" id="login" required="required" placeholder="Votre pseudo" value="<?php  if (isset($_SESSION['login'])) {echo $_SESSION['login'];} ?>">
				</div>
				<div class="form-group">
					<label for="pass">Mot de passe*</label>
					<input type="password" class="form-control" name="pass" id="pass" required="required" placeholder="Mot de passe" value="<?php  if (isset($_SESSION['pass'])) {echo $_SESSION['pass'];} ?>">
				</div>
				<button type="submit" class="pull-right btn btn-danger" name="envoyer"><span class="glyphicon glyphicon-ok-sign"> </span> Envoyer</button>
			</form>
		</div>
	</div>			
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
