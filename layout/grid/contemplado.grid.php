<script type="text/javascript" src="layout/js/datatable-portugues.json"></script>
<script type="text/javascript" src="layout/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="layout/bootstrap/js/bootstrap-datatable.js"></script>
<script src="layout/highcharts/js/highcharts.js"></script>
<link rel="stylesheet" href="layout/bootstrap/css/bootstrap-datatable.css">
<script>
    $(document).ready(function(){
        $('.table').dataTable({
            "language" : {
                url: 'layout/js/datatable-portugues.json'
            },
            stateSave: true
        });
        
        $('select[name=perletivo], select[name=contrato]').change(function(){
            $('form').submit();
        });
    });
</script>
<script>
    function apagar(id){
        $('#myModal').modal();
        $('.apagar').attr('href', 'contemplado.php?delete=' + id);
    }
</script>
<div class="list-group col-sm-2">
    <?php if(in_array($operador->getTipo(),array(1,2))): ?>
    <a href="#" class="list-group-item disabled">Operações</a>
    <a href="contemplado.php?new" class="list-group-item">Novo contemplado</a><br>
    <?php endif; ?>

    <div id="container" style="min-width: 180px; height: 260px; max-width: 600px; margin: 0 auto"></div>
</div>
<div class="col-sm-10">
<fieldset>
    <legend>Contemplados com bolsa</legend>
</fieldset>
    <div class="table-responsive">
    <form class="container-fluid row">
        <div class="form-group col-sm-2">
            <label>Período Letivo</label>
            <select class="form-control" name="perletivo">
                <?php foreach ($lPerletivo as $item):?>
                <option <?php echo $c->getPerletivo() == $item['perletivo'] ? 'selected' : ''?> ><?php echo $item['perletivo'] ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label>Contrato</label>
            <select class="form-control" name="contrato">
                <option value="">Selecione...</option>
                <?php foreach ($listContratos as $item):?>
                <option value="<?php echo $item->getId() ?>" <?php echo $idcontrato == $item->getId() ? 'selected':'' ?>><?php echo $item->getNome() ?></option>
                <?php endforeach;?>
            </select>
        </div>
    </form><hr>
    <table class="table table-striped" style="overflow-x: auto">
        <thead>
            <tr>
                <!--<th class="text-center">ID</th>-->
                <th class="text-center">RA</th>
                <th class="col-sm-4 text-left">Nome</th>
                <th class="text-left">Curso</th>
                <th>Contrato</th>
                <th class="text-center">Valor</th>
                <th class="text-center">Status</th>
<!--                <th class="text-center">Data Contrato</th>-->
                <th class="text-center">Dt Aceite</th>
                <th class="text-center">#</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; $array_data = array("Pendente"=>0, "Confirmando"=>0, "Aceito"=>0, "Lancado"=>0, "Cancelado"=>0);?>
            <?php foreach ($listContemplados as $item): ?>
            <?php
                $total += 1;
                if($item->getStatus() == contemplado::STATUS_AGUARDANDO){
                    $array_data["Pendente"] = $array_data["Pendente"] + 1;
                }else if($item->getStatus() == contemplado::STATUS_ENVIADO_EMAIL){
                    $array_data["Confirmando"] = $array_data["Confirmando"] + 1;
                }else if($item->getStatus() == contemplado::STATUS_CONFIRMADO){
                    $array_data["Aceito"] = $array_data["Aceito"] + 1;
                }else if($item->getStatus() == contemplado::STATUS_LANCADO){
                    $array_data["Lancado"] = $array_data["Lancado"] + 1;
                }else if($item->getStatus() == contemplado::STATUS_CANCELADO){
                    $array_data["Cancelado"] = $array_data["Cancelado"] + 1;
                }
                
            ?>
                <tr>
                    <!--<td class="text-center"><?php echo $item->getId(); ?></td>-->
                    <td class="text-center"><?php echo $item->getRa(); ?></td>
                    <td><?php echo $item->getNome() ?></td>
                    <td><?php echo $item->getNome_curso() ?></td>
                    <td><?php echo $item->getNome_contrato(); ?></td>
                    <td class="text-center"><?php echo $item->getValorperc() * 100; ?>%</td>
                    <td class="text-center"><?php echo $item->getLabelStatus(); ?></td>
<!--                    <td class="text-center">--><?php //echo $item->getDatamodif() != '' ? date('d/m/Y', strtotime($item->getDatamodif())) : ''; ?><!--</td>-->
                    <td class="text-center"><?php echo $item->getDataaceite() != '' ? date('d/m/Y', strtotime($item->getDataaceite())) : ''; ?></td>
                    <td class="text-center">
                        <a href="contemplado.php?print=<?php echo $item->getId()?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                        <?php if(in_array($operador->getTipo(),array(1,2))): ?>
                            <a href="contemplado.php?update=<?php echo $item->getId()?>"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="javascript:apagar(<?php echo $item->getId()?>)"><span class="glyphicon glyphicon-trash"></span></a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
<?php 
$array = array(
    array('Em espera',$array_data['Pendente']),
    array('Em confirmação',$array_data['Confirmando']),
    array('name'=> 'Aceito',
                        'y' => $array_data['Aceito'],
                        'sliced' => true,
                        'selected'=> true
        ),
    array('Lançado',$array_data['Lancado']),
    array('Cancelado',$array_data['Cancelado']),
);
?>
<script>
    
    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            
            colors: ["#7cb5ec", "#f7a35c", "#90ee7e", "#aaeeee", "#ff0066", "#eeaaee","#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y:.0f} ({point.percentage:.1f}%)</b>'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Quantidade',
                data: <?php echo json_encode($array);?>
            }]
        });
    });
</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Alerta de Confirmação</h4>
      </div>
      <div class="modal-body">
        Deseja realmente apagar esse aluno contemplado?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
        <a href="#" class="apagar btn btn-danger">Sim</a>
      </div>
    </div>
  </div>
</div>

