<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">

            /* Sticky footer styles
            -------------------------------------------------- */

            html,
            body {
                height: 100%;
                /*background-color: #EEE;*/
                /* The html and body elements cannot have any padding or margin. */
            }
            .body{
                background-color: #fff;
            }

            /* Wrapper for page content to push down footer */
            #wrap {
                min-height: 100%;
                height: auto !important;
                height: 100%;
                /* Negative indent footer by it's height */
                margin: 0 auto -50px;
            }

            /* Set the fixed height of the footer here */
            #push,
            #footer {
                height: 50px;
            }
            #footer {
                background-color: #2069B4;
            }

            /* Lastly, apply responsive CSS fixes as necessary */
            @media (max-width: 767px) {
                #footer {
                    margin-left: -20px;
                    margin-right: -20px;
                    padding-left: 20px;
                    padding-right: 20px;
                }
            }



            /* Custom page CSS
            -------------------------------------------------- */
            /* Not required for template or sticky footer method. */

            #wrap > .container {
                padding-top: 60px;
            }
            .container .credit {
                margin: 20px 0;
            }

            code {
                font-size: 80%;
            }
            .navbar-header{
                padding-left: 55px; 
                background: url(layout/img/logo-facens-2.png) no-repeat; 
                background-size: 48px 48px; 
                background-origin: padding-box;
            }
            #matricula{
                border: 1px solid #357ebd;
            }

        </style>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Cache-Control" content="no-store" />
        <link rel="icon" href="layout/img/favicon.ico">
        <title>Bolsa de Estudos</title>
        <link rel="stylesheet" type="text/css" href="layout/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="layout/css/mestre.css">
        <link rel="stylesheet" type="text/css" href="layout/css/jquery-ui.css">
        <script type="text/javascript" src="layout/js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="layout/js/jquery-ui.js"></script>
        <script type="text/javascript" src="layout/js/jquery.mask.js"></script>
        <script type="text/javascript" src="layout/js/aluno.js"></script>
        <script type="text/javascript" src="layout/bootstrap/js/bootstrap.js"></script>

    </head>

    <body class="body">
        <!-- Part 1: Wrap all page content here -->
        <div id="wrap">

            <!-- Fixed navbar -->
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!--Brand and toggle get grouped for better mobile display--> 
                    <div class="navbar-header">
                        <a class="navbar-brand" href="./">Bolsa de Estudos - Facens</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!--Collect the nav links, forms, and other content for toggling--> 
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php 
                            include_once 'class/usuario.class.php';
                            include_once 'include/session.php';
                            $operador = new usuario();
                            if(isset($_SESSION['operador'])){
                                $operador = unserialize($_SESSION['operador']);
                            }
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if($operador->getTipo() != ''):?>

                            <?php if(in_array($operador->getTipo(),array(1,2))): ?>
                            <li><a href="contrato.php">Contratos</a></li>
                            <?php endif; ?>

                            <li><a href="contemplado.php">Contemplados</a></li>
                            <?php if($operador->getTipo() == 1): ?>
                            <?php endif;?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Opcões</a>
                                <ul class="dropdown-menu" role="menu">
                                <?php if($operador->getTipo() == 1): ?>
                                    <li><a href="usuario.php"> Usuários</a></li>
                                    <li><a href="config.php"> Configurações</a></li>
                                    <li><a href="log.php">Logs de transação</a></li>
                                    <li class="divider"></li>
                                <?php elseif($operador->getTipo() == 2): ?>
                                    <li><a href="config.php"> Configurações</a></li>
                                    <li class="divider"></li>
                                <?php endif;?>
                                    <li><a href="logout.php">(<?php echo $operador->getUsuario() ?>) Sair</a></li>
                                </ul>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div> <!--.navbar-collapse -->
                </div> <!-- .container-fluid -->
            </nav>
            <!-- Begin page content -->
            <!--<div class="container">-->
            <div id="corpo">
                <?php echo $corpo; ?>
                <?php if (isset($mensagem)) { ?>
                    <div align="center">
                        <br/>
                        <p class="msg">
                            <?php echo $mensagem; ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
            <!--</div>-->

            <div id="push"></div>
        </div>

        <div id="footer">
            <div class="container">
                <div id="rodape">
                    FACENS - Faculdade de Engenharia de Sorocaba<br />
                    &copy 2022
                </div>
            </div>
        </div>

    </body>
</html>
