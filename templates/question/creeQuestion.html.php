<?php
    

    if (isset($_SESSION['errors'])) {
        
        $errors=$_SESSION['errors'];

        unset($_SESSION['errors']);

    }
    ?>
<h1 class="CreeQuizz">CRÉEZ ET PARAMETREZ VOS QUIZZ</h1>
<div class="question">
    <form action="<?php WEB_ROOT?>" method="POST">
    <input type="hidden" name="controleur" value="question">
    <input type="hidden" name="action" value="question">
    <div class="label-inputs">
        <label for="question">Questions</label>
        <input id="question" type="text" name="question"><br>
    
    </div>
        <?php if (isset($errors['question'])):?> 
            <p style="color:red"> <?= $errors['question'] ?></p>
        <?php  endif ?>
    <div class="label">
        <label class="nombre"  for="">Nbre de points</label>
        <input class="lab-input numero" type="number" name="nbrePoint">
        <?php if (isset($errors['nbrePoint'])):?> 
            <p style="color:red"> <?= $errors['nbrePoint'] ?></p>
        <?php endif ?>
    </div>
    <div class="label-input">
        <label for="typeQuestion">Type de reponse</label>
        <select  id="typeQuestion" name="type">
            <option value="0" disabled selected>Donnez le type de réponse</option>
            <option value="typeText">text</option>
            <option value="typeSimple">simple</option>
            <option value="typeMultiple">Multiple</option>
        </select><br>
        
        <img class="ajout1" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout-réponse.png"?>" alt="PROFIL" id="typeRep">
        
    </div>
     
    <div id="reponseFinal">
        
    </div>
    <input type="submit" id="Enregistrer" name="" value="Enregistrer">
    </form>
</div>

<script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."question.js"?>"></script>