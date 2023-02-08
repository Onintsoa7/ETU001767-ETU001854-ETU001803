<div>
    
   <center> <h1>Modifier</h1>
   <?php echo form_open_multipart('objet_con/TraitModif');?>
    <form action="" method="">

        <label for="">Nom</label>
        <input type="text" name="nom" value="<?php echo $info['nomObjet']; ?>" required><br>

        <label for="">Prix</label>
        <input type="text" name="prix" value="<?php echo $info['prixObjet']; ?>" required><br>
        <input type="hidden" name="id" value="<?php echo $info['idObjet']; ?>">

        <label for="">Categorie</label>
        <br>
        <?php foreach($cate as $c){ ?>
           <label for=""><?php echo $c['nomCategorie'];?></label> 
           <input type="checkbox" name="idcate[]" value="<?php echo $c['idCategorie'];?>"
            <?php for($i=0;$i<count($catChoosed);$i++){
             if($c['idCategorie']==$catChoosed[$i]['idCategorie']){ echo "checked"; }
            } ?>    >
           <?php } ?>
        <br>

        <label for="">Photo 1</label>
        <input type="file" name="file1" id=""><br>
        <label for="">Photo 2</label>
        <input type="file" name="file1" id=""><br>
        <label for="">Photo 3</label>
        <input type="file" name="file1" id=""><br>
        <input type="submit" value="Modifier">
    </form>
    </center>

</div>