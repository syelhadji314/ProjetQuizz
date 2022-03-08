<?php

function champ_obligatoire(string $cle,string $donnees,array &$errors,string $message="Veillez remplir ce champ"){
if(empty($donnees)){
$errors[$cle]=$message;
}
}
// ***********************************************************************************
function valid_email(string $cle,string $donnees,array &$errors,string $message=" format email invalid"){
    $regex='/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $valider=preg_match($regex,$donnees);
    if (!$valider) {
        $errors[$cle]=$message;  
    }

// if(!filter_var($donnees,FILTER_VALIDATE_EMAIL)){
// $errors[$cle]=$message;
// }
}

// ******************************** *********************************
function valid_password(string $cle,string $donnees,array &$errors,string $message="Merci de vérifier le format de votre mot de passe"){
    $regex='/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/';
    $valider=preg_match($regex,$donnees);
    if (!$valider) {
        $errors[$cle]=$message;
       
    }
}

// *****************************Valide password2****************************



// function confirmer(string  $password,string $password2){
//     $indentique=strcmp($password,$password2);
//     if ($indentique==0) {
//        return true;
//     }


// }

function passwordNoMatch(string $cle,string $pass1,string $pass2,array &$errors,string $message="password non identique"){
    if($pass1!=$pass2){
        $errors[$cle]=$message;
    }
}





// ******************A REVOIRE *******************
// function valid_password(string $cle,string $donnees,array &$errors,string $message=" format mot de passe invalid"){
//     if (!strcmp("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $donnees)){
//     $errors[$cle]=$message;
// // echo ’L\’adresse ’ . $_POST[’mail’] . ’ est <strong>valide</strong> !’;
// }

// }


