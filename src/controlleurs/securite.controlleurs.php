<?php
require_once(PATH_SRC."modeles".DIRECTORY_SEPARATOR."users.modeles.php");
/**
 * Traitement des Requetes POST
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {
            $login = $_POST['login'];
            $password = $_POST['password'];
            connexion($login, $password);
        }
    }
}
/**
 * Traitement des Requetes GET
 */
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "connexion") {
            require_once(PATH_VIEWS . "securite" . DIRECTORY_SEPARATOR . "connexion.html.php");
        }else if ($_REQUEST['action']=="deconnexion") {
            logout();
        }
    }
    require_once(PATH_VIEWS . "securite" . DIRECTORY_SEPARATOR . "connexion.html.php");
}
//validation des donnees
function connexion(string $login, string $password): void
{
    $errors = [];
    //cette fonction est définie dans validator
    champ_obligatoire("login", $login, $errors, "Login obilgatoire");
    if (!isset($errors['login'])) {
        valid_email("login", $login, $errors);
    }
    champ_obligatoire("password", $password, $errors);
    if (!isset($errors['password'])) {
        valid_password("password", $password, $errors);
    }
    if (count($errors) == 0) {
        $userConnect = find_user_login_password($login, $password);
        if (count($userConnect) != 0) {
            #l'utilisateur existe.
            $_SESSION[KEY_USER_CONNECT] = $userConnect;
            header("location:".WEB_ROOT."?controlleur=user&action=accueil");
            exit();
        } else {
            $errors['connexion'] = "Login ou Mot de passe incorrect";
            $_SESSION[KEY_ERRORS] = $errors;
            header("location:" . WEB_ROOT);
            exit();
        }
    } else {
        //ERREURS DE VALIDATION
        $_SESSION[KEY_ERRORS] = $errors;
        header("location:" . WEB_ROOT);
        exit();
    }
}

//fonction de déconnexion
function logout(){
    $_SESSION[KEY_USER_CONNECT] = array();
    session_destroy();
    unset($_SESSION[KEY_USER_CONNECT]);
    header("location:" . WEB_ROOT);
    exit();
}
