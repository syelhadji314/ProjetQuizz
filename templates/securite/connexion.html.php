<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.inc.html.php");
if (isset($_SESSION[KEY_ERRORS])) {
    $_SESSION[KEY_ERRORS]=$errors;
    unset($_SESSION[KEY_ERRORS]);
}
?>
    <form action="<?=PATH_POST?>" method="post">
    
        <div class="container">

        <!-- <h2>Login Form</h2> -->
            <div class="imgcontainer">
                <img src="<?=WEB_ROOT."img/loginIcon.png"?>" alt="Avatar" class="avatar">
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
                
            <input type="submit" value="connexion" name="action" class="btn">
        </div>    
    </form>
<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.inc.html.php");
?>