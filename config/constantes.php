<?php

// Definition du chemin absolu --- Chemin pointant vers notre dossier racine
define("RACINE",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));
// var_dump(RACINE);

// Creation du chemin vers le dossier source
define("DOSSIER_SRC",RACINE."src".DIRECTORY_SEPARATOR);
// var_dump(DOSSIER_SRC);

// Creation du chemin pour le dossier Templates
define("DOSSIER_TEMPLATES",RACINE."templates".DIRECTORY_SEPARATOR);

// Chemin du dossier data pour acceser a notre fichier json
define("DOSSIER_DATA",RACINE."data".DIRECTORY_SEPARATOR."db.json");

// Chemin vers le dossier public pour charger les images /CSS 
define("DOSSIER_PUBLIC",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
// var_dump(DOSSIER_PUBLIC);

// Chemin sur l'action des formulaires \\ Requetes GET et POST
// define("WEB_ROOT","http://localhost:81");
define("WEB_ROOT","http://localhost:8001");
// var_dump(WEB_ROOT);die;
// var_dump(WEB_ROOT);



