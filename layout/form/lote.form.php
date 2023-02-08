<ol class="breadcrumb">
    <li><a href="./">Página Inicial</a></li>
    <li>Adição de contemplados por lote</li>
</ol>
<div class="container-fluid">
    <div class="list-group col-sm-2">
        <a href="#" class="list-group-item active">Operações</a>
        <a href="?add" class="list-group-item">Adicionar contemplados</a>
    </div>
    <div class="col-sm-10">
        <fieldset>
            <legend>Inclusão - Lote de Alunos</legend>
        </fieldset>
        <p>
            <strong>Porcentagem de bolsa: </strong> <?php echo $porcentagem * 100; ?>% 
            <strong style="margin-left: 50px"> Contrato: </strong> <?php echo $contrato->getId() . ' - ' . $contrato->getNome() . " ({$contrato->getPerletivo()})" ; ?>
            <strong style="margin-left: 50px">Quantidade de alunos: </strong> <?php echo count($list); ?>
        </p>
        <?php if (isset($list)): ?>
            <div>
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>RA</th>
                            <th>Nome</th>
                            <th>Curso</th>
                            <?php if(isset($_GET['add'])): ?>
                            <th>Status</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $aluno): ?>
                            <tr>
                                <td><?php echo $aluno->getRa(); ?></td>
                                <td><?php echo $aluno->getNome(); ?></td>
                                <td><?php echo $aluno->getNomeCurso(); ?></td>
                                <?php if(isset($_GET['add'])): ?>
                                <td><i class="glyphicon glyphicon-<?php echo $listAdd[$aluno->getRa()] == 1 ? 'ok text-success' : 'remove text-danger' ?>"></i></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
