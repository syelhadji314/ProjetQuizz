    <?php
    require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."haut.inc.html.php");
    // require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."partout.php");

    if (isset($_SESSION['errors'])) {
        
        $errors=$_SESSION['errors'];

    unset($_SESSION['errors']);

    }
    ?>
        <!-- <header>
            <h1>Le plaisir de jouer</h1>
        </header> -->
        <main>
        <div class="conteneur">
            <div class="header">
                <h2>Login form</h2>
                <h2>X</h2>
            </div>
            
            <form action="<?= WEB_ROOT?>" class="form" id="form" method="POST">
            <!-- Champ cachés -->
            <!-- Champ pour gerer le controleur -->
            <input type="hidden" name="controleur" value="securite">
            <!-- Champ pour gerer les actions -->
            <input type="hidden" name="action" value="connexion">
        <!-- Les erreurs en php -->
        <?php if (isset($errors['connexion'])):?>  
            <!-- die("okkk") ; -->
                        <p style="color:red"> <?= $errors['connexion'] ?></p>
                        <?php endif ?>

                <div class="form-controle">
                    <label for="utilisateur">Utilisateur</label>
                    <input type="text" placeholder="votre email" id="email" name="login">
                    <i class="fa-solid fa-user"></i>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Message d'erreur</small>
                    
                    <!-- Validation php -->
                    <?php if (isset($errors['login'])):?> 
                        <p style="color:red"> <?= $errors['login'] ?></p>
                    <?php endif ?>
                </div>

                <div class="form-controle">
                    <label for="utilisateur">Mot de passe</label>
                    <input type="password" placeholder="votre mot de passe" name="password" id="password">
                    <i class="fa-solid fa-lock"></i>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Message d'erreur</small>
                    <!-- Validation php -->
                    <?php if (isset($errors['password'])){?>
                <p style="color:red"> <?=$errors['password']
    ?></p>
                <?php } ?>
                </div>
               <div class=connect-inscrit>  
                <button type="submit" id="bouton">Connexion</button>
                <a class="inscrit" href="<?= WEB_ROOT."?controleur=securite&action=inscription" ?>">S'inscrire</a>
                </div>
            </form>

            <!-- <script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."script.connexion.js"?>"></script> -->

            <?php
                require_once(DOSSIER_TEMPLATES."include".DIRECTORY_SEPARATOR."bas.inc.html.php");
            ?>



    