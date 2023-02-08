<div class="cat">

  <button class="add"><a href="category_con/Insert">Ajouter des categories</a></button>

    <div class="categ">

      <?php foreach ($cate as $onecate) { ?>
        <li><?php echo $onecate['nomCategorie']; ?></li>
        <button class="mod"><a href="category_con/Modifier?idCate=<?php echo $onecate['idCategorie'] ?>">Modifier</a></button>
        <button class="sup"><a href="category_con/TraitSuppr/?idCate=<?php echo $onecate['idCategorie'] ?>">Suprimer</a></button>
      <?php  }  ?>

    </div>

</div>