<?php
 if (isset($_SESSION['errors'])) {
        
    $errors=$_SESSION['errors'];

unset($_SESSION['errors']);

}?>
 
<div id="utlisateurs">
    <div class="inscrire">

    <div class="title-form">
    
   
        <div class="title">
            <h2>S'INSCRIRE</h2>
            
            <h3>Pour tester votre niveau de culture générale</h3>
        </div>
    

       
        <form action="<?= WEB_ROOT ?>" method="POST" class="form">
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
                <label for="utilisateur">Prenom</label>
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

                <!-- ****************************************************************** -->
                <div class="fichier">
                <h3>Avatar</h3>
                <input type="file" id="">
                </div>
               
                <button  type="submit" id="validation" name="compte" >Créer un compte</button>


        </form>
    </div>


                <div class="identifiant">
                    <img class="logo-inscrit" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."jul.jpg"?>" alt="PROFIL">

                    <h3>SOULEYMANE DIALLO</h3>
                    </div>
            </div>


  </div>
  <!-- <script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."inscription.js"?>"></script> -->


