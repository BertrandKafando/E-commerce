<!DOCTYPE html>
<html>
<head>
 
</head>
<body>
<?php
include_once(dirname(__FILE__).'../includes/header.php');
include_once(dirname(__FILE__).'/config.php');
$mysqli = new mysqli("localhost", "root", "", "boutique");

/* Vérification de la connexion 
j'ai utilisé mysqli ici
*/
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($mysqli, $username);
  $password=$_REQUEST['password'];
  echo $_REQUEST['password'];
  //$password = stripslashes($_REQUEST['password']);
  echo $password;
  //$password = mysqli_real_escape_string($mysqli, $password);
 // echo $username;

    $query = "SELECT * FROM `users` WHERE name='$username' and password= '$password'";
    $result = mysqli_query($mysqli,$query) or die(mysql_error());
     $rows =mysqli_num_rows($result);
    echo $rows; 
  if($rows==1){
      $_SESSION['username'] = $username;
      header("Location: accueil.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur"> 
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="alert alert-danger"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
<?php include_once(dirname(__FILE__).'../includes/footer.php');?>
</html>

