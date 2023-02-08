<script>
    function apagar(id){
        $('#myModal').modal();
        $('.apagar').attr('href', 'usuario.php?delete=' + id);
    }
</script>
<div class="list-group col-sm-3">
    <a href="#" class="list-group-item disabled">Operações</a>
    <a href="usuario.php?new" class="list-group-item">Novo usuário</a>
    <a href="usuario.php" class="list-group-item">Gerenciar usuários</a>
</div>
<div class="col-sm-9">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Usuário</th>
                <th>Tipo</th>
                <th colspan="2" class="text-center col-sm-1">Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listUsuarios as $item): ?>
                <tr>
                    <td><?php echo $item->getId(); ?></td>
                    <td><?php echo $item->getNome(); ?></td>
                    <td><?php echo $item->getUsuario(); ?></td>
                    <td><?php echo $item->getDescricaoTipo() ?></td>
                    <td class="text-right"><a href="usuario.php?update=<?php echo $item->getUsuario() ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td class="text-left"><a href="javascript:apagar(<?php echo $item->getId()?>)"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Alerta de Confirmação</h4>
      </div>
      <div class="modal-body">
        Deseja realmente apagar esse usuário?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
        <a href="#" class="apagar btn btn-danger">Sim</a>
      </div>
    </div>
  </div>
</div>





