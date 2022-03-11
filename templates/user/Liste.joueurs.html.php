<h3 id="score"><i>LISTE DES JOUEURS PAR SCORE</i></h3>
<div class="les_joueurs">

    <table>
        <tr id="titre">
            <th>Nom</th>
            <th>Prenom</th>
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

<div class="btn-pagination">
    <?php if($page != 1){ ?>
        <button class="pasi1"><a href="http://localhost:8001/?controleur=user&action=accueil&page=<?= $page = $page-1;?>">Precédent</a></button>
    <?php } ?>
    <?php if($page <= $totalPages){ ?>
        <button class="pasi2"><a href="http://localhost:8001/?controleur=user&action=accueil&page=<?= $page = $page +1;?>">Suivant</a></button>
    <?php } ?>

    
</div>
    



