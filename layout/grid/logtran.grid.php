<script type="text/javascript" src="layout/js/datatable-portugues.json"></script>
<script type="text/javascript" src="layout/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="layout/bootstrap/js/bootstrap-datatable.js"></script>
<link rel="stylesheet" href="layout/bootstrap/css/bootstrap-datatable.css">
<script>
    $(document).ready(function(){
        $('.table').dataTable({
            "language" : {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "order": [[ 0, "desc" ]]
        });
    });
</script>
<div class="container-fluid">
<table class="table table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Usuario</th>
            <th class="text-left">Contrato</th>
            <th>Processo</th>
            <th class="text-center">Data</th>
            <th class="text-center">Valor antigo</th>
            <th class="text-center">Valor novo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listLogs as $item):?>
        <tr>
            <td class="text-center"><?php echo $item->getId();?></td>
            <td class="text-center"><?php echo $item->getUsuario();?></td>
            <?php 
            $c = new contrato($item->getIdcontrato());
            $c->select();
            ?>
            <td><?php echo $c->getNome();?></td>
            <td><?php echo $item->getProcesso();?></td>
            <td class="text-center"><?php echo date("d/m/Y H:i:s", strtotime($item->getDatatran()));?></td>
            <td class="text-center"><?php echo strlen($item->getValorantigo()) <= 10 ? $item->getValorantigo() : substr($item->getValorantigo(), 0, 10) . '...';?></td>
            <td class="text-center"><?php echo strlen($item->getValornovo()) <= 10 ? $item->getValornovo() : substr($item->getValornovo(), 0, 10) . '...';?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</div>


