<div class="objet">
    <button class="add"><a href="objet_con/InsertObject">Ajouter OBJET</a></button>
    <div class="content">
        <ul>
            <?php foreach($objet as $obj){ ?>
                <li><p>Nom: <?php echo $obj['nomObjet']; ?></p>
                    <p><?php echo $obj['prixObjet']; ?> $</p></li>
                    <a href="prix_con/ten?idObj=<?php echo $obj['idObjet'];?>">+/-10%</a>
                    <a href="prix_con/twenty?idObj=<?php echo $obj['idObjet'];?>">+/-20%</a>
                    <br>
                    <button class="mod"><a href="objet_con/Modifier?idObj=<?php echo $obj['idObjet']; ?>">Modifier</a></button>
                    <button class="sup"><a href="objet_con/Delete?idObj=<?php echo $obj['idObjet']; ?>">Supprimer</a></button>
        <?php } ?>
        </ul>
    </div>
</div> 