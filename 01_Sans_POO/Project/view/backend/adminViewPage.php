<?php $title = 'Admin'; ?>
<?php ob_start(); ?>
<?php session_start(); 
// if (isset($_SESSION['id']) AND isset($_SESSION['login']))
// {
// 	echo 'Bonjour ' . $_SESSION['login'];
// }
// echo "<br />";
// echo "ok admin"; 
// echo "<br />";
// echo $_SESSION['id'];
// echo "<br />";
// echo $_SESSION['pass'];
// echo "<br />";
// echo $_SESSION['pass_hache'];

?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>