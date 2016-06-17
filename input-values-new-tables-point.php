<?php
    session_start();
    include "conect.php";
    $userId = $_SESSION['id'];
    $nomeUser = $_SESSION['nome'];
    $nameReplace = str_replace(' ','_',$nomeUser);
    $month = $_POST['dateMonth'];
    $day = $_POST['day'];
    $firstTime = $_POST['time1'];
    $secondTime = $_POST['time2'];
    $thirdTime = $_POST['time3'];
    $fourthTime = $_POST['time4'];

    $createTable = "CREATE TABLE IF NOT EXISTS `".$userId."_".$month."`(dia int NOT NULL UNIQUE, entrada1 varchar(5) NOT NULL, saida1 varchar(5) NOT NULL, entrada2 varchar(5) NOT NULL, saida2 varchar(5) NOT NULL)";
    $conn = Conexao::getInstance()->prepare($createTable);
    if($conn->execute()){
        echo 1 . " ";
        unset($conn);
    }else{
        $results = $conn->fetch(PDO::FETCH_ASSOC);
    }
    $sql = "INSERT INTO `".$userId."_".$month."`(dia, entrada1, saida1, entrada2, saida2) VALUES ('".$day."','".$firstTime."','".$secondTime."','".$thirdTime."','".$fourthTime."')";
    $conn = Conexao::getInstance()->prepare($sql);
    if($conn->execute()){
        echo 1;
    }else{
        $results = $conn->fetch(PDO::FETCH_ASSOC);
    }
?>