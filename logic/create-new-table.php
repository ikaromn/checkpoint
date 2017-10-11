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
        <script type="text/javascript">
            $(document).ready(function(){
                $('#submit').click(function(){
                    var month = $('#month').val();
                    var day = $('#day').val();
                    var time1 = $('#time1').val();
                    var time2 = $('#time2').val();
                    var time3 = $('#time3').val();
                    var time4 = $('#time4').val();
                    if(month == "" || month.length > 7 || day == "" || day.length > 2 || time1 == "" || time1.length > 5 || time2 == "" || time2.length > 5 || time3 == "" || time3.length > 5 ||  time4 == "" || time4.length > 5){
                        console.log('aqui');
                        $(".mensagem-erro").html("Verifique se todos os campos foram preenchidos ou se algum caractere foi inserido a mais");
                    }else{
                        console.log('foi aqui');
                        $.post('input-values-new-tables-point.php', $('#myForm :input').serializeArray(), function(data){
                            if(data == 1 + " " + 1){
                                $(".mensagem-de-sucesso").html("Cadastro efetuado com sucesso. Volte para o <a href='logado.php'>painel de controle</a> para começar sua consulta ou adicionar novos valores em seu espelho de ponto");
                            }else{
                                $(".mensagem-erro").html(data);
                            }
                        });
                    }
                });
                $('#myForm').submit(function(){
                    return false;
                });
            });
        </script>
        <style>
            .form-inline.form-create-table input {
                width: 7%;
            }
            #month{
                width: 13%;
            }
        </style>
    </head>
    <body>
        <?php
            include '../head-content.php';
        ?>
        <content>
            <div class="container">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h2>Nova tabela de ponto:</h2>
                        </div>
                        <div class="panel-body">
                            <form action="" id="myForm" class="form-inline form-create-table" method="post">
                                <label for="dateMonth">Mês:</label>
                                <input placeholder="01/2016" id="month" type="text" name="dateMonth">
                                <label for="day">Dia:</label>
                                <input placeholder="01" id="day" type="number" min="1" max="31" name="day">
                                <label for="time1">Entrada 1:</label>
                                <input placeholder="00:00" id="time1" type="text" min="00:00" max="23:59" name="time1">
                                <label for="time2">Saída 1:</label>
                                <input placeholder="00:00" id="time2" type="text" min="00:00" max="23:59" name="time2">
                                <label for="time3">Entrada 2:</label>
                                <input placeholder="00:00" id="time3" type="text" min="00:00" max="23:59" name="time3">
                                <label for="time4">Saída 2:</label>
                                <input placeholder="00:00" id="time4" type="text" min="00:00" max="23:59" name="time4">
                                <input value="Enviar" id="submit" type="submit" name="submit">
                            </form>
                            <div class="col-md-12">
                                <p></p>
                                <p class="mensagem-de-sucesso mensagem-erro"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </content>
    </body>
</html>