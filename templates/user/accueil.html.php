<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.inc.html.php");
?>

<div class="content">
    <div class="tete">
        <h2>CREER ET PARAMETRER VOS QUIZZ</h2>
        <a href="<?=WEB_ROOT."?controlleur=securite&action=deconnexion"?>">Deconnexion</a>

    </div>
    <div class="contain">
        <div class="left">
            <div class="profile">
                <img src="<?=WEB_ROOT."img".DIRECTORY_SEPARATOR."loginIcon.png" ?>" alt="profile">
                <h3>Souleymane</h3>
            </div>
            <ul>
                <li><a href="<?=WEB_ROOT."?controlleur=user&action=liste.joueur"?>">Liste Questions <img src="<?=WEB_ROOT."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-liste.png" ?>" alt=""></a></li>
                <li><a class="active" href="<?=WEB_ROOT."?controlleur=user&action=accueil"?>">Creer Admin <img src="<?=WEB_ROOT."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout.png" ?>"</a></li>
                <?php if(is_admin()):?> 
                    <li><a href="<?=WEB_ROOT."?controlleur=user&action=liste.joueur"?>">Liste joueurs <img src="<?=WEB_ROOT."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-liste-active.png" ?>"</a></li>
                <?php endif ?>
                <li><a href="<?=WEB_ROOT."?controlleur=user&action=liste.joueur"?>">Creer Questions <img src="<?=WEB_ROOT."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout.png" ?>"</a></li>

            </ul>
        </div>
        <div class="right">
            <?php
                // contenu des vues
                echo $content_for_views; 
            ?>
        </div>
    </div>

</div>

<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.inc.html.php");
?>