<?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
    session_start();
    include "Connection.php";


    $month = $_POST['monthSelect'];
    $day = $_POST['valueToEdit'];
    $firstTime = $_POST['time1'];
    $secondTime = $_POST['time2'];
    $thirdTime = $_POST['time3'];
    $fourthTime = $_POST['time4'];
    $sql = "UPDATE `".$month."` SET entrada1 = '".$firstTime."', `saida1` = '".$secondTime."', `entrada2` = '".$thirdTime."', `saida2` = '".$fourthTime."' WHERE `dia` = ".$day;
    $conn = Connection::getInstance()->prepare($sql);
    if($conn->execute()){
        echo "Edição concluída com sucesso. Atualize a página e verifique na tabela a nova alteração.";
    }else{
        $results = $conn->fetch(PDO::FETCH_ASSOC);
    }
?>
