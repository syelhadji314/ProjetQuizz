<?php
    if(isset($_REQUEST['controlleur']) ){
        switch ($_REQUEST['controlleur']) {
            case "securite" :
                require_once(PATH_SRC."controlleurs".DIRECTORY_SEPARATOR."securite.controlleurs.php");
            break;
            case "user" :
                require_once(PATH_SRC."controlleurs".DIRECTORY_SEPARATOR."user.controlleurs.php");
            break;
            }
        }
    else{
                require_once(PATH_SRC."controlleurs".DIRECTORY_SEPARATOR."securite.controlleurs.php");
    }