<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Cache-Control" content="no-store" />
        <title>Histórico Escolar</title>
        <link rel="stylesheet" type="text/css" href="layout/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="layout/css/mestre.css">
        <link rel="stylesheet" type="text/css" href="layout/css/jquery-ui.css">

        <script type="text/javascript" src="layout/js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="layout/js/jquery-ui.js"></script>
        <script type="text/javascript" src="layout/js/aluno.js"></script>
        <script type="text/javascript" src="layout/bootstrap/js/bootstrap.js"></script>

        <style>
            .navbar-header{
                padding-left: 55px; 
                background: url(layout/img/logo-facens-2.png) no-repeat; 
                background-size: 48px 48px; 
                background-origin: padding-box;
                /*margin: 10px;*/
            }
            .nav > li > a {
                /*padding: 22px;*/
            }
        </style>

    </head>
    <body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!--Brand and toggle get grouped for better mobile display--> 
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Histórico Escolar - Facens</a>
            </div>

            <!--Collect the nav links, forms, and other content for toggling--> 
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="#">Link</a></li>-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Opcões</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"> Padrões</a></li>
                            <?php include 'class/usuario.class.php';
                            if (unserialize($_SESSION['operador'])->getTipo() == 1): ?>
                                <li><a href="usuarios.php"> Usuários</a></li>
                            <?php endif; ?>
                            <li class="divider"></li>
                            <li><a href="logout.php"> Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div> <!--.navbar-collapse -->
        </div> <!-- .container-fluid -->
    </nav>

        <?php if (isset($pagetitle)): ?>
            <div>
                <h3 class="pagetitle">
                    <?php echo $pagetitle; ?>
                </h3>
            </div>
        <?php endif; ?>

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
    <div id="rodape">
        FACENS - Faculdade de Engenharia de Sorocaba<br />
        &copy 2006 - 2014
    </div>
</body>
</html>
