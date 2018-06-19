<?php

require('controller/frontend.php');
require('controller/backend.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'updateComment') {
            if (isset($_GET['idc']) && $_GET['idc'] > 0) {
                updateComment($_GET['idc'], $_GET['idp']);
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'validComment'){
            if (isset($_POST['comment'])) {
                validComment($_POST['comment'], $_POST['idc'], $_POST['idp']);
                // var_dump($_POST);
                // echo $oldComment;

            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun update de commentaire envoyé');
            }
        }

        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
// Signalement commentaire------>
        elseif ($_GET['action'] == 'reportCom'){
            if (isset($_GET['idc'])) {
                reportCom($_GET['idc'], $_GET['idp']);

            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun signalement de commentaire envoyé');
            }
        }
//--------->FIN

        elseif ($_GET['action'] == 'connectionView'){
            showConnectionPage();

        }        

        elseif ($_GET['action'] == 'adminView'){
            showAdminPage();

        }

        elseif ($_GET['action'] == 'out'){
            logOut();

        }
         
//-------> Ajout de l'action pour tester la connexion
        elseif ($_GET['action'] == 'connectionTest'){
            if (isset($_POST['login']) && isset($_POST['pass'])) {
                getConnection($_POST['login'], $_POST['pass']);
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
echo 'Erreur : ' . $e->getMessage();
}
