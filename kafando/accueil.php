<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: connexion.php");
    exit(); 
   
    
  }
  include_once(dirname(__FILE__).'../includes/header.php');
  include_once(dirname(__FILE__).'../includes/navbar.php');
?>
    <div class="sucess">
    <h1 class="box-logo box-title"><a href="index.php">E-commerce.com</a></h1>
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est votre tableau de bord.</p>
    <a href="deconnexion.php">Déconnexion</a>Bertrakafgs
   </div>
   <br>
  <?php include_once(dirname(__FILE__).'../includes/footer.php');?>
