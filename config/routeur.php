<?php
    if(isset($_REQUEST['controlleur']) ){
        switch ($_REQUEST['controlleur']) {
            case "securite" :
                require_once(PATH_SRC."controlleurs/securite.controlleurs.php");
            break;
            case "user" :
                require_once(PATH_SRC."controlleurs/user.controlleurs.php");
            break;
            }
            }else{
                require_once(PATH_SRC."controlleurs/securite.controlleurs.php");
            }