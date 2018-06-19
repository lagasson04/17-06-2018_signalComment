
<?php require('head.php'); 

?>

<header><h1><strong class="titre">Inscription</strong></h1></header>
<body>
	<h2>Veuillez remplir tous les champs pour pouvoir vous inscrire et accéder à l'espace privé</h2>
	<div class="container">
		<div class="row">
			<form class="col-lg-offset-3 col-lg-6" action="inscription_post.php" method="post">
				<div class="form-group">
					<label for="pseudo">Pseudo*</label>
					<input type="text" class="form-control" name="pseudo" id="pseudo" required="required" placeholder="Votre pseudo">
				</div>
				<div class="form-group">
					<label for="pass">Mot de passe*</label>
					<input type="password" class="form-control" name="pass" id="pass" required="required" placeholder="Mot de passe">
				</div>			
				<div class="form-group">
					<label for="repass">Retapez votre mot de passe*</label>
					<input type="password" class="form-control" name="repass" id="repass" required="required" placeholder="Retapez votre mot de passe">
				</div>
				<div class="form-group">
					<label for="email">Adresse email*</label>
					<input type="email" class="form-control" id="email" required="required" aria-describedby="emailHelp" placeholder="Saisissez votre email ici">
					<small id="emailHelp" class="form-text text-muted">Nous ne transmettrons jamais votre email.</small>
				</div>
				<button type="submit" class="pull-right btn btn-danger" name="envoyer"><span class="glyphicon glyphicon-ok-sign"> </span> Envoyer</button>
			</form>
		</div>
		<div class="row">
			<p><a href="index.php">Retour à l'accueil</a></p>
		</div>
	</div>

</body>
