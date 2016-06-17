<!DOCTYPE html>
<?php 
    include 'verify-login.php';
?>
<html>
    <head>
        <title>Painel de Controle</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script>
            $(document).ready(function(){
                $('#unique').click(function(){
                    console.log("mudou");
                    $.post('consult-values.php', $('#myForm select').serializeArray(), function(data){
                        if(data){
                            $(".put-data-here").html(data);
                        }else{
                            $(".mensagem-erro").html(data);
                        }
                    });
                });
                $('#myForm').submit(function(){
                    return false;
                });
            });
        </script>
        <style>
            tr td:nth-child(2), tr td:nth-child(4), tr td:nth-child(6), tr td:nth-child(8), tr td:nth-child(10){
                display: none;
            }
        </style>
    </head>
    <body>
        <?php
            include 'head-content.php';
        ?>
        <content>
            <div class="container">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h2>Nome do funcionário</h2>
                        </div>
                        <form action="consult-values.php" method="post" id="myForm">
                            <select id="tables" name="tables">
                                <option></option>
                                <?php
                                    include "conect.php";
                                    $sql = "show tables;";
                                    $conn = Conexao::getInstance()->prepare($sql);
                                    $conn->execute();
                                    $armazene = [];
                                    $firstName = $_SESSION['id'];
                                    foreach($conn as $row){
                                        $armazene[] = $row[0];
                                    }
                                    $countArmazene = count($armazene);
                                    $value = 0;
                                    for ($i=0; $i < $countArmazene; $i++) {
                                        $posicao = strpos($armazene[$i], $firstName);
                                        if($posicao === 0){
                                            echo "<option value='{$armazene[$i]}'>{$armazene[$i]}</option>";
                                            $value++;
                                        }
                                    }
                                ?>
                            </select>
                            <input type="submit" id="unique" />
                        </form>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Dia</th>
                                        <th>Ent 1</th>
                                        <th>Sai 1</th>
                                        <th>Ent 2</th>
                                        <th>Sai 2</th>
                                    </tr>
                                </thead>
                                <tbody class="put-data-here">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </content>
    </body>
</html>