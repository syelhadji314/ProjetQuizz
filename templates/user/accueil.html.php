<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.inc.html.php");
?>
<ul>
    <li><a class="active" href="<?=WEB_ROOT."?controlleur=user&action=accueil"?>">Accueil</a></li>
    <?php if(is_admin()):?> 
        <li><a href="<?=WEB_ROOT."?controlleur=user&action=liste.joueur"?>">Liste joueurs</a></li>
    <?php endif ?>
    <li><a href="<?=WEB_ROOT."?controlleur=securite&action=deconnexion"?>">Deconnexion</a></li>
</ul>
<?php
    // contenu des vues
    echo $content_for_views; 
?>
<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.inc.html.php");
?>