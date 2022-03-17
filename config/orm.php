<?php
// L'ORM est l'intermediare entre le model et la source de données

// cle dans notre fichier json
function chaine_en_tableau(string $cle):array{
// Recuperation du contenu de notre fichier Json dans l'orm
$donnes=file_get_contents(DOSSIER_DATA);
// Transformation des données ($donnes) en tableau 
$tableau=json_decode($donnes,true);
return $tableau[$cle];
}


// *************************************************************
// Enregistrement et mis a jour des données du fichier
function tableau_en_chaine(string $cle,array $newUser){
$contenuJson=file_get_contents(DOSSIER_DATA);
$data=json_decode($contenuJson,true);
$data['user'][]=$newUser;
$donneesFinal=json_encode($data, JSON_PRETTY_PRINT);
file_put_contents(DOSSIER_DATA,$donneesFinal);

// return $chaine;
}
// ********************************************
function tableau_en_chaine_question(string $cle,array $newQuestion){
    $contenuJson=file_get_contents(DOSSIER_DATA);
    $data=json_decode($contenuJson,true);
    $data['questions'][]=$newQuestion;
    $donneesFinal=json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents(DOSSIER_DATA,$donneesFinal);
    }


