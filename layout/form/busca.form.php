<br>
<form class="form-horizontal container-fluid" role="form" method="post">
<!--    <fieldset>
        <legend>Histórico do Aluno</legend>-->
    <div class="form-group">
        <label class="col-sm-2 control-label" for="matricula">Matrícula</label>
        <div class="col-sm-10">
            <div class="form-inline">
                <div class="form-group">
                    <?php if(isset($aluno) && $aluno->getNome() != ''):?>
                    <input type="text" value="<?php echo $aluno->getMatricula()?>" 
                           class="form-control" name="matricula" id="matricula" placeholder="Digite um RA" readonly>
                    <?php else:?>
                    
                    <!--<div class="input-group">-->
                        <!--<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>-->
                        <input type="text" value="" 
                           class="form-control" name="matricula" id="matricula" placeholder="Digite um RA">
                      <!--</div>-->
                    
                    <button type="submit" class="btn btn-primary" name="procurar">
                        <span class="glyphicon glyphicon-search"></span> Procurar
                    </button>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($aluno) && $aluno->getNome() != ''):?>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="nome">Nome</label>
        <div class="col-sm-10">
            <div class="form-inline">
                <div class="form-group">
                    <input type="text" value="<?php echo $aluno->getNome();?>" class="form-control" id="matricula" style="width: 400px;" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="cursos">Cursos</label>
        <div class="col-sm-10">
            <div class="form-inline">
                <div class="form-group">
                    <select name="curso" class="form-control" id="curso">
                        <?php 
                            $curso = new curso();
                            $listCursos = $curso->cursosPorAluno($aluno->getMatricula());
                            foreach ($listCursos as $item):
                        ?>
                        <option value="<?php echo "{$item->getCodigo()}|{$item->getPeriodo()}"?>"><?php echo $item->getNome();?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2">
            <button type="submit" name="carregar" class="btn btn-primary">
                <span class="glyphicon glyphicon-folder-open"></span> Abrir
            </button>
            <a href="./" class="btn btn-primary">
                <span class="glyphicon glyphicon-user"></span> Novo
            </a>
        </div>
    </div>
    <?php endif;?>
    <!--</fieldset>-->
</form>

