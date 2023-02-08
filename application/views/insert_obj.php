<div>
    
   <center> <h1>Insertion</h1>
   
      <?php echo form_open_multipart('objet_con/TraitInsert');?>
    <form action="" method="" >

        <label for="">Nom</label>
        <input type="text" name="nom"  required><br>

        <label for="">Prix</label>
        <input type="text" name="prix"  required><br>
        <input type="hidden" name="id">

        <label for="">Categorie</label>
        <br>
        <?php foreach($cate as $c){ ?>              
           <label for=""><?php echo $c['nomCategorie'];?></label> 
           <input type="checkbox" name="idcate[]" value="<?php echo $c['idCategorie'];?>" >
           <?php } ?>
        <br>

        <label for="">Photo 1</label>
        <input type="file" name="file" size="100000000000000000000"><br>
        <label for="">Photo 2</label>
        <input type="file" name="file1" size="100000000000000000000"><br>
        <label for="">Photo 3</label>
        <input type="file" name="file2" size="100000000000000000000"><br>
        <input type="submit" value="Insertion">
    </form>
    </center>

</div>