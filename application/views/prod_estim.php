<div>
    <p>Le prix de votre produit est:<?php echo $prix; ?></p>
    <p>MIN: <?php echo $valInf; ?></p>
    <p>MAX: <?php echo $valSup; ?></p>
    <table border="1">
        <th>Nom Produit</th>
        <th>Prix</th>
        <th>difference en %</th>
        <th>Action</th>
        
            <?php foreach($TabObj as $tab){ ?>
                <tr>
                    <td><?php echo $tab['nomObjet']; ?></td>
                    <td><?php echo $tab['prixObjet']; ?></td>
                    <td><?php echo ($tab['prixObjet']-$prix); ?>%</td>
                    <td><a href="#?idObj=<?php echo $tab['idObjet'];?>">Echanger</a></td>
                </tr>
          <?php  } ?>
        
    </table>
</div>