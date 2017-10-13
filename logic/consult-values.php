<?php
    include "Connection.php";
    $table = $_POST['tables'];
    $userId = $_POST['userId'];
    $sql = "SELECT `dia`,`entrada1`,`saida1`,`entrada2`,`saida2` FROM `".$table."` WHERE `userId` = ". $userId . " ORDER BY `dia`";
    $conn = Connection::getInstance()->prepare($sql);
    $conn->execute();
    $armazene = [];
    foreach ($conn as $key ){
        echo "<tr>";
        for($i=0;$i<5;$i++){
            echo "<td><p>{$key[$i]}</p><td>";
        }
        echo "</tr>";
    }
