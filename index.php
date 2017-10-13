<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta author="ikaro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keyword" content="portifolio, ikaro, ponto, espelho de ponto, trabalho">
        <meta name="robots" content="index, follow">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.submit-login').click(function(){
                    $('.loader').show();
                    $.post('logic/valida.php', $('#MyForm :input').serializeArray(), function(data){
                        if(data == 1){
                            $('.loader').hide();
                            window.location = "logic/logado.php";
                        }else{
                            $('.loader').hide();
                            $(".mensagem-erro").html(data);
                        }
                    });
                });
                $('.submit-cadastro').click(function(){
                    $.post('logic/cadastro.php', $('.MyForm :input').serializeArray(), function(data){
                        if(data == 1){
                            $(".mensagem-de-sucesso").html("Cadastro efetuado com sucesso, faça seu login para iniciar a sessão.");
                        }else{
                            $(".mensagem-erro").html(data);
                        }
                    });
                });
                $('#MyForm').submit(function(){
                    return false;
                });
                $('.MyForm').submit(function(){
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <header>
            <div class="col-md-12 container header-principal">
                <div class="logo-checkpoint">
                    <h1>Checkpoint</h1>
                </div>

                <div class="login-form">
                    <form action="" method="post" id="MyForm">
                        <div class="loader" style="display: none;">
                            <img src="loader.gif" alt="Carregando" class="lazy" intemprop="image">
                        </div>
                        <div class="mensagem-erro"></div>
                        <label>Username  :</label><input id="username" type="text" name="username" class="box"/><br /><br />
                        <label>Password  :</label><input id="password" type="password" name="password" class="box" /><br/><br />
                        <input type="submit" name='submit' value="Submit" class='submit-login'/><br />
                    </form>
                </div>
            </div>
        </header>
        <section>
            <div class="container">
                <div class="col-md-12">
                    <form action="" class="MyForm col-md-10" method="post">
                        <div class="col-md-2">
                            <label for="nome">Nome:</label><br><br>
                            <label for="nomeEmpresa">Nome da empresa:</label><br><br>
                            <label for="user">Nome de usuário:</label><br><br>
                            <label for="senha">Senha:</label><br>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="nome" id="nome"/><br /><br>
                            <input type="text" name="nomeEmpresa" id="nomeEmpresa"/><br /><br>
                            <input type="text" name="user" id="user"/><br /><br>
                            <input type="password" name="password" id="senha"/><br /><br>
                            <input type="submit" name="submit" class="submit-cadastro" value="enviar"/><br /><br>
                        </div><br><br>
                    </form>
                    <div class="mensagem-de-sucesso col-md-2"></div>
                </div>
            </div>
        </section>
    </body>
</html>