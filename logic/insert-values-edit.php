<?php
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
    session_start();
    include "Points.php";

    $userId = $_SESSION['id'];
    $month = $_POST['monthSelect'];
    $day = $_POST['valueToEdit'];
    $firstTime = $_POST['time1'];
    $secondTime = $_POST['time2'];
    $thirdTime = $_POST['time3'];
    $fourthTime = $_POST['time4'];

    $edit = new Points($userId);
    $tryEdit = $edit->editTime($month, $day, $firstTime, $secondTime, $thirdTime, $fourthTime);

    if($tryEdit){
        echo "Edição concluída com sucesso. Atualize a página e verifique na tabela a nova alteração.";
    }else{
        echo $tryEdit;
    }
?>
