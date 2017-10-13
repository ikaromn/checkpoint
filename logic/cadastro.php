<?php
    $nome = $_POST['nome'];
    $nomeEmpresa = $_POST['nomeEmpresa'];
    $login = $_POST['user'];
    $password = $_POST['password'];

    include 'Usuario.php';
    $nUser = new Usuario();

    if($nome == null or $nomeEmpresa == null or $login == null or $password == null){
        echo "Verifique se todos os campos foram preenchidos e tente novamente.";
    }else{
        $nUser = $nUser->cadastroUsuario($nome, $login, $nomeEmpresa, $password);
        if($nUser){
            echo 1;
        }else{
            echo "n foi";
        }
    }
?>