<?php
//attention
 set_time_limit(1000);
    $pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root','');
 


// chemin d'accès à votre fichier JSON
$file ="products.json"; 
// mettre le contenu du fichier dans une variable
$data = file_get_contents($file); 
// décoder le flux JSON
$obj =json_decode($data); 
// accéder à l'élément approprié
//faire une fonction pour recevoir et une autre pour ecrire dans la BD
echo $obj[0]->sku. "<br>"; 
echo $obj[0]->name."<br>";
echo $obj[0]->type."<br>";
echo $obj[0]->{'category'}[0]->{'id'};

foreach($obj[0]->{'category'} as $moi)
{
    echo $moi->{'id'};
    echo $moi->{'name'}."<br>";
}

foreach($obj as $product){
    
       /* $ref=$product->sku;
        $name=$product->name;
        $description=$product->description;
        $price=$product->price;
        $image=$product->image;
        $sql="INSERT INTO products VALUES(:ref,:name,:description,:price,:image)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
            'ref'=>$ref,
            'name'=>$name,
            'description'=>$description,
            'price'=>$price,
            'image'=>$image  
        ]); 

foreach($product->{'category'} as $cat)
{
    $id=$cat->{'id'};
    $name=$cat->{'name'};
    $sql="INSERT INTO category VALUES(:id,:name)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'id'=>$id,
        'name'=>$name
    ]);*/

foreach($product->{'category'} as $cat)
{
    $pro_id=$product->sku;
    $cat_id=$cat->{'id'};
    $sql="INSERT INTO productcategory VALUES(:pro_id,:cat_id)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([
        'pro_id'=>$pro_id,
        'cat_id'=>$cat_id
    ]);
}





//}

        
}
?>