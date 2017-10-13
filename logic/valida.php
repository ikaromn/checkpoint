<?php
    session_start();
    include "Usuario.php";
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = new Usuario();

    $results = $user->verificaUsuario($username, $password);
    //Verify if password is true inside of the database
    if(count($results) > 0 && password_verify($password, $results['password'])){
    	//Create session cookie if this condition is true
        echo 1;
        $_SESSION['id'] = $results['id'];
        $_SESSION['username'] = $results['username'];
        $_SESSION['nome'] = $results['nome'];
        $_SESSION['nomeempresa'] = $results['nomeempresa'];
    }else{
        echo "Login invalido";
    }
?>