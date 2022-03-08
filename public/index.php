<?php
// FRONT CONTROLEUR DE NOTRE PROJET
// Chargement de la session

if (session_status()==PHP_SESSION_NONE) {

session_start();
}


// CHARGEMENT DES FICHIERS DE CONFIGURATION
// Charegement Des constantes
// require_once(dirname(dirname( __FILE__))."/config/constantes.php");
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."constantes.php";

// Chargement de orm Pour la conversion des données
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."orm.php";

// Chargement du validator pour gerer les fonction de validation
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."validator.php";

// Chargement du fichier role pour gererles profils
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."role.php";
// **********************************************************************************


// Chargement du router pour la redirection vers les controleurs
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."router.php";




// **********************************************************************************************************
// **********************************************************************************************************






