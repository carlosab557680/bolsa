<link rel="stylesheet" href="layout/bootstrap/css/bootstrap-timepicker.css">
<link rel="stylesheet" href="layout/bootstrap/css/datepicker.css">
<script type="text/javascript" src="layout/bootstrap/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="layout/bootstrap/js/bootstrap-timepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.datepicker').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy",
            todayHighlight: true
            
        });
        $('.timepicker').timepicker({
            minuteStep: 1,
            showInputs: false,
            disableFocus: true,
            defaultTime: false,
            showMeridian: false
        });
    });
    
</script>
<fieldset>
    <legend>Configurações</legend>
</fieldset>

<form method="post" class="form-horizontal center-block col-sm-4" role="form" style="float: none; margin: 50px auto;">
    <div>
        <input type="hidden" name="id" value="<?php echo $config->getId()?>">
        <div class="form-group">
            <label for="perletivo" class="col-sm-12">Período Letivo Atual</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="perletivo_atual" name="perletivo_atual" value="<?php echo $config->getPerletivo_atual()?>">
            </div>
        </div>
        <div class="form-group">
            <label for="cpf" class="col-sm-12">Data e Hora de Abertura</label>
            <div class="col-sm-8">
                <input type="text" class="form-control datepicker" id="data_abertura" name="data_abertura" value="<?php echo date('d/m/Y', strtotime($config->getData_abertura()))?>">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control timepicker" id="hora_abertura" name="hora_abertura" value="<?php echo date('H:i', strtotime($config->getData_abertura()))?>">
            </div>
        </div>
        <div class="form-group">
            <label for="cpf" class="col-sm-12">Data e Hora de Encerramento</label>
            <div class="col-sm-8">
                <input type="text" class="form-control datepicker" id="data_encerramento" name="data_encerramento" value="<?php echo date('d/m/Y', strtotime($config->getData_encerramento()))?>">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control timepicker" id="hora_encerramento" name="hora_encerramento" value="<?php echo date('H:i', strtotime($config->getData_encerramento()))?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" name="btnAtualizar" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </div>   
</form>
