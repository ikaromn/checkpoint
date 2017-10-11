<?php
    include "Connection.php";
    $table = $_POST['tables'];
    $sql = "SELECT `dia`,`entrada1`,`saida1`,`entrada2`,`saida2` FROM `".$table."`";
    $conn = Connection::getInstance()->prepare($sql);
    $conn->execute();
    $armazene = [];
    echo "<option></option>";
    foreach ($conn as $key ){
        #$countItens = count($key);
        for($i=0;$i<1;$i++){
            echo "<option value='{$key[$i]}'>{$key[$i]}</option>";
        }
    }
?>