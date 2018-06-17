<?php 
session_start();
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bienvenue</title>
	<meta charset="utf-8">
</head>
<body>
<h1>Bienvenue sur mon site</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus delectus, voluptate consectetur sunt ad ex officiis, sequi reprehenderit repudiandae doloremque asperiores non aperiam nemo. Quibusdam facilis repellendus placeat doloribus provident!<br />
Lorem ipsum dolor sit amet, consectetur adipisicing elit. At ex modi delectus, consectetur tempora quasi non possimus mollitia sint ad magnam quae asperiores, excepturi dolorem facere! Unde, voluptates laboriosam! Quis.</p>

<form action="deconnexion.php" method="POST">
	<input type="submit" name="deconnexion" value="Deconnexion">
</form>
</body>
</html>