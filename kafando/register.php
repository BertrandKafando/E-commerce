
<?php
  include_once(dirname(__FILE__).'../includes/header.php');
  include_once(dirname(__FILE__).'../includes/navbar.php');
include_once(dirname(__FILE__).'/config.php');
//if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=test_input($_POST["username"]);
        $email=test_input($_POST["email"]);
        $password=test_input($_POST["password"]);
 

  //requéte SQL + mot de passe 
    $query = "INSERT into `users` (name, email, password)
              VALUES ('$username', '$email', '$password')";

  // Exécuter la requête sur la base de données
    $stmt=$conn->prepare($query);
    $res=$stmt->execute(array(
        'name' => $username,
        'email' => $email,
        'password' => $password
        ));

    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='connexion.php'>connecter</a></p>
       </div>";
    }
}else{
    
?>
<form class="box" action="" method="post">
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
 <?php include_once(dirname(__FILE__).'../includes/footer.php');?>





<?php
// 2 amaniere fonction
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>