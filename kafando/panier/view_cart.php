<?php
include_once(dirname(__FILE__).'../../includes/session.php');
include_once(dirname(__FILE__).'../../includes/connexion.php');
include_once(dirname(__FILE__).'../../includes/header.php');
?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include_once(dirname(__FILE__).'../../includes/navbar.php');?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1 class="page-header">Votre panier</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
		        		<table class="table table-bordered">
		        			<thead>
		        				<th></th>
		        				<th>image</th>
		        				<th>Name</th>
		        				<th>Price</th>
		        				<th width="20%">Quantity</th>
		        				<th>total</th>
		        			</thead>
		        			<tbody id="tbody">
		        			</tbody>
		        		</table>
	        			</div>
	        		</div>
	        		<?php
	        			if(isset($_SESSION['user'])){
	        				echo "
	        					<div id='paypal-button'></div>
	        				";
	        			}
	        			else{
	        				echo "
	        					<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>
	        				";
	        			}
	        		?>
	        	</div>
	        	
	      </section>
	     
	    </div>
	  </div>
  	<?php die() ?>
      <?php include_once(dirname(__FILE__).'../../includes/footer.php');?>
</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>