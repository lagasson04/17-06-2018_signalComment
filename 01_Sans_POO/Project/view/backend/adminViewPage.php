<?php 
session_start();
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{
    echo 'Bonjour ' . $_SESSION['login'];
}
echo "<br />";
echo "ok admin"; 
echo "<br />";
echo $_SESSION['id'];
echo "<br />";
echo $_SESSION['pass'];

?>
<p><a href="index.php">Accueil</a></p>

<p><form action="index.php?action=out" method="POST">
	<input type="submit" name="deconnexion" value="Deconnexion">
</form></p>