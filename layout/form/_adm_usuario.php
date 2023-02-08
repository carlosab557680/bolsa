<div class="container-fluid">
<div class="list-group col-sm-3">
        <a href="#" class="list-group-item disabled">Operações</a>
        <a href="usuarios.php?new" class="list-group-item">Novo usuário</a>
    </div>
<div class="container-fluid col-lg-9">
    <fieldset>
        <legend>Gerenciar usuários</legend>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th colspan="2" class="text-center">Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUsuarios as $i => $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                        <td><?php echo $u->getLogin(); ?></td>
                        <td><?php echo $u->getNome(); ?></td>
                        <td><?php echo $u->getTipoDescricao(); ?></td>
                        <td class="col-sm-1 text-right"><a href="usuarios.php?update=<?php echo $u->getLogin() ?>"><span class="glyphicon glyphicon-edit" title="Atualizar usuário"></span></a></td>
                        <td class="col-sm-1 text-left"><a href="usuarios.php?delete=<?php echo $u->getId() ?>"><span class="glyphicon glyphicon-trash" title="Apagar usuário"></a></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </fieldset>
</div>
</div>
