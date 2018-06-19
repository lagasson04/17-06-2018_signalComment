<?php 

require('head.php');
?>
<header><h1>Bienvenue sur l'espace membres</h1>
</header>
<body>
	<div class="container">
		<h2>Un site qui vous parle de lorem ipsum</h2>
		<div id="lorem">
			<p style="text-align: justify; font-size: large;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
		<p style="font-size: large;">Bonjour, si vous souhaitez acceder au site, veuillez vous connecter en cliquant sur le bouton connexion ci-dessous :</p>
		<form method="post" action="vueConnexion.php">
			<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok-sign"> </span> Connexion</button>
		</form><br />
		<p style="font-size: large;">Sinon veuillez vous inscrire en cliquant sur le bouton d'incription ci-dessous : </p>
		<form method="post" action="vueInscription.php">
			<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok-sign"> </span> Inscription</button>
		</form><br />
	</div>
</body>

