<?php $title = 'trueConnection'; ?>
<?php ob_start(); ?>
<?= 'Vous êtes connecté !'; ?>
<p><META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php?action=adminView">Vous allez être redirigé dans quelques secondes....</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>