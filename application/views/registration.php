<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url(); ?>assets/myCss/registration.css" rel="stylesheet" type="text/css" />
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form  action="<?php echo site_url('login/insertUser'); ?>" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" name="nomUser" id="nomUser" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Prenom</span>
            <input type="text" name="prenomUser" id="prenomUser" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Date de naissance</span>
            <input type="date" name="dateDeNaissance" id="dateDeNaissance" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="password" name="motDePasse" id="motDePasse" placeholder="Enter your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
