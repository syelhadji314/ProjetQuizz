<?php
require_once(PATH_SRC."modeles".DIRECTORY_SEPARATOR."users.modeles.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action']=="connexion") {
                $login = $_POST['login'];
                $password = $_POST['password'];
                connexion($login,$password);
            }
        }
    }
    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        if (isset($_REQUEST['action'])) {
            if ($_REQUEST['action']=="connexion") {
                require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            }
        }else {
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            // echo"salut";
        }

    }


    function connexion(string $login,string $password):void{
        $errors = [];
            champ_obligatoire('login',$login,$errors,"Login obligatoire");
            if (count($errors)==0) {
                valid_email('login',$login,$errors);
            }
            champ_obligatoire('password',$password,$errors);
            if (count($errors)==0) {
                // Appel d'une fonction du modele
                $user=find_user_login_password($login,$password);
                if (count($user)!=0) {
                    // Utilisateur existe
                    $_SESSION['KEY_USER_CONNECT']=$user;
                    
                }else {
                    // L'utilisateur n'existe pas
                    $errors['connexion']="Login ou mot de passe incorrect";
                    $_SESSION['KEY_ERRORS']=$errors;
                    header("location:".WEB_ROOT."?controlleur=user&action=accueil");
                    exit();
                }
            }else {
                // Erreur de validation
                $_SESSION['KEY_ERRORS']=$errors;
                header("location:".WEB_ROOT);
                exit();
            }
    }