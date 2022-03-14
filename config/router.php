<?php

// Verification de l'existence du controleur
// var_dump($_REQUEST['controleur']);die;
if (isset($_REQUEST['controleur'])) {

    // Recuperation du controleur en cas d'existence
    
// Selection du type de controleur par le router
    switch ($_REQUEST['controleur']) {
        case 'securite':
            require_once(DOSSIER_SRC."controllers".DIRECTORY_SEPARATOR."securite.controleur.php");
            break;
            case 'user':
                require_once(DOSSIER_SRC."controllers".DIRECTORY_SEPARATOR."user.controleur.php");
                break;
            case 'question':
                require_once(DOSSIER_SRC."controllers".DIRECTORY_SEPARATOR."question.controleur.php");
                break;
        // Si le controleur n'existe pas on affiche le message d'erreur
        default:
                // die("non connecter");
                header("location:".WEB_ROOT);
                exit();
                break;
    }


} else {

    // Par défaut on charge le controleur secirite
    require_once(DOSSIER_SRC."controllers".DIRECTORY_SEPARATOR."securite.controleur.php");   
}