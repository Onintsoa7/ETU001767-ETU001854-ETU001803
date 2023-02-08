<div class="containerAll">
<?php for($i = 0; $i < count($objet); $i++){?>
<div class="flip-card-container" style="--hue: 220">
  <div class="flip-card">

    <div class="card-front">
      <figure>
        <div class="img-bg"></div>
        <!--<img src="https://images.unsplash.com/photo-1486162928267-e6274cb3106f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Brohm Lake"> !-->
        <figcaption></figcaption>
      </figure>

      <ul>
        <li></li>
        <li><?php echo $objet[$i]['nomUser']?></li>
        <li><?php echo $objet[$i]['nomObjet']?></li>
        <li><?php echo $objet[$i]['prixObjet']?></li>
        <li><?php echo $objet[$i]['nomCategorie']?></li>
        <li><?php echo $objet[$i]['idObjet']?></li>
      </ul>
    </div>

    <div class="card-back">
      <figure>
        <div class="img-bg"></div>
      </figure>
  
      <button><a href="<?php echo base_url();?>fiche_con/echanger/<?php echo $objet[$i]['idObjet']; ?>">Echanger</a></button>

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

<!-- /flip-card-container -->



<?php } ?>
</div>