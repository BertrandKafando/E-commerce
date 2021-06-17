
<?php
include_once(dirname(__FILE__).'../includes/connexion.php');
?>
<?php
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
          <h3 class="name" align="center">Article Title</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi voluptatum dolorem, est voluptatibus rerum fuga praesentium dolorum impedit. Voluptate, quasi?</p>
         <?php include_once(dirname(__FILE__).'../includes/products.php');?>
        </div>
    </div>

</body>

 <?php include_once(dirname(__FILE__).'../includes/footer.php');?>
</html>


