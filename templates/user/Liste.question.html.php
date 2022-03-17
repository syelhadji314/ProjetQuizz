<div class="liste_question" id="listeQuestions">
    <table>
        <?php foreach ($donnees as $valeur):?>
            <tr>
                <th><?= $valeur['question']?><br></th>
            </tr>

            <td>
                <?php foreach ($valeur['reponse'] as $valeurrep):?>
                    <?= $valeurrep?><br>
                <?php endforeach ?>
            </td>
        <?php endforeach ?>
    </table>
</div>


<!-- <script src="<?= DOSSIER_PUBLIC."js".DIRECTORY_SEPARATOR."listeDesQuestions.js"?>"></script> -->
