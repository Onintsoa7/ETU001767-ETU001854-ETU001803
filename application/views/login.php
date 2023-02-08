<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>

	<link href="<?php echo base_url(); ?>assets/myCss/login.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="text-center">
    <div class="wrapper">
      <div class="title">Login Form</div>
            <form action="<?php echo site_url('login/receive'); ?>" method="post">
        <div class="field">
          <input type="text" name="mail" id="mail" required>
          <label>Email</label>
        </div>
        <div class="field">
          <input type="password"  name="mdp" id="mdp" required>
          <label>Mot de passe</label>
        </div>
        <div class="field">
          <input type="submit" value="Login">
        </div>
      </form>
       <p>
          <div class="signup-link">Not a member? <a href="<?php echo site_url('login/register'); ?>">Signup now</a></div>
       </p> 
        <br>
    </div>

  </body>
</html>


