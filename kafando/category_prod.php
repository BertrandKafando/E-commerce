<?php
   include_once(dirname(__FILE__).'../includes/header.php');
   include_once(dirname(__FILE__).'../includes/connexion.php');
   $id_cat = //

	try{
		 		
	    $stmt = $pdo->prepare("SELECT c.* FROM products c INNER JOIN productcategory sc ON sc.prod_id = c.sku WHERE sc.cat_id= :id_cat");
	    $stmt->execute();
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}
?>

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