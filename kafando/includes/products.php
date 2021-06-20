
<?php
include_once(dirname(__FILE__).'/../model.php');
	$products= produit_sans_ordre();
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
       <?php echo"<input class='add' data-id=".$product['sku']." type='submit' value='add to card'>"?>
      </div>
    </div>
  </div>
 <?php };?>
</div>

         
<script>
$(document).on("click",".add", function(event){
    event.preventDefault();
    const userId = event.target.getAttribute("data-id");
    console.log(userId);
    var id=userId;
    var action='add';
    $('#pannel').load('index.php #pannel', {
  }, function() {});
    $.ajax({
        url:"add_pan.php",
        method:"POST",
        dataType:"JSON",
        data: {id:id,action:action},
        success:function(data){
            console.log(data);
        }
    }
    );
   
});



</script>
