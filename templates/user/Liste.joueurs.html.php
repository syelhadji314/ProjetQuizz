<h3 id="score"><i>LISTE DES JOUEURS PAR SCORE</i></h3>
<div class="les_joueurs">

    <table>
       
        <tr>
            <th>Nom</th>
            <th>Penom</th>
            <th>Score</th>
        </tr>
      <!-- PHP -->
      <?php foreach ($donnees as $valeur):?>
        <!-- die($valeur); -->
        <tr>
        <td><?= $valeur['nom']?></td>
        <td><?= $valeur['prenom']?></td>
        <td><?=$valeur['score']?><span>pts</span></td>
        </tr>
        <?php endforeach ?>
    </table>

</div>

<button class="pasi">Suivant</button>
    



