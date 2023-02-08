<div class="highlight col-sm-5">
    <fieldset>
        <legend>Dados</legend>
        <div class="img_perfil">
            <img src="http://172.16.0.120/controle/fotos/<?php echo $aluno->getMatricula() ?>.jpg" class="img-thumbnail">
        </div>
        <div class="row">
            <div ><strong>Nome: </strong> <?php echo $aluno->getNome(); ?></div>
            <div><strong>RG: </strong><?php echo $aluno->getRg(); ?><strong> Orgão Exp.: </strong><?php echo "{$aluno->getOrgao_expedidor()} / {$aluno->getEstado()}"; ?></div>
            <div><strong>Data Nascimento: </strong><?php echo $aluno->getNascimento(); ?></div>
            <div><strong>Nacionalidade: </strong><?php echo $aluno->getNacionalidade(); ?></div>
            <div><strong>Natural do Estado: </strong><?php echo $aluno->getNaturalidade(); ?></div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Curso</legend>
        <div class="row">
            <div ><strong>Registro Acadêmico: </strong><?php echo $aluno->getMatricula(); ?></div>
            <div><strong>Processo Seletivo: </strong><?php echo $aluno->getCurso()->getSeletivo(); ?></div>
            <?php
            $lbl_rend = 'label-primary';
                if ($aluno->getCurso()->getCoef_rendimento() > '0,5') {
                    $lbl_rend = 'label-success';
                }
                if ($aluno->getCurso()->getCoef_rendimento() == '0,5') {
                    $lbl_rend = 'label-warning';
                }
                if ($aluno->getCurso()->getCoef_rendimento() < '0,5') {
                    $lbl_rend = 'label-danger';
                }

                if ($aluno->getCurso()->getCoef_progressao() > '0,5') {
                    $lbl_prog = 'label-success';
                }
                if ($aluno->getCurso()->getCoef_progressao() == '0,5') {
                    $lbl_prog = 'label-warning';
                }
                if ($aluno->getCurso()->getCoef_progressao() < '0,5') {
                    $lbl_prog = 'label-danger';
                }
            ?>
            <div><strong>Coeficiente de Rendimento: </strong><span class="label <?php echo $lbl_rend ?>"><?php echo $aluno->getCurso()->getCoef_rendimento(); ?></span></div>
            <div><strong>Coeficiente de Progressão </strong><span class="label <?php echo $lbl_prog ?>"><?php echo $aluno->getCurso()->getCoef_progressao(); ?></span></div>
            <div><strong>Horas de Atividades Complementares: </strong><?php echo $aluno->getCurso()->getHoras_atividades(); ?> horas</div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Formação</legend>
        <div class="row">


            <div><strong>Colação de Grau: </strong><?php echo $aluno->getCurso()->getColacao(); ?></div>
            <div><strong>Expedição Diploma: </strong><?php echo $aluno->getCurso()->getDiploma(); ?></div>
        </div>
    </fieldset>
</div>
<div class="graph col-sm-5">
    <div id="g_evolucao"></div>
    <div id="g_materias"></div>
</div>
