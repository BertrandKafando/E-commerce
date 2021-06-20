<?php
//augmenter 
   include_once(dirname(__FILE__).'../../includes/connexion.php');
$file ="products.json"; 
$data = file_get_contents($file); 
// décoder le flux JSON
$obj =json_decode($data); 

foreach($obj as $product){
    
        $ref=$product->sku;
        $name=$product->name;
        $description=$product->description;
        $price=$product->price;
        $image=$product->image;
        $url=$product->url;
        $sql="INSERT INTO products VALUES(:sku,:name,:description,:price,:image,:url)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
            'sku'=>$ref,
            'name'=>$name,
            'description'=>$description,
            'price'=>$price,
            'image'=>$image, 
            'url'=>$url
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
            ]);

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
        }

}
echo'done';
?>