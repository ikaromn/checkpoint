<?php
    session_start();
    include "Usuario.php";
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = new Usuario();

    $results = $user->verificaUsuario($username, $password);
    //Verify if password is true inside of the database

    if($results){
    	//Create session cookie if this condition is true
        echo 1;
        $_SESSION['id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['nome'] = $user->getNome();
        $_SESSION['nomeempresa'] = $user->getNomeEmpresa();
    }else{
        echo "Login invalido";
    }
?>