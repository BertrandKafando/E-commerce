<?php
if(isset($_POST['sign'])){
    $nom = htmlspecialchars(ucfirst($_POST['nom']));
    $email= htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars(sha1($_POST['pass']));
    $pass1 = htmlspecialchars(sha1($_POST['pass1']));
    if($pass===$pass1){
        $check = $pdo->query('SELECT * FROM users WHERE email = "'.$email.'"');
        if($check->rowCount()>0) $msg = "<div class='uk-alert uk-alert-danger'>Sorry this email is already used !</div>";
        else{
            $insert = $pdo->prepare('INSERT INTO users(name,email,password) VALUES(?,?,?)');
            $insert->execute(array($nom,$email,$pass));
            $msg="<div class='uk-alert uk-alert-success'>You were signed in successfuly!</div>";
        }
    } else{
        $msg = "<div class='uk-alert uk-alert-warning'>Different passwords !</div>";
    }
}


?>