<?php
    $nome = $_POST['nome'];
    $nomeEmpresa = $_POST['nomeEmpresa'];
    $login = $_POST['user'];
    $password = $_POST['password'];

    include "Connection.php";
    $sql = "INSERT INTO usuarios (nome, nomeempresa, username, password) VALUES ('".$nome."','".$nomeEmpresa."','".$login."','".password_hash($password, PASSWORD_DEFAULT)."')";
    $conn = Conexao::getInstance()->prepare($sql);
    //Verifica se a variável está vazia
    if($nome == null or $nomeEmpresa == null or $login == null or $password == null){
        echo "Verifique se todos os campos foram preenchidos e tente novamente.";
    }else{
        if($conn->execute()){
            echo 1;
        }else{
            echo "n foi";
        }
    }
?>