<link rel="stylesheet" href="layout/bootstrap/css/datepicker.css">
<script type="text/javascript" src="layout/bootstrap/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.datepicker').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy",
            todayHighlight: true
            
        });
    });
    
</script>
<div class="list-group col-sm-3">
        <a href="#" class="list-group-item disabled">Operações</a>
        <a href="contrato.php?new" class="list-group-item">Novo contrato</a>
        <a href="contrato.php" class="list-group-item">Gerenciar contratos</a>
</div>
<div class="col-sm-8">
    <fieldset>
        <legend>Formulário de Contrato</legend>
    </fieldset>
    <form method="post" class="form-horizontal col-sm-6" role="form">
        <div>
            <input type="hidden" name="id" value="<?php echo $contrato->getId()?>" />
            <div class="form-group">
                <label for="nome" class="col-sm-12">Tipo da Bolsa</label>
                <div class="col-sm-12">
                    <select class="form-control" id="nome" name="tipo">
                        <option value="0">Selecione...</option>
                        <?php foreach($tipo_bolsa as $item) : ?>
                            <option <?php echo $contrato->getTipo() == $item->getId() ? 'selected' : ''?> value="<?php echo $item->getId() ?>"><?php echo $item->getBolsa() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="perletivo" class="col-sm-12">Período Letivo</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="perletivo" name="perletivo" placeholder="Digite o Período Letivo" value="<?php echo $contrato->getPerletivo()?>">
                </div>
            </div>
            <div class="form-group">
                <label for="dtinicio" class="col-sm-12">Data Inicial</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control datepicker" id="dtinicio" name="dtinicio" placeholder="Digite a data inicial do contrato" value="<?php echo $contrato->getDtinicio()?>">
                </div>
            </div>
            <div class="form-group">
                <label for="dtfim" class="col-sm-12">Data Final</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control datepicker" id="dtfim" name="dtfim" placeholder="Digite a data final do contrato" value="<?php echo $contrato->getDtfim()?>">
                </div>
            </div>
            <div class="form-group">
                <label for="valorcredito" class="col-sm-12">Valor Unitário do Crédito</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="valorcredito" name="valorcredito" placeholder="Digite o valor de cada crédito" value="<?php echo $contrato->getValorcredito()?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" name="btnSalvar" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Salvar</button>
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
