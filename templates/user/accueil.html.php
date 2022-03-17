<!-- Layout ou page de présentation -->
<?php 
    require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."haut.inc.html.php");
?>
<!-- ********************************** -->
<div class="entete">
    <h1>CRÉER ET PARAMETRER VOS QUIZZ</h1>
    <button class="btn"><a href="<?=WEB_ROOT."?controleur=securite&action=deconnexion"?>" id="btna">Deconnexion</a></button>
</div>
<div class="contenu">
    <!-- ********************************* -->
    <div class="icone-form">

        <div class="profil">
            
            <!-- <?php if(!isset($_SESSION['user']['photo'])) :?>
                <img class="photo" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."img-bg.jpg"?>" alt="PROFIL">
            <?php endif ?> -->
            
            <img class="photo" src="<?= DOSSIER_PUBLIC."upload".DIRECTORY_SEPARATOR.$_SESSION['user']['photo']?>" alt="PROFIL">
            
            <h1><?=$_SESSION['user']['prenom']?></h1>
            <h1><?=$_SESSION['user']['nom']?></h1>

        </div>

        <div class="formulaire">
            <a href="<?=WEB_ROOT."?controleur=user&action=liste.question" ?>">Liste Questions  <img class="ok" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-liste-active.png"?>" alt="PROFIL"></a>
            <?php if (Administrateur()):?> 
            <a href="<?=WEB_ROOT."?controleur=user&action=inscription" ?>">Créer Admin <img class="ok"  src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout-réponse.png"?>" alt="PROFIL"></a>
            <?php endif ?>
            <?php if (Administrateur()):?> 
            <a class="active" href="<?=WEB_ROOT."?controleur=user&action=liste.Joueur" ?>">Liste des joueurs <img class="ok"  src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-liste.png"?>" alt="PROFIL"></a>
            <?php endif ?>

            <?php if (Administrateur()):?> 
            <a href="<?=WEB_ROOT."?controleur=user&action=creeQuestion"?>">Créer question<img class="ok"  src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout-réponse.png"?>" alt="PROFIL"></a>
            <?php endif ?>
        </div>

    </div>
    <!-- *********************** -->
    <div class="lister">
        <?php 
        //  Contenu des vues
        echo $contenu_vues;
        ?>
    </div>
</div>
<?php
    require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."bas.inc.html.php");
?>

