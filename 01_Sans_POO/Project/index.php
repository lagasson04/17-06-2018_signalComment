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

//-------> Ajout de l'action pour la vue connexion
        elseif ($_GET['action'] == 'connectionView'){
            showConnectionPage();
        }  
//--------->FIN

//-------> Ajout de l'action pour tester la connexion
        elseif ($_GET['action'] == 'connectTest'){
            if (isset($_POST['login']) && isset($_POST['pass'])) {
                connectionTest($_POST['login'], $_POST['pass']);
            }
            else {
                throw new Exception('Identifiant ou mot de passe incorrect!!!');
            }
            
        }   
//--------->FIN

//-------> Ajout de l'action pour la vue admin
        elseif ($_GET['action'] == 'adminView'){
            if (session_start() && isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                showAdminPage();
            }
            else {
                session_destroy();
                zozor();
            }
        }    
//--------->FIN

//-------> Ajout de l'action pour la vue du tableau pour modifier ou supprimer un chapitre
        elseif ($_GET['action'] == 'showModifPage'){
            if (session_start() && isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                showModifPage();
            }
            else {
                session_destroy();
                zozor();
            }
        }
//--------->FIN

//-------> Ajout de l'action pour la vue de l'ajout de chapitre
        elseif ($_GET['action'] == 'addPost'){
         if (session_start() && isset($_SESSION['login']) && isset($_SESSION['pass'])) {
            adPostView();
        }
        else {
            session_destroy();
            zozor();
        }

    }
//--------->FIN

//-------> Ajout de l'action pour l'ajout de chapitre
    elseif ($_GET['action'] == 'adPost'){
        if (isset($_POST['title']) && isset($_POST['content']) && !empty($_POST['content'])) {
            adPost($_POST['title'], $_POST['content']);
        }
        else {
            header('Location: index.php?action=addPost');
        }
    }
//--------->FIN

//-------> Ajout de l'action pour la vue de modification de chapitre
    elseif ($_GET['action'] == 'modifPost'){
        modifPostView($_GET['postId']);
    }
//--------->FIN

//-------> Ajout de l'action pour la modification de chapitre
    elseif ($_GET['action'] == 'modifiedPost') {
        if (isset($_POST['title']) && isset($_POST['content'])) {
            modifiedPost($_POST['title'], $_POST['content'], $_GET['postId']);

        }
    }
//--------->FIN

//-------> Ajout de l'action pour la supression de chapitre
    elseif ($_GET['action'] == 'deletedPost') {
        if (isset($_GET['idp'])) {
            deletedPost($_GET['idp']);
                //echo $_GET['idp'];
        }
    }
//--------->FIN

//-------> Ajout de l'action pour la vue des commentaires signalés
    elseif ($_GET['action'] == 'moderComment'){
        if (session_start() && isset($_SESSION['login']) && isset($_SESSION['pass'])) {
            moderComment();
        }

        else {
            session_destroy();
            zozor();
        }
    }
//--------->FIN

//-------> Ajout de l'action pour la modération des commentaires
    elseif ($_GET['action'] == 'modComment'){
        if (session_start() && isset($_SESSION['login']) && isset($_SESSION['pass']) && isset($_GET['idc'])) {
            modComment($_GET['idc']);
        }

        else {
            session_destroy();
            zozor();
        }
    }
//--------->FIN

//-------> Ajout de l'action pour la vue de la modification des commentaires
    elseif ($_GET['action'] == 'updateComment') {
        if (isset($_GET['idc']) && $_GET['idc'] > 0) {
            updateComment($_GET['idc'], $_GET['idp']);
        }
        else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
//--------->FIN

//-------> Ajout de l'action pour la modification des commentaires
    elseif ($_GET['action'] == 'validComment'){
        if (isset($_POST['comment'])) {
            validComment($_POST['comment'], $_POST['idc'], $_POST['idp']);

        }
        else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
            throw new Exception('Aucun update de commentaire envoyé');
        }
    }
//--------->FIN

//-------> Ajout de l'action pour la suppression des commentaires
    elseif ($_GET['action'] == 'delComment'){
        if (session_start() && isset($_SESSION['login']) && isset($_SESSION['pass']) && isset($_GET['idc'])) {
            delComment($_GET['idc']);
        }

        else {
            session_destroy();
            zozor();
        }
    }
//--------->FIN

//-------> Ajout de l'action pour la deconnexion
    elseif ($_GET['action'] == 'out'){
        logOut();

    }
//--------->FIN

}
else {
    listPosts();
}
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
