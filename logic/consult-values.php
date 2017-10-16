<?php
    include "Points.php";
    $table = $_POST['tables'];
    if($table[0] == 0){
        $table = substr($table, 1);
    }
    $userId = $_POST['userId'];

    $p = new Points($userId);
    $r = $p->listPoints($table);

    $armazene = [];
    foreach ($r as $key ){
        echo "<tr>";
        for($i=0;$i<5;$i++){
            echo "<td><p>{$key[$i]}</p><td>";
        }
        echo "</tr>";
    }
