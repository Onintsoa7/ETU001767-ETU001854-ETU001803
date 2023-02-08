<header>
	<link href="<?php echo base_url(); ?>assets/myCss/fiche_objet.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/myCss/proposition.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/MyCss/search.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/objet_con.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/stat_con.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/category_con.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/modif.css">
  
 
  <div class="logo">
    <?php $array = $this->session->get_userdata('user'); ?>
    <a href="#">BIENVENUE <?php echo $array['user'] ;?></a>
  </div>
  <nav>
    <ul>
      <li><a href="<?php echo site_url('login/deconnexion')?>">Deconnexion</a></li>
      <?php $array = $this->session->get_userdata('user'); 
      if($array['user'] == 1){ ?>
      <li><a href="stat_con">Statistique</a></li>
      <?php } else { ?>
      <li><a href="<?php echo site_url('proposition_con'); ?>">Propositions</a></li>
      <li><a href="<?php echo site_url('search_con'); ?>">Recherche</a></li>
      <li><a href="<?php echo site_url('objet_con'); ?>">Insertion/Modification</a></li>
      <li><a href="<?php echo site_url('listeEchange_con'); ?>">Historique</a></li>
      <li><a href="<?php echo site_url('fiche_con'); ?>">Fiche</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
<style>

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
  color: #fff;
}

.logo a {
  font-size: 22px;
  font-weight: bold;
  color: #fff;
  text-decoration: none;
}

nav ul {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

nav a {
  display: block;
  padding: 10px 20px;
  font-size: 18px;
  font-weight: bold;
  color: #fff;
  text-decoration: none;
}

nav a:hover {
  background-color: #444;
}
</style>
