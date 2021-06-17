
<?php
	try{
		 		
	    $stmt = $pdo->prepare("SELECT * FROM products LIMIT 100");
	    $stmt->execute();
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}
?>



<div class="row row-cols-1 row-cols-md-4 g-4">
 <?php foreach ($products as $product){?>
  <div class="col">
    <div class="card h-100" >
      <img src="<?php echo $product['image'];?>" class="card-img-top" alt="...">
      <div class="card-body">
         <h5 class="card-title"><?php echo $product['name'];?></h5>
         <h5 class="card-title"><?php echo $product['price'];?></h5>
         <p class="card-text"><?php echo $product['description']; ?></p>
         <a href="./panier/add_cart.php?id=1&quantité=2" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
 <?php };?>
</div>

