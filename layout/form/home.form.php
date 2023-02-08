<script>
    $(function () {
        $('#cpf').mask('000.000.000-00', {clearIfNotMatch: true});
    });
</script>
<div class="list-group col-sm-3">
    <fieldset>
        <legend>Passos para aceitação</legend>
    </fieldset>
    <div class="container-fluid"><p><a class="label label-danger" href="tutorial.php">Veja um tutorial aqui.</a></p></div>
    <ol>
        <li>Preencha o formulário de contemplados;</li>
        <li>Leia o Contrato de Bolsa;</li>
        <li>Aceite e Confirme os termos do contrato;</li>
        <li>Acesse seu e-mail da Facens;</li>
        <li>Clique no link recebido para confirmação;</li>
        <li>Bolsa confirmada, verique seu e-mail.</li>
    </ol>
</div>
<?php if (strtotime($config->getData_abertura()) < strtotime('now')): ?>
    <div class="col-sm-8" style="background-color: rgb(247, 247, 247);">

        <fieldset>
            <legend>Formulário Contemplados</legend>
        </fieldset>
        <?php if (isset($msg_ok)): ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo $msg_ok ?>
            </div>
        <?php elseif (isset($msg)): ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $msg ?>
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center" role="alert">
                Entre com seus dados e verifique se você foi contemplado com Bolsa de Estudos.
              <!--  Aguarde! O aceite do Contrato de Bolsa Filantrópica de Estudos para <b>2019S1</b> será liberado após o final no período de matriculas.-->
            </div>
        <?php endif; ?>


        <form method="post" class="form-horizontal center-block col-sm-6" role="form" style="float: none; margin: 50px auto;">
            <div>
                <div class="form-group">
                    <label for="ra" class="col-sm-12">RA</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="ra" name="ra" placeholder="Digite seu RA">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cpf" class="col-sm-12">CPF</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" name="btnEntrar" class="btn btn-primary">Entrar</button>
                    </div>
                </div>
            </div><br>
        </form>

    </div>
<?php else: ?>

    <div class="col-sm-8">

        <div class="jumbotron alert-warning">
            <div class="container text-center">
                <h1>Aguarde...</h1>
                <p>O aceite do contrato de bolsa filatropia acontecerá em breve, aguarde....</p>
            </div>
        </div>

        <!--<div class="alert well-lg lead alert-warning text-center">Aceite do contrato da Bolsa Filantropia em breve, aguarde!</div>-->
    </div>
<?php endif; ?>