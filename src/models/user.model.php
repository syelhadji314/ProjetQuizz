<?php


// verification des donnees
function correspondance_login_password(string $login,string $password):array{
    
    // orm
    $users=chaine_en_tableau("user");

    foreach ($users as $user) {
        // s'il y'a une correspondance on a le user
        if( $user['login']==$login && $user['password']==$password)
        return $user;
    }
    return [];
}

// ****************************Compte existant***************************
function correspondance_login(string $login):array{
        $users=chaine_en_tableau("user");
    // var_dump($users);die;
        foreach ($users as $user) {
            // s'il y'a une correspondance on a le user
            if( $user['login']==$login)
            return $user;
        }
        return [];
    }
       
 


// Fonction pour lister les utilisateurs
    function listeDesUtilisateurs(string $profil):array{

        $users=chaine_en_tableau("user");
// die("bonjour");

        // var_dump($users);die;
        $liste=[];
        foreach ($users as $user) {
            if ($user['profil']==$profil) {
               $liste[]=$user;
            }
           
        }
return $liste;
    }


    // fonction liste des questions
    // Fonction pour lister les utilisateurs
    function listeDesQuestion(string $cle):array{
        $Questions=chaine_en_tableau($cle);
        $liste=[];
        foreach ( $Questions as $question) {
             $liste[]=$question;
            }
return $liste;
    }
    // ****************************************************************
function userArray():array{
    $tab=[
        'prenom'=>$_POST['prenom'],
        'nom'=>$_POST['nom'],
        'login'=>$_POST['login'],
        'password'=>$_POST['password'],
        'profil'=>"PROFIL_JOUEUR",
        'score'=>15

    ];
    return  $tab;
}

