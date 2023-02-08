<form method="post" class="form-horizontal center-block col-sm-4" role="form" style="float: none; margin: 50px auto;">
    <div>
        <div class="alert alert-info" role="alert">
             Selecione a bolsa que deseja visualizar o contrato.
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <select class="form-control" id="curso" name="curso">
                    <?php foreach ($listContemplados as $item): 
                        $contrato = new contrato($item->getIdcontrato()); 
                        $contrato->select();
                        
                        $a = new aluno($item->getRa(), $item->getPerletivo(), $item->getCodcur());
                        $a->select();
                    ?>
                    <option value="<?php echo $item->getIdcontrato()?>"><?php echo "{$contrato->getNome()} - {$a->getNomecurso()}"?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div><br>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" name="btnEntrar" class="btn btn-primary">Ver Contrato</button>
            </div>
        </div>
    </div>

</form>
