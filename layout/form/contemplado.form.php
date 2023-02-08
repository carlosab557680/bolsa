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
        <a href="contemplado.php?new" class="list-group-item">Novo contemplado</a>
        <a href="contemplado.php" class="list-group-item">Gerenciar contemplados</a>
        
</div>
<div class="col-sm-8">
    <fieldset>
        <legend>Formulário de Contemplado</legend>
    </fieldset>
    <form method="post" class="form-horizontal col-sm-6" role="form">
        <div>
            <input type="hidden" name="id" value="<?php echo $c->getId()?>" />
            <div class="form-group">
                <label for="ra" class="col-sm-12">RA</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="ra" name="ra"
                           placeholder="Digite um RA" value="<?php echo $c->getRa()?>">
                </div>
            </div>
            <div class="form-group">
                <label for="perletivo" class="col-sm-12">Período Letivo</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="perletivo" name="perletivo"
                           placeholder="Digite o Período Letivo" value="<?php echo $c->getPerletivo()?>">
                </div>
            </div>
            <div class="form-group">
                <label for="idcontrato" class="col-sm-12">Tipo da Bolsa</label>
                <div class="col-sm-12">
                    <select class="form-control" id="idcontrato" name="idcontrato">
                        <option value="0">Selecione...</option>
                        <?php 
                        $contrato = new contrato();
                        $contrato->setPerletivo($config->getPerletivo_atual());
                        $list = $contrato->selectAllByPerletivo();
                        foreach ($list as $item):
                    ?>
                        <option <?php echo $c->getIdcontrato() == $item->getId() ? 'selected' : ''?> value="<?php echo $item->getId()?>"><?php echo $item->getNome()?></option>
                    <?php endforeach;?>
                    </select>
                    
                </div>
            </div>
            <div class="form-group">
                <label for="valorperc" class="col-sm-12">Valor Percentual (%)</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="valorperc" name="valorperc"
                           placeholder="Digite o valor percentual de bolsa" value="<?php echo $c->getValorperc() * 100?>">
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-12">Status</label>
                <div class="col-sm-12">
                    <select class="form-control" id="status" name="status">
                        <option value="">Selecione...</option>
                        <option <?php echo $c->getStatus() == 0 ? 'selected' : ''?> value="0">Em espera</option>
                        <option <?php echo $c->getStatus() == 1 ? 'selected' : ''?> value="1">Em confirmação</option>
                        <option <?php echo $c->getStatus() == 2 ? 'selected' : ''?> value="2">Aceito</option>
                        <option <?php echo $c->getStatus() == 3 ? 'selected' : ''?> value="3">Lançado</option>
                        <option <?php echo $c->getStatus() == 4 ? 'selected' : ''?> value="4">Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="codcur" class="col-sm-12">Curso</label>
                <div class="col-sm-12">
                    <select class="form-control" id="codcur" name="codcur">
                        <option value="">Selecione...</option>
                        <?php 
                            $curso = new curso();
                            $list = $curso->selectAll();
                            foreach ($list as $item):
                        ?>
                        <option <?php echo $item->getCodcur() == $c->getCodcur() ? 'selected' : ''?> 
                            value="<?php echo $item->getCodcur()?>"><?php echo $item->getNome()?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" name="btnSalvar" class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus-sign"></i> Salvar
                    </button>
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
