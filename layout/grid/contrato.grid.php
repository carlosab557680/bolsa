<script>
    function apagar(id){
        $('#myModal').modal();
        $('.apagar').attr('href', 'contrato.php?delete=' + id);
    }
</script>
<fieldset>
    <legend>Contratos de Bolsa</legend>
</fieldset>
<div class="list-group col-sm-3">
        <a href="#" class="list-group-item disabled">Operações</a>
        <a href="contrato.php?new" class="list-group-item">Novo contrato</a>
</div>
<div class="col-sm-9">
<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th>Nome</th>
            <th class="text-center">Período Letivo</th>
            <th class="text-center">Data Início</th>
            <th class="text-center">Data Fim</th>
            <th class="text-center">Valor do Crédito</th>
            <th colspan="2" class="text-center col-sm-1">Operações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listContratos as $item):?>
        <tr>
            <td class="text-center"><?php echo $item->getId();?></td>
            <td><?php echo $item->getNome();?></td>
            <td class="text-center"><?php echo $item->getPerletivo();?></td>
            <td class="text-center"><?php echo date("d/m/Y", strtotime($item->getDtinicio()));?></td>
            <td class="text-center"><?php echo date("d/m/Y", strtotime($item->getDtfim()));?></td>
            <td class="text-center">R$ <?php echo $item->getValorcredito();?></td>
            <td class="text-right"><a href="contrato.php?update=<?php echo $item->getId()?>"><span class="glyphicon glyphicon-edit"></span></a></td>
            <td class="text-left"><a href="javascript:apagar(<?php echo $item->getId()?>)" id="confirm"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <?php endforeach;?>
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
        Deseja realmente apagar esse contrato?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
        <a href="#" class="apagar btn btn-danger">Sim</a>
      </div>
    </div>
  </div>
</div>

