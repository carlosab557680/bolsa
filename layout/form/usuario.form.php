<div class="list-group col-sm-3">
        <a href="#" class="list-group-item disabled">Operações</a>
        <a href="usuario.php?new" class="list-group-item">Novo usuário</a>
        <a href="usuario.php" class="list-group-item">Gerenciar usuários</a>
</div>
<div class="col-sm-9">
    <fieldset>
        <legend>Formulário de Usuários</legend>
    </fieldset>
    <form method="post" class="form-horizontal col-sm-5" role="form">
        <div>
            <input type="hidden" name="id" value="<?php echo $usuario->getId()?>" />
            <div class="form-group">
                <label for="tipo" class="col-sm-12">Tipo</label>
                <div class="col-sm-12">
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="0">Selecione...</option>
                        <option <?php echo $usuario->getTipo() == 1 ? 'selected' : ''?> value="1">Administrador</option>
                        <option <?php echo $usuario->getTipo() == 2 ? 'selected' : ''?> value="2">Gerente</option>
                        <option <?php echo $usuario->getTipo() == 3 ? 'selected' : ''?> value="3">Operador</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="usuario" class="col-sm-12">Usuário</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="usuario" placeholder="Digite o usuário" value="<?php echo $usuario->getUsuario()?>">
                </div>
            </div>
            <div class="form-group">
                <label for="dtinicio" class="col-sm-12">Nome</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="dtinicio" name="nome" placeholder="Digite o nome" value="<?php echo $usuario->getNome()?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" name="btnSalvar" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Salvar</button>
                </div>
            </div>
        </div><br>

        <?php if (isset($msg)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $msg ?>
            </div>
        <?php endif; ?>


    </form>
</div>