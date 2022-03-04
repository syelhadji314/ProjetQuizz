<?php
require_once(PATH_SRC."modeles".DIRECTORY_SEPARATOR."users.modeles.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action']=="connexion") {
                require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
                // echo"Traiter le formulaire de connexion";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        if (isset($_REQUEST['action'])) {
            if (!is_connect()) {
                header("location:".WEB_ROOT);
                exit();
            }
            if ($_REQUEST['action']=="accueil") {
                if (is_admin()) {
                    lister_joueur();
                }elseif (is_joueur()) {
                    jeu();
                }
            }elseif ($_REQUEST['action']=="liste.joueur") {
                lister_joueur();
            }
        }
    }
    function lister_joueur() {
        // Appel du midele
        ob_start();
            $data = find_users("ROLE_JOUEUR");
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."liste.joueur.html.php");
        $content_for_views=ob_get_clean();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    }
    function jeu() {
        // Appel du midele
        ob_start();
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."jeu.html.php");
            $content_for_views=ob_get_clean();
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    }