<?php
    //Verificação de Login
    //Caso não exista a SESSION username, o usuário é redirecionado para a home
    session_start();
    if(!isset ($_SESSION['username'])){
        unset($_SESSION['username']);
        header('location:/');
    }
    $nomeUser = $_SESSION['nome'];
    $nomeEmpresa = $_SESSION['nomeempresa'];
    $userId = $_SESSION['id'];
?>