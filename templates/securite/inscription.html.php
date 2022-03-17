<?php

use function PHPSTORM_META\type;

 if (isset($_SESSION['errors'])) {
        
    $errors=$_SESSION['errors'];

unset($_SESSION['errors']);

}?>
 
<div id="utlisateurs">
    <div class="inscrire">

        <div class="title-form">
            <div class="title">
                <h2>S'INSCRIRE</h2>
                <?php if (Administrateur()) {
                   echo'Pour proposer vos quizz';
                }
                else {
                    echo'<h3>Pour tester votre niveau de culture générale</h3>';
                }?>
                
            </div>
            <form action="<?= WEB_ROOT?>" method="POST" class="form" enctype="multipart/form-data">
                <div class="div-inscrire">
                    <!-- Champ cachés -->
                    <!-- Champ pour gerer le controleur -->
                    <input type="hidden" name="controleur" value="securite">
                    <!-- Champ pour gerer les actions -->
                    <input type="hidden" name="action" value="compte">
                <!-- Les erreurs en php -->
                    <?php if (isset($errors['compte-existant'])):?>   
                        <p style="color:red"> <?= $errors['compte-existant'] ?></p>
                    <?php endif ?>
            <!-- *********************************************************** -->
                    <div class="form-controle">
                        <label for="prenom">Prenom</label>
                        <input type="text" placeholder="votre prénom" id="prenom" name="prenom">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Message d'erreur</small>
                        <!-- ********************************* -->
                        <?php if(isset($errors['prenom'])) :?>
                        <span style="color:red"><?=$errors['prenom'];?></span>
                        <?php endif?>
                    </div>
            <!-- *************************************************************** -->
                    <div class="form-controle">
                        <label for="utilisateur">Nom</label>
                        <input type="text" placeholder="votre nom " id="nom" name="nom">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Message d'erreur</small>
                        <?php if(isset($errors['nom'])) :?>
                        <span style="color:red"><?=$errors['nom'];?></span>
                        <?php endif?>
                    </div>
            <!-- ***************************************************************** -->

                    <div class="form-controle">
                        <label for="utilisateur">Login</label>
                        <input type="text" placeholder="votre email" id="email" name="login">
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Message d'erreur</small>
                        <!-- Validation php -->
                        <?php if (isset($errors['login'])):?> 
                            <p style="color:red"> <?= $errors['login'] ?></p>
                        <?php endif ?>
                    </div>
                        <!-- ******************************************************** -->

                    <div class="form-controle">
                        <label for="utilisateur">Mot de passe</label>
                        <input type="password" placeholder="votre mot de passe" name="password" id="password">
                        <!-- <i class="fa-solid fa-lock"></i> -->
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Message d'erreur</small>
                        <!-- Validation php -->
                        <?php if (isset($errors['password'])){?>
                            <p style="color:red"> <?=$errors['password']?></p>
                        <?php } ?>
                    </div>
                        <!-- *************************************************** -->

                    <div class="form-controle">
                        <label for="utilisateur">Confirme mot de passe</label>
                        <input type="password" placeholder="confirmer votre mot de passe" id="password2" name="password2">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Message d'erreur</small>
            <!-- ********************************************** -->
                        <?php if (isset($errors['password2'])){?>
                        <p style="color:red"> <?=$errors['password2']?></p>
                        <?php } ?>
                    </div>
                    <button  type="submit" id="validation" name="compte" >Créer un compte</button>
                </div>
                <div class="identifiant">
                    <!-- <label for="btn-file"> -->
                    <label for="file">
                        <img class="logo-inscrit" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."jul.jpg"?>" alt="PROFIL" style="cursor: pointer;" id="output" enctype="multipart/form-data">
                    </label>
                    <input style="display: none;" type="file" id="file" accept="image/*" name="monfichier" onchange="loadFile(event)"/>
                    <!-- </label> -->
                    <?php if (Administrateur()) {
                        echo" <h3>Avatar de l'admin</h3>";
                    }
                    else {
                        echo" <h3>Avatar du joueur</h3>";
                    }?>
                   
                    <?php if(!empty($errors['file'])){?>
                        <small style="color: red"><?=$errors['file']?></small>
                    <?php } ?>
                </div>
                    <!-- ****************************************************************** -->
                
            </form>
        </div>
        
    </div>
</div>
<script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."inscriptions.js"?>"></script>



