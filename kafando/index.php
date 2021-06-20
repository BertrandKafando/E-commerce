<?php
 session_start();
 if(isset($_SESSION['all_id'])){
     $nbr = count($_SESSION['all_id']);
 }
 else{
     $nbr = 0;
 }

include_once(dirname(__FILE__).'../includes/connexion.php');
include_once(dirname(__FILE__).'../includes/header.php');
?>

<body>
    <?php include_once(dirname(__FILE__).'../includes/navbar.php');
    include_once(dirname(__FILE__).'/model.php');?> 
    <div class="d-flex flex-nowrap bd-highlight">
   
        <div class="order-1 p-2 bd-highlight" >
         <?php include_once(dirname(__FILE__).'../includes/categorie.php');?>
        </div>

        <div class="order-2 p-2 bd-highlight">
          <h3 class="name" align="center">Articles</h3>
         <div class="position-absolute top-0 end-0">
         <a href="panier.php" ><span class="uk-margin-small-right" id="pannel" uk-icon="icon: cart; ratio: 2"><?=$nbr?></span> </a>
         </div>
          <?php include_once(dirname(__FILE__).'../includes/products.php');?>
 
         </div>
  </div>

</body>

 <?php include_once(dirname(__FILE__).'../includes/footer.php');?>
</html>


