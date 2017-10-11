<!DOCTYPE html>
<?php 
    include 'verify-login.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Site com Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <style>
            
        </style>
    </head>
    <body>
        <?php 
            include '../head-content.php';
        ?>
        <div class="container">
            <div class="col-md-12">
                <ul>
                    <li><a href="create-new-table.php">Criar nova tabela de ponto ></a></li>
                    <li><a href="edit-table-checks.php">Consultar / Editar folha de ponto ></a></li>
                </ul>
            </div>
        </div>
        <!-- jQuery (necessario para os plugins Javascript Bootstrap) -->
        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>