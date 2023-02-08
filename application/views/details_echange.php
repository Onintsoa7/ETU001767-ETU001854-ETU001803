<div class="containerAll">
<div class="flip-card-container" style="--hue: 220">
  <div>

    <div class="card-front">
      <figure>
        <div class="img-bg"></div>
        MON OBJET DE RECHANGE
        <!--<img src="https://images.unsplash.com/photo-1486162928267-e6274cb3106f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Brohm Lake"> !-->
        <figcaption></figcaption>
      </figure>
      <ul>
        <li></li>
        <li><?php echo $objet1[0]['nomUser'];?></li>
        <li><?php echo $objet1[0]['nomObjet'];?></li>
        <li><?php echo $objet1[0]['prixObjet'];?></li>
        <li><?php echo $objet1[0]['nomCategorie'];?></li>
        <li><?php echo $objet1[0]['idObjet'];?></li>
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



<div class="flip-card-container" style="--hue: 220">
  <div class="flip-card">

    <div class="card-front">
      <figure>
        <div class="img-bg"></div>
        L' OBJET EN QUESTION
        <!--<img src="https://images.unsplash.com/photo-1486162928267-e6274cb3106f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Brohm Lake"> !-->
        <figcaption></figcaption>
      </figure>

      <ul>
        <li></li>
        <li><?php echo $objet2[0]['nomUser'];?></li>
        <li><?php echo $objet2[0]['nomObjet'];?></li>
        <li><?php echo $objet2[0]['prixObjet'];?></li>
        <li><?php echo $objet2[0]['nomCategorie'];?></li>
        <li><?php echo $objet2[0]['idObjet'];?></li>
      </ul>
    </div>

    <div class="card-back">
      <figure>
        <div class="img-bg"></div>
      </figure>
      <button>
        <a href="<?php echo base_url();?>proposition_con/accept/<?php echo $idEchange[0]; ?>/<?php echo  $objet1[0]['idObjet']; ?>/<?php echo $objet2[0]['idUser']; ?>/<?php echo $objet2[0]['idUser']; ?>">Accepter</a>
      </button>
      <button>
        <a href="<?php echo base_url();?>proposition_con/refuse/<?php echo $idEchange[0]; ?>">Refuser</a>
      </button>

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



</div>