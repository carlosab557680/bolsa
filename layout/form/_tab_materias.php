<div style="margin-bottom: 20px;">
    <h3><?php echo $aluno->getCurso()->getNome(); ?></h3>
    <h5><?php echo $aluno->getCurso()->getDescricao(); ?></h5>
</div>
<div>
    <!--Conteudo vindo do ajax-->
    <div  class="cross" style="border: 1px solid #e1e1e8;">
        <form id="form_materias" action="materias.php" method="post" style="margin: 0;">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="alert-warning">
                        <th colspan="7">
                            <strong class="mr"><input <?php echo $status->getAproveitamento() == status::APROVEITAMENTO ? 'checked' : '' ?> type="checkbox" name="Status[aproveitamento]" value="<?php echo status::APROVEITAMENTO ?>" title="Materias aproveitadas de outro curso."/></strong><strong>Aproveitamento</strong>
                            <strong class="mr"><input <?php echo $status->getCursadas() == status::CURSADAS ? 'checked' : '' ?> type="radio" name="Status[cursadas]" value="<?php echo status::CURSADAS ?>" title="Todas as matérias cursadas."/></strong><strong>Cursadas</strong>
                            <strong class="plr"><input <?php echo $status->getCursadas() == status::APROVADAS ? 'checked' : '' ?> type="radio" name="Status[cursadas]" value="<?php echo status::APROVADAS ?>" title="Somente as matérias aprovadas."/></strong><strong>Aprovadas</strong>
                            <strong class="plr"><input <?php echo $status->getAtuais() == status::ATUAIS ? 'checked' : '' ?> type="checkbox" name="Status[atuais]" value="<?php echo status::ATUAIS ?>" title="Matérias sendo cursadas atualmente."/></strong><strong>Atuais</strong>
                            <strong class="plr"><input <?php echo $status->getPendentes() == status::PENDENTES ? 'checked' : '' ?> type="checkbox" name="Status[pendentes]" value="<?php echo status::PENDENTES ?>" title="Matérias que ainda serão cursadas."/></strong><strong>Pendentes</strong>
                            <button type="submit" id="filtro" data-loading-text="Carregando..." class="filter btn btn-warning btn-sm">
                                <span class="glyphicon glyphicon-filter"></span> Filtrar
                            </button>
                        </th>
                    <tr>
                        <th class="w40 tl">MATÉRIA</th>
                        <th class="w10 tc">SÉRIE</th>
                        <th class="w15 tc">PERÍODO</th>
                        <th class="w10 tc">CARGA HOR.</th>
                        <th class="w10 tc">NOTA</th>
                        <th class="w15 tc">SITUAÇÃO</th>
                    </tr>
                    </tr>
                </thead>
                <tbody id="grid-materias">
                    <?php if (isset($listDisciplinas)): ?>
                        <?php include './layout/grid/materias.grid.php'; ?>
                    <?php else: ?>
                        <tr>
                            <td class="w40 tl">Nenhum resultado</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </form>
    </div>
</div>