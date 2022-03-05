<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.inc.html.php");
if (isset($_SESSION[KEY_ERRORS])) {
    $errors = $_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
}
?>
<main>
    <form action="<?=PATH_POST?>" method="post">
    
        <div class="container">

        <!-- <h2>Login Form</h2> -->
            <div class="headerContainer">
                <h3>Login form</h3>
            </div>
            <input type="hidden" name="controlleur" value="securite">
            <input type="hidden" name="action" value="connexion">

            <?php if (isset($errors['connexion'])):?>
                <p style="color: red"><?=$errors['connexion'];?></p>
            <?php endif?>
            <input type="text" placeholder="Enter Username" name="login"><br>

            <?php if (isset($errors['login'])):?>
                <p style="color: red"><?=$errors['login'];?></p>
            <?php endif?>
            <input type="password" placeholder="Enter Password" name="password">

            <?php if (isset($errors['password'])):?>
                <p style="color: red"><?=$errors['password'];?></p>
            <?php endif?>
            <div class="btns">    
            <input type="submit" value="connexion" name="action" class="btn">
            <a href=""><input type="submit" name="signup" value="S'inscrire pour jouer" id="inscription"></a>
            </div>
        </div>
    </form>
</main>
<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.inc.html.php");
?>