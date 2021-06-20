
<?php
session_start();
$dbd=mysqli_connect("localhost","root","","boutique");
if(!$dbd)
{
    die("undefined data base");
}
include_once(dirname(__FILE__).'../includes/header.php');
include_once(dirname(__FILE__).'../includes/navbar.php');

?>
<?php

$total=0;
if(isset($_SESSION['all_id'])){
    $nbr = count($_SESSION['all_id']);
}
else{
    $nbr = 0;
}

if(isset($_SESSION['id1'])){
    $loginLink=1;
 }
 else{
    $loginLink=0;
 }

?>


<body  >
 <div class="content" align="center">
 <br><br><br>
 <?php if($loginLink==1){ ?>
 <span> voici votre panier Mr <?=$_SESSION['nom']?> </span><br>
 <?php } ?>
 <span class="uk-margin-small-right" id="pannel" uk-icon="icon: cart; ratio: 2"><?=$nbr?></span>
    <h1 style="font-size:50px;">PANIER</h1>
    <div class="uk-width-2-3  uk-child-width-2-3 uk-text-center uk-margin" uk-grid>
      <div id="table">
          <div class="uk-card uk-card-default uk-card-body uk-overflow-auto">
          <table class="uk-table uk-table-striped uk-table-small uk-table-divider">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<$nbr;$i++) {
                    $req1="SELECT * FROM products where sku='".$_SESSION['all_id'][$i]."'";
                    $res1=$dbd->query($req1);
                    if($res1){
                        while($arr1=$res1->fetch_array())
                        {

                        
                    ?>
                <tr class="uk-text-left" >
                    <td>
                      <p style="float:left;"><?=$arr1['name']?></p>
                    </td>
                    <td><?=$arr1['price']?></td>
                    <?php $total+=$arr1['price']; ?>
                    <td>
                        <div class="uk-margin">
                            <input class="qte uk-input uk-form-width-small"  type="number" prod-price="<?=$arr1['price']?>" placeholder="QTE" value="1" onclick="ret()">
                        </div>

                    </td>
                </tr>
                <?php 
                }
                }
                }
                ?>
            </tbody>
        </table>
          </div>
      </div>
    </div>
    <div  class="uk-width-1-3  uk-child-width-2-3 uk-text-center uk-margin ">
      <table class="uk-table uk-table-striped uk-text-left">
          <thead>
              <tr >
                  <th>  TOTAL :</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                    <td>Total</td>
                    <td id="total"><?=$total?></td>
              </tr>
          </tbody>
      </table>
      <button >buy</button>
    </div> 
  </div>

 <?php
include_once(dirname(__FILE__).'../includes/footer.php');
?>