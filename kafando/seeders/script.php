<?php
//augmenter 
   set_time_limit(500);
   include_once(dirname(__FILE__).'../../includes/connexion.php');

$file ="products.json"; 
$data = file_get_contents($file); 
// décoder le flux JSON
$obj =json_decode($data); 

echo $obj[0]->sku. "<br>"; 
echo $obj[0]->name."<br>";
echo $obj[0]->type."<br>";
echo $obj[0]->{'category'}[0]->{'id'};
echo $obj[0]->url."<br>";

foreach($obj[0]->{'category'} as $moi)
{
    echo $moi->{'id'};
    echo $moi->{'name'}."<br>";
}

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