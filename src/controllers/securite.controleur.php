<?php

// Le controleur charge le model
require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR."user.model.php" );

// Verification du type de requete
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(isset($_REQUEST["action"])){
            // Recuperation des données du user
            $login=strip_tags(trim($_POST['login'])) ;
            $password=strip_tags(trim($_POST['password']));
            $prenom=strip_tags(trim($_POST['prenom']));
            $nom=strip_tags(trim($_POST['nom']));
            $password2=strip_tags(trim($_POST['password2']));
            $_FILES['monfichier']['name'];
            $photo=$_FILES['monfichier'];
            $chemin=RACINE."public".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$_FILES['monfichier']['name'];
            // *****************************
            photoProfile($photo,$chemin);
            // ************************************
            switch ($_REQUEST["action"]) {
            case 'connexion':
                connexion($login,$password);
                // echo("Je veux me connecter");
                break;
                // ****************************Creation de compte************************************
                case 'compte':
                    inscription($nom,$prenom,$login,$password,$password2);
                //   require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php"); 
                break;
                // ********************************************
        } 
    }   
}
// *************************************************************************
// *************************************************************************

// Avec une requete GET generalemnt on charge une page
if ($_SERVER["REQUEST_METHOD"]=="GET") {
   // var_dump($_SERVER["REQUEST_METHOD"]); 

    // echo("La requete est de type GET");
    if(isset($_REQUEST["action"])){ 
        switch ($_REQUEST["action"]) {
            case 'connexion':  
                // Chargement de la page connexion
                require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            break;
            case 'inscription':
            // header("location:".DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."inscription.html.php");
                // Chargement de la page connexion
                require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."haut.inc.html.php");
                require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."inscription.html.php");
                require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."bas.inc.html.php");
                break;

            case 'deconnexion':
            // Fonctoin pour deconnecter l'utilisateur
                deconnecter();
            break;
                default:
                // die("non connecter");
                header("location:".WEB_ROOT);
                exit();
                break;  
        }  
    }
    else {
        require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");
    }
}

// ************************************************************************
// ************************************************************************
// Creation de la fonction connexion
function connexion(string $login,string $password):void{
    // validation des données qui est gerer par le validator 
    $errors=[];
    // la cle correspond au name du formulaire
    champ_obligatoire('login',$login,$errors,$message="le  Login est  obligatoire");
    // on compte le nombre d'erreur
    if (count($errors)==0) {
        // est ce que login==email
        valid_email('login',$login,$errors);   
    }
    // ***********************************************************
    champ_obligatoire('password',$password,$errors,$message="Mot de passe obligatoire");

    if (count($errors)==0) {   
        valid_password('password',$password,$errors);  
        $user=correspondance_login_password($login,$password);
        if (count($user)!=0) { 
            // die("if");
            $_SESSION['user']=$user;
            header("Location:".WEB_ROOT."?controleur=user&action=accueil");
            exit();
// Si la connexion s'est bien passé redirection vers la page d'accueil

        }else {
            // die("else");
            $errors['connexion']="Login ou mot de passe incorrect";

            $_SESSION['errors']=$errors;

            header("location:".WEB_ROOT);
            exit();
        }
    }
    else {
        // Senarios d'alternance \\Erreur de validation
        $_SESSION['errors']=$errors;
        header("location:".WEB_ROOT);
        exit();
    }
}
// Fonction deconnexion
function deconnecter(){
    session_destroy();
    session_unset();
    header("location:".WEB_ROOT);
    exit();
}
// fonction validation de compte des utilisateurs
function inscription(string $nom,string $prenom, string $login, string $password,string $password2):void{
    $errors=[];
    champ_obligatoire('prenom',$prenom,$errors,$message="Veillez saisir votre prenom");
    champ_obligatoire('nom',$nom,$errors,$message="Veillez saisir votre nom");

    champ_obligatoire('login',$login,$errors,$message="le  Login est  obligatoire");
    if (!isset($errors['login'])){
        valid_email('login',$login,$errors);
        correspondance_login('login',$login,$errors); 
    }
    champ_obligatoire('password',$password,$errors,$message="le  password est  obligatoire");
    if (!isset($errors['password'])){
        // valid_email('login',$login,$errors); 
        valid_password('password',$password,$errors); 
    }
    champ_obligatoire('password2',$password2,$errors,$message="obligatoire");
    if (!isset($errors['password2'])){
        passwordNoMatch('password2',$password,$password2,$errors); 
    } 
    
    // uploadImage($file='file');
    if (count($errors)==0) {
        $result=userArray();
        tableau_en_chaine('user', $result);
        require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");
    }else{
        $_SESSION['errors']=$errors;
        if (Administrateur()) {
            header("Location:".WEB_ROOT."?controleur=user&action=inscription");
            exit();
        }else {
            header("Location:".WEB_ROOT."?controleur=securite&action=inscription");
            exit();
        } 
    }
}
// *******************************************************************
function uploadImage($file='file'){
    $photo=$_FILES['file']["name"]."profile";
    $tmp=$_FILES['file']["tmp_name"];
    $ext = strtolower(substr(strrchr($photo, '.') ,1));
    $mes_ext=['.jpg','.png','.jpeg','.gif'];
    $chemin=RACINE."public".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR.$photo;
    // $target_file=$target_dir.basename($_FILES[$file]["name"]);

    // ***********image-file*********************
    if (empty($tmp)) {
        $errors['avatar'] = "Ce fichier n'est pas une image.";
    }
    else {
        //**********existence****************/
        if (file_exists($chemin)) {
            $errors['avatar'] = "Ce fichier existe déjà.";
        } 
        else {
            //********taille_image*************/
            if ($_FILES[$file]["size"] > 500000) {
                $errors['avatar'] = "Ce fichier est trop large.";
            } 
            else {
                /****************************format_image************************** */
                if (!in_array($ext,$mes_ext)) {
                    $errors['avatar'] = "choisseez une photo au bon format";
                    
                }else {
                    //****************enregistrement_de_l_image*****************/
                    move_uploaded_file($tmp, $chemin);
                    return "true";
                }
            }
        }
    }
}

// **********************************************************

// *************************Fonction telechargement d'image*********************************
function photoProfile($photo,$chemin){
    if (isset($photo))
{
// Testons si le fichier n’est pas trop gros
if ($photo['size'] <= 1000000)

{
// Testons si l’extension est autorisée
$infosfichier = pathinfo($photo['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
if (in_array($extension_upload, $extensions_autorisees))
{
// On peut valider le fichier et le stocker

move_uploaded_file($photo['tmp_name'],$chemin);
// echo "L’envoi a bien été effectué !";
}
}
}
}