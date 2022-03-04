<?php
function champ_obligatoire(string $key,string $data,array &$errors,
string $message="Ce champ est obligatoire"){
    if(empty($data)){
        $errors[$key]=$message;
    }
}
function valid_email(string $key,string $data,array &$errors,
string $message="email invalid"){
    if(!filter_var($data,FILTER_VALIDATE_EMAIL)){
        $errors[$key]=$message;
    }
}
function valid_password(string $key, string $data, array &$errors, string $message = "mot de pass doit contenir au moins un chiffre un majuscule et un minuscule")
{
    if (!( strlen($data) == 8 && contain_minuscul($data)&& contain_majuscule($data)) ) {
        $errors[$key] = $message;
    }
}
//cette fonction permet de voir s'il ya une minuscule sur une chaine donnée
function contain_minuscul($str): bool
{
    $test = false;
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_lower($str[$i])) {
            $test = true;
        }
    }
    return $test;
}
//cette fonction permet de voir s'il ya une majuscule sur une chaine donnée
function contain_majuscule($str): bool
{
    $test = false;
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_upper($str[$i])) {
            $test = true;
        }
    }
    return $test;
}