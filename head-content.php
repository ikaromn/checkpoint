<?php
    $firstName = preg_split('/ /', $nomeUser);
    echo "
        <style>
            .logout-right{
                float:right;
            }
        </style>
        <header>
            <div class='container jumbotron'>
                <div class='col-md-12'>
                    <div class='col-md-6'>
                        <p>Olá, {$firstName[0]}</p>
                        <p>{$nomeEmpresa}</p>
                    </div>
                    <div class='col-md-6'>
                        <div class='col-md-2 logout-right'>
                            <form action=../logout.php method=get>
                                <button type=submit>
                                    <span class='glyphicon glyphicon-log-out' alt='Sair'></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        ";
?>