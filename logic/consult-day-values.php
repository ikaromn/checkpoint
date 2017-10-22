<?php
    session_start();
    include "Points.php";
    $table = $_POST['tables'];
    if($table[0] == 0){
        $table = substr($table, 1);
    }
    $userId = $_SESSION['id'];

    $p = new Points($userId);
    $r = $p->listPoints($table);

    $armazene = [];
    echo "<option></option>";
    foreach ($r as $key){
        #$countItens = count($key);
        for($i=0;$i<1;$i++){
            echo "<option value='{$key[$i]}'>{$key[$i]}</option>";
        }
    }
?>