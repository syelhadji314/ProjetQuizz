<?php
        // Le controleur charge le model
    require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR."user.model.php" );

        // Avec une requete POST generalemnt on charge les données d'un formulaire
        // var_dump($_SERVER["REQUEST_METHOD"]);die;

        // Verification du type de requete
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        // echo("La requete est de type POST");
        if (isset($_REQUEST["action"])) {
            // L'action a executer
            $action=$_REQUEST["action"];
            var_dump($action);die;
            switch ($action) {
                case 'accueil':
                    require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");

                    // echo("Bienvenu sur la page d'accueil");
                break;

                default:
                    # code...
                break;
            }
        }

        
    }
    // Avec une requete GET generalemnt on charge une page
    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        // echo("La requete est de type GET");
        if (isset($_REQUEST["action"])) {
            // Vérification de la connexion de l'utilisateur avant l'action
        if (!is_connect()) {
            // die("non connecter");
            header("location:".WEB_ROOT);
            exit();
        }

        switch ( $_REQUEST["action"]) {
            case 'accueil':
                if (Administrateur()) {
                    listeJoueur(); 

                }elseif (Joueur()) {
                    jeu();

            // ;     LesQuestion();

                }
                break;

                case 'liste.Joueur':

                    listeJoueur();
                    break;
                    case 'liste.question':
                        LesQuestion();
                        // echo("Liste des question");
                        break;

                        case 'inscription':
                            inscritAdmin();
                            // echo("Liste des question");
                            break;
                            case 'creeQuestion':
                                Question();
                                break;

            default:
                # code...
                break;
        }
    }

    }
    // Liste des joueurs
    function listeJoueur(){
        // chargement temporaire du contenu d'un fichier
        ob_start();
        // Appel du model
        $donnees=listeDesUtilisateurs("PROFIL_JOUEUR");
        // appelle fonction pagination
        
        $page = (!empty($_GET['page']) && $_GET['page'] > 0) ? intval($_GET['page']) : 1;

        $limit = 10;
        $totalPages = ceil(count($donnees) / $limit);

        $page = max($page, 1);
        $page = min($page, $totalPages);

        $offset = ($page - 1) * $limit;
        $offset = ($offset < 0) ? 0 : $offset;

        $donnees = array_slice($donnees, $offset, $limit); 
        // Chargement de la vue
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."Liste.joueurs.html.php");
        $contenu_vues=ob_get_clean();
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
    }
    // *************************************
    function LesQuestion(){
        // chargement temporaire du contenu d'un fichier
        ob_start();
        // Appel du model
        $donnees=listeDesQuestion("questions");
        // Chargement de la vue
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."Liste.question.html.php");
        $contenu_vues=ob_get_clean();
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
    }
    // ***********************
    function jeu(){
        // chargement temporaire du contenu d'un fichier
        ob_start();
        // Appel du model
        // $donnees=listeDesUtilisateurs("PROFIL_JOUEUR");
        // Chargement de la vue
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."jeu.html.php");
        $contenu_vues=ob_get_clean();
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");

    }
    // ********************************************
    function Question(){
        // chargement temporaire du contenu d'un fichier
        ob_start();
        require_once(DOSSIER_TEMPLATES."question".DIRECTORY_SEPARATOR."creeQuestion.html.php");
        $contenu_vues=ob_get_clean();
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
    }
    // **********************************************
    function inscritAdmin(){
        // chargement temporaire du contenu d'un fichier
        ob_start();
        require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."inscription.html.php");
        $contenu_vues=ob_get_clean();
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
    }
        //***************pagination**************** */

    function pagination (int $limit, array $tab) {
        /* if(isset($_GET['page'])) {
            
            $pageActuelle = intval($_GET['page']);
            
            if($pageActuelle > $totalPages){
                $pageActuelle = $totalPages;
            }
        }
        else {
            $pageActuelle = 1; // La page actuelle est la n°1     
            
        } */
        $pageActuelle = (isset($_GET['page']) && $_GET['page'] > 0) ? intval($_GET['page']) : 1;

        $nbrEltTab = count($tab);
        $totalPages = ceil($nbrEltTab/$limit);

        $pageActuelle = max($pageActuelle, 1);
        $pageActuelle = min($pageActuelle, $totalPages);
        
        $decale = ($pageActuelle - 1) * $limit;
        $decale = ($decale < 0) ? 0 : $decale;
        // var_dump($decale);die();
        
        $donnees = array_slice($tab, $decale, $limit);
        return $donnees;
    }