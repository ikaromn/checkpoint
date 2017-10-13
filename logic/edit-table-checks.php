<!DOCTYPE html>
<?php 
    include 'verify-login.php';
?>
<html>
    <head>
        <title>Painel de Controle</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script>
            $(document).ready(function(){
                $('#unique').click(function(){
                    var tableValue = $('#tables').val();
                    $('.table-class-select input').val(tableValue);
                    $.post('consult-values.php', $('#myForm select, #myForm input[name="userId"]').serializeArray(), function(data){
                        if(data){
                            $(".put-data-here").html(data);
                        }else{
                            $(".mensagem-erro").html(data);
                        }
                    });
                    $.post('consult-day-values.php', $('#myForm select').serializeArray(), function(data){
                        if(data){
                            $(".dia-row-value select").html(data);
                        }else{
                            $(".mensagem-erro").html(data);
                        }
                    });
                });
                $('#sendValues').click(function(){
                    $.post('insert-values-edit.php', $('#edit-values select, #edit-values :input, #edit-values table-class-select').serializeArray(), function(data){
                        if(data){
                            $(".concluida").html(data);
                        }else{
                            $(".mensagem-erro").html(data);
                        }
                    });
                })
                $('#myForm').submit(function(){
                    return false;
                });
                $('#edit-values').submit(function(){
                    return false;
                });
            });
        </script>
        <style>
            .form-inline input {
                width: 10%;
            }
            tr td:nth-child(2), tr td:nth-child(4), tr td:nth-child(6), tr td:nth-child(8), tr td:nth-child(10){
                display: none;
            }
            .hide-list{
                display: none;
            }
        </style>
    </head>
    <body>
        <?php
            include '../head-content.php';
        ?>
        <content>
            <div class="container">
            <a href="logado.php"> < Voltar para o painel de controle:</a>
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h2>Nome do funcionário</h2>
                        </div>
                        <form action="consult-values.php" method="post" id="myForm">
                            <label for="">Selecione um mês e ano:</label>
                            <input type="hidden" name="userId" value="<?php echo $_SESSION['id']; ?>">
                            <select id="tables" name="tables">
                                <option></option>
                                <?php
                                    include "Connection.php";
                                    $sql = "show tables;";
                                    $conn = Connection::getInstance()->prepare($sql);
                                    $conn->execute();
                                    $armazene = [];
                                    $idName = $_SESSION['id'];
                                    foreach($conn as $row){
                                        $armazene[] = $row[0];
                                    }
                                    $countArmazene = count($armazene);
                                    $value = 0;
                                    for ($i=0; $i < $countArmazene; $i++) {
                                        //$posicao = strpos($armazene[$i], $idName);
                                        //if($posicao === 0){
                                            echo "<option value='{$armazene[$i]}'>{$armazene[$i]}</option>";
                                            $value++;
                                        //}
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
                            <form action="insert-values-edit.php" method="post" class="form-inline" id="edit-values">
                                <div class="col-md-12 table-class-select">
                                    <input name="monthSelect">
                                </div>
                                <div class="col-md-12 dia-row-value">
                                    <p>Selecione o dia para editar:</p>
                                    <select name="valueToEdit">
                                    </select>
                                    <label for="time1">Entrada 1:</label>
                                    <input placeholder="00:00" id="time1" type="text" min="00:00" max="23:59" name="time1">
                                    <label for="time2">Saída 1:</label>
                                    <input placeholder="00:00" id="time2" type="text" min="00:00" max="23:59" name="time2">
                                    <label for="time3">Entrada 2:</label>
                                    <input placeholder="00:00" id="time3" type="text" min="00:00" max="23:59" name="time3">
                                    <label for="time4">Saída 2:</label>
                                    <input placeholder="00:00" id="time4" type="text" min="00:00" max="23:59" name="time4">
                                    <button type="submit" id="sendValues" name="valueSend">
                                        <span class="glyphicon glyphicon-plus" alt="Adicionar valores"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <p class="concluida"></p>
                    </div>
                </div>
            </div>
        </content>
    </body>
</html>