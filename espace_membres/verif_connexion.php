<?php 

$pseudo = $_POST['pseudo'];

try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
    ?>

    <p>Mauvais identifiant ou mot de passe !</p>
    <a href="connexion.php">Retour</a>
    <?php 
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
        ?>
        <p><META HTTP-EQUIV="Refresh" CONTENT="3; URL=vueSite.php">Vous allez être redirigé dans quelques secondes....</p>
        <?php 
    }
    else {
        ?>
        <p>Mauvais identifiant ou mot de passe !</p>
        <a href="connexion.php">Retour</a>
        <?php 


    }
}
