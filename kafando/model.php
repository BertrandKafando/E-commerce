<?php

 
 function getnum($id)
 { 
     // attention pdo
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    try{
		 		
	    $stmt = $pdo->prepare("SELECT count(*) as nb FROM products c INNER JOIN productcategory sc ON sc.prod_id = c.sku WHERE sc.cat_id='{$id}'");
	    $stmt->execute();
	    $data = $stmt->fetch();
        $nb = $data['nb'];
        return $nb;
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

 }
 function produit_sans_ordre(){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    try{
		 		
	    $stmt = $pdo->prepare("SELECT * FROM products LIMIT 100");
	    $stmt->execute();
	  return  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}
 }


 function produit_avec_ordre(){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
 
    try{
		 		
	    $stmt = $pdo->prepare("SELECT * FROM products ORDER BY price LIMIT 100");
	    $stmt->execute();
	 return   $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}
}
 
?>

