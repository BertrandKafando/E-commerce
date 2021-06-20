<?php
  include_once(dirname(__FILE__).'../includes/connexion.php');
   if (isset($_GET['category']) AND isset($_GET['name'])) // On a le nom et le prénom
   {
       $nom=$_GET['name'];  $id_cat = $_GET['category'];
   }
   else 
   {
       echo 'Il faut renseigner un nom et un prénom !';
   }
   
	try{
		 		
	    $stmt = $pdo->prepare("SELECT c.* FROM products c INNER JOIN productcategory sc ON sc.prod_id = c.sku WHERE sc.cat_id='{$id_cat}' ORDER BY price");
	    $stmt->execute();
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}
    include_once(dirname(__FILE__).'../includes/header.php');
    include_once(dirname(__FILE__).'../includes/navbar.php');
?>

 <h3 class="name" align="center"><?php echo "Les articles de la categorie"." ".$nom ?></h3>
<div class="row row-cols-1 row-cols-md-5 g-4">
 <?php foreach ($products as $product){?>
  <div class="col">
    <div class="card h-100" >
      <img src="<?php echo $product['image'];?>" class="card-img-top" alt="...">
      <div class="card-body">
         <h5 class="card-title"><?php echo $product['name'];?></h5>
         <h5 class="card-title"><?php echo $product['price'];?></h5>
         <p class="card-text"><?php echo $product['description']; ?></p>
      </div>
    </div>
  </div>
 <?php };?>
</div>