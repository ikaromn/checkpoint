<?php
    include "Connection.php";
    $table = $_POST['tables'];
    $sql = "SELECT `dia`,`entrada1`,`saida1`,`entrada2`,`saida2` FROM `".$table."`";
    $conn = Connection::getInstance()->prepare($sql);
    $conn->execute();
    $armazene = [];
    #echo "<tr>";
    foreach ($conn as $key ){
        #$countItens = count($key);
        echo "<tr>";
        for($i=0;$i<5;$i++){
            echo "<td><p>{$key[$i]}</p><td>";
        }
        echo "</tr>";
    }
    #echo "</tr>";
