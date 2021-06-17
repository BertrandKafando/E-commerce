<?php
	include_once(dirname(__FILE__).'/connexion.php');
	session_start();

	if(isset($_SESSION['user'])){

		try{
			$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		die();
	}
?>