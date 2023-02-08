<div class="modif">
    <h1>Modification Categorie</h1>
    <label for="">Nom du categorie</label>
    <form action="TraitModif" method="post">
        <input type="hidden" name="idcate" value="<?php echo $info['idCategorie']; ?>">
        <br>
        <input type="text" name="name_cate" value="<?php echo $info['nomCategorie']; ?>" class="text"><br><br>
        <input type="submit" value="Modifier" class="bouton">
    </form>
</div>