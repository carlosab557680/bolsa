<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="layout/img/favicon.ico">
        <title>Bolsa - Login</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" type="text/css" href="layout/bootstrap/css/bootstrap.css">
        <!-- Custom styles for this template -->
        <link href="layout/bootstrap/css/signin.css" rel="stylesheet">
    </head>
    <style>
        .form-signin
        {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox
        {
            margin-bottom: 10px;
        }
        .form-signin .checkbox
        {
            font-weight: normal;
        }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus
        {
            z-index: 2;
        }
        .form-signin input[type="text"]
        {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"]
        {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .login-title
        {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }
        .profile-img
        {
            width: 105px;
            height: 105px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .need-help
        {
            margin-top: 10px;
            color: #428bca;
        }
        .new-account
        {
            display: block;
            margin-top: 10px;
            color: #428bca;
        }
        .new-account-error{
            display: block;
            margin-top: 10px;
            color: #DB2A2A;
        }

    </style>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Autenticação Bolsa de Estudos - Facens</h1>
                    <div class="account-wall">
                        <img class="profile-img" src="layout/img/logo_login.png" alt="">
                        <form class="form-signin"method="post">
                            <input type="text" class="form-control" placeholder="Usuário" name="Usuario[login]" required="" autofocus="" autocomplete="off">
                            <input type="password" class="form-control" placeholder="Senha" name="Usuario[senha]" required="">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                Log in</button><br>
                            <!--<span class="pull-right need-help"></span><span class="clearfix"></span>-->
                        </form>
                    </div>
                    <?php if(isset($msg)):?>
                    <span class="text-center new-account-error"><?php echo $msg?></span>
                    <?php else:?>
                    <span class="text-center new-account">Entre com seus dados.</span
                    <?php endif;?>
                </div>
            </div>
        </div>
    </body>
</html>