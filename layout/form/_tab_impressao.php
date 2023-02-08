<script type="text/javascript" src="layout/js/aluno.js"></script>
<form class="form-horizontal" id="form_impressao" method="post" action="imprimir.php" target="_blank">
    <fieldset>
        <legend>Opçoes de Tradução</legend>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="nome">Idioma</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <select id="idioma" name="Curso[idioma]" class="form-control">
                                <option <?php echo $aluno->getCurso()->getIdioma() == curso::PORTUGUES ? ' selected' : '' ?> value="pt">Português</option>
                                <option <?php echo $aluno->getCurso()->getIdioma() == curso::INGLES ? ' selected' : '' ?> value="en">Inglês</option>
                            </select>
                            <span class="input-group-addon"  title="Idioma que será impresso o histórico."><i class="glyphicon glyphicon-flag"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Opções de Exibição</legend>
        <div class="checkbox">
            <label title="Imprimir coeficiente de rendimento.">
                <input type="checkbox" name="Curso[coef_rendimento]" checked value="<?php echo $aluno->getCurso()->getCoef_rendimento();?>"> Coeficiente de Rendimento
            </label>
        </div>
        <div class="checkbox">
            <label title="Imprimir coeficiente de progressão.">
                <input type="checkbox" name="Curso[coef_progressao]" checked value="<?php echo $aluno->getCurso()->getCoef_progressao();?>"> Coeficiente de Progressão
            </label>
        </div>
    </fieldset>
    <fieldset>
        <legend>Opções de Curso</legend>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="nome">Processo Seletivo</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <input style="width: 490px;" type="text" class="form-control" id="estagio" name="Curso[seletivo]" value="<?php echo $aluno->getCurso()->getSeletivo();?>">
                            <span class="input-group-addon" title="Mês/Ano em que ocorreu o processo seletivo."><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="form-group">
            <label class="col-sm-2 control-label" for="nome">Título Obtido</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="titulo" name="Curso[titulo]" value="<?php //echo $aluno->getCurso()->getTitulo();?>" style="width: 300px;">
                            <span class="input-group-addon" title="Título obtido ao concluir o curso."><i class="glyphicon glyphicon-pushpin"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="form-group">
            <label class="col-sm-2 control-label" for="nome">Horas de Estágio</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="estagio" name="Curso[horas_estagio]" value="<?php echo $aluno->getCurso()->getHoras_estagio();?>">
                            <span class="input-group-addon" title="Quantidade de horas concluídas no estágio obrigatório."><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="nome">Horas de Ativ. Complem.</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="atividades" name="Curso[horas_atividades]" value="<?php echo $aluno->getCurso()->getHoras_atividades();?>">
                            <span class="input-group-addon" title="Quantidade de horas concluídas com atividades complementares."><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="">Reconhecimento</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <textarea name="Curso[reconhecimento]" class="form-control" cols="70" rows="3"  title="Reconhecimento da Portaria."><?php echo $aluno->getCurso()->getIdioma() == curso::PORTUGUES ? $aluno->getCurso()->getDescricao() : $aluno->getCurso()->getDescricao_en(); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="">Observações</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <textarea name="Curso[observacao]" class="form-control" cols="70" rows="7"  title="Uma observação desejada."><?php echo $aluno->getCurso()->getIdioma() == curso::PORTUGUES ? $aluno->getCurso()->getObservacao() : $aluno->getCurso()->getObservacao_en(); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Opções de Formatura</legend>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="nome">Data Colação de Grau</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group date">
                            <input type="text" class="data form-control" name="Curso[colacao]" value="<?php echo $aluno->getCurso()->getColacao(); ?>">
                            <span class="input-group-addon" title="Data da colação de grau do aluno."><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="nome">Data Expedição do Diploma</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group date">
                            <input type="text" class="data form-control" name="Curso[diploma]" value="<?php echo $aluno->getCurso()->getDiploma(); ?>">
                            <span class="input-group-addon"  title="Data da expedição do diploma de formado."><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>             
    </fieldset>
    <fieldset>
        <legend>Outras Opções</legend>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="nome">Data de Impressão</label>
            <div class="col-sm-10">
                <div class="form-inline">
                    <div class="form-group">
                        <div class="input-group date">
                            <input type="text" class="data form-control" name="Curso[data_impressao]" value="<?php echo date('d/m/Y') ?>">
                            <span class="input-group-addon" title="Data da colação de grau do aluno."><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>           
    </fieldset>
    <button type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-print"></span> Imprimir
    </button>
</form>