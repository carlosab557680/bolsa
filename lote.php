<?php

set_time_limit(0);

include './include/session.php';
include './include/access.php';
include './include/config.php';
include './class/contemplado.class.php';
include './class/aluno.class.php';
include './class/contrato.class.php';

ob_start();

$perletivo = '2019S1';

$array = array(
array('ra' => '163306', 'bolsa' =>	1  ),



);

$porcentagem = 0;
$idcontrato = 4;

$contrato = new contrato;
$contrato->setId($idcontrato);
$contrato->select();

if (isset($_GET['add'])) {

    $list = $listAdd = array();
    foreach ($array as $item) {

        $a = new aluno(trim($item['ra']), $perletivo);
        $a->selectRM();
        $list[] = $a;

        $c = new contemplado;
        $c->setRa($a->getRa());
        $c->setPerletivo($contrato->getPerletivo());
        $c->setCodcur($a->getCodcur());

        $c->setValorperc($item['bolsa']);
        $c->setStatus(0);
        $c->setIdcontrato($idcontrato);

        if ($c->insert()) {
            //echo "{$a->getRa()} - {$a->getNome()} - OK<br>";
            $listAdd[$a->getRa()] = 1;
        } else {
            $listAdd[$a->getRa()] = 0;
        }
    }
} else {
    $list = $listAdd = array();
    foreach ($array as $item) {
        $a = new aluno(trim($item['ra']), $perletivo);
        $a->selectRM();
        $list[] = $a;
    }
}

include './layout/form/lote.form.php';
$corpo = ob_get_clean();
include './layout/page/mestre2.php';

