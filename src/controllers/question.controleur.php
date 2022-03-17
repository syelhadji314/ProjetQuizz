<?php
// Le controleur charge le model
require_once(DOSSIER_SRC."models".DIRECTORY_SEPARATOR."user.model.php" );

if ($_SERVER["REQUEST_METHOD"]=="POST") {
//   echo "<pre>";
// var_dump($_POST);die;
//    echo "</pre>";

    if(isset($_REQUEST["action"])){
      $reponses=[];
        $question=$_POST['question'];
        $nbrePoint=$_POST['nbrePoint'];
        $type=$_POST['type'];
        $reponses=$_POST['text'];
        // $reponses1=$_POST['text1'];
        $reponsesCorrect=$_POST['rep'];

        

        // echo "<pre>";
        // var_dump($_POST);die;
        //    echo "</pre>";

        switch ($_REQUEST["action"]) {
            
            case 'question':
                creer_Question($question,$nbrePoint);
               /*  echo'<pre>';
                var_dump($_POST);die;
                echo'</pre>'; */
                // require_once(DOSSIER_TEMPLATES."question".DIRECTORY_SEPARATOR."creeQuestion.html.php");
                break;
            default:
                header("location:".WEB_ROOT);
                exit();
                break;
        }
    }
}
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    if(isset($_REQUEST["action"])){
        switch ($_REQUEST["action"]) {
            case 'question':
                require_once(DOSSIER_TEMPLATES."securite".DIRECTORY_SEPARATOR."connexion.html.php");
                break;
            default:
                header("location:".WEB_ROOT);
                exit();
                break;
        }
    }
}

function creer_Question($question,$nbrePoint){
    $errors=[];
    

    champ_obligatoire('question',$question,$errors," question obligatoire");
    champ_obligatoire('nbrePoint',$nbrePoint,$errors,"Veuillez saisir le nombe de point");
    
    if(!empty($question) && !empty($nbrePoint)){

        $result=RecupQuestion();
        tableau_en_chaine_question('questions',$result);
        
        // die("ok");
        ob_start();
        require_once(DOSSIER_TEMPLATES."question".DIRECTORY_SEPARATOR."creeQuestion.html.php");
        $contenu_vues=ob_get_clean();
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
        
        
        
    }else {
        ob_start();
        require_once(DOSSIER_TEMPLATES."question".DIRECTORY_SEPARATOR."creeQuestion.html.php");
        $contenu_vues=ob_get_clean();
        require_once(DOSSIER_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
        $_SESSION['errors']=$errors;
    
    }
    
    

    
}

