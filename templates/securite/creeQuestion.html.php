<h1 class="CreeQuizz">CRÉEZ ET PARAMETREZ VOS QUIZZ</h1>
<div class="question">
    <div class="label-inputs">
        <label for="">Questions</label>
        <input id="" type="text"> 
    </div>
    <div class="label " >
        <label class="nombre"  for="">Nbre de points</label>
        <input class="lab-input numero" type="number">
    </div>
    <div class="label-input">
        <label for="">Type de reponse</label>
        <select  name="" id="typeQuestion">
            <option value="0">Donnez le type de réponse</option>
            <option value="3">text</option>
            <option value="2">simple</option>
            <option value="1">Multiple</option>
        </select>
        <img class="ajout1" src="<?= DOSSIER_PUBLIC."img".DIRECTORY_SEPARATOR."icones".DIRECTORY_SEPARATOR."ic-ajout-réponse.png"?>" alt="PROFIL" id="typeRep" >
    </div>
    <div id="reponseFinal">
        
    </div>
    <button id="Enregistrer">Enregistrer</button>

</div>

<script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."question.js"?>"></script>