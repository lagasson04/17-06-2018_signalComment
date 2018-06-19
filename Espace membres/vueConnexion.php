<?php 

require('head.php');

?>
<header><h1>Connexion</h1></header>
<body>
	<div class="container">
		<div class="row">
			<form class="col-lg-offset-3 col-lg-6" action="" method="post">
				<div class="form-group">
					<label for="pseudo">Pseudo*</label>
					<input type="text" class="form-control" name="pseudo" id="pseudo" required="required" placeholder="Votre pseudo">
				</div>
				<div class="form-group">
					<label for="pass">Mot de passe*</label>
					<input type="password" class="form-control" name="pass" id="pass" required="required" placeholder="Mot de passe">
				</div>
				<div class="form-group">
					<label>Connexion automatique</label>
					<input class="pull-right" type="checkbox" name="auto">
				</div>
				<button type="submit" class="pull-right btn btn-danger" name="envoyer"><span class="glyphicon glyphicon-ok-sign"> </span> Envoyer</button>
			</form>
		</div>
		<div class="row">
			<p><a href="index.php">Retour à l'accueil</a></p>
		</div>
	</div>			

</body>