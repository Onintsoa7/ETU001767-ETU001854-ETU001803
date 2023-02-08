
<?php if(!isset($objet1)){ ?>
<div class="containerAll">
        <form id= "searchbox " method= "get " action= "search_con/search">
    <input name= "search" id="search" type= "text "  placeholder= "Votre recherche">
    <select name="idCategorie" id="idCategorie" id= "button-submit ">
    <option value="0">Toutes</option>
    <?php for($i = 0; $i< count($objet); $i++){?>
    <option value="<?php echo $objet[$i]['idCategorie']?>"><?php echo $objet[$i]['nomCategorie']?></option>
    <?php } ?>
    </select>
    <input id= "button-submit " type= "submit" value= "Soumettre" />
</form>

<?php } if(isset($objet1)){ ?>
    <form id= "searchbox " method= "get " action= "search">
    <input name= "search" id="search" type= "text "  placeholder= "Votre recherche">
    <select name="idCategorie" id="idCategorie" id= "button-submit ">
    <option value="0">Toutes</option>
    <?php for($i = 0; $i< count($objet); $i++){?>
    <option value="<?php echo $objet[$i]['idCategorie']?>"><?php echo $objet[$i]['nomCategorie']?></option>
    <?php } ?>
    </select>
    <input id= "button-submit " type= "submit" value= "Soumettre" />
</form>
    <div class="containerAll">
      
   <?php 
   if(count($objet1) > 0 )
   for( $i = 0; $i< count($objet1); $i++){ 
    for( $a = 0; $a< count($objet1[$i]); $a++){
    ?>
<div class="flip-card-container" style="--hue: 220">
  <div>

    <div class="card-front">
      <figure>
        <div class="img-bg"></div>
        <!--<img src="https://images.unsplash.com/photo-1486162928267-e6274cb3106f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Brohm Lake"> !-->
        <figcaption></figcaption>
      </figure>

      <ul>
        <li><?php echo $objet1[$i][$a]['nomObjet']?></li>
        <li><?php echo $objet1[$i][$a]['prixObjet']?></li>
        <li><?php echo $objet1[$i][$a]['nomUser']?></li>
        <li><?php echo $objet1[$i][$a]['nomCategorie']?></li>
      </ul>
    </div>

    <div class="card-back">
      <figure>
        <div class="img-bg"></div>
      </figure>
  
      
      <div class="design-container">
        <span class="design design--1"></span>
        <span class="design design--2"></span>
        <span class="design design--3"></span>
        <span class="design design--4"></span>
        <span class="design design--5"></span>
        <span class="design design--6"></span>
        <span class="design design--7"></span>
        <span class="design design--8"></span>
      </div>
    </div>

  </div>
</div>

<?php } } }?>
    </div>
<!-- /flip-card-container -->



</div>