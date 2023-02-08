<?php

include './include/session.php';
include './include/access.php';
include_once './class/contrato.class.php';
include_once './class/usuario.class.php';
include_once './class/logtran.class.php';
include_once './class/bolsa.class.php';

checkAcesso(array(1,2));

ob_start();

$contrato = new contrato();
$bolsa = new bolsa();

if(isset($_POST['btnSalvar'])){

    $contrato->setId($_POST['id']);
    $contrato->setTipo($_POST['tipo']);
    $contrato->setNome(@$bolsa->selectBolsaId($_POST['tipo']));
    $contrato->setPerletivo($_POST['perletivo']);

    $dtinicio = explode('/', $_POST['dtinicio']);
    $dtinicio = array_reverse($dtinicio);
    $dtinicio = implode('-', $dtinicio);
    $contrato->setDtinicio($dtinicio);

    $dtfim = explode('/', $_POST['dtfim']);
    $dtfim = array_reverse($dtfim);
    $dtfim = implode('-', $dtfim);
    $contrato->setDtfim($dtfim);

    $contrato->setValorcredito(str_replace(',', '.', $_POST['valorcredito']));
    
    if($_POST['id'] == ''){
        
        $contrato->insert();
        $operador = unserialize($_SESSION['operador']);
        $tipo_bolsa = $bolsa->tipoBolsa();
        //$log = new logtran($contrato->getId(), $operador->getUsuario(), logtran::CONTRATO_INSERT, date('Y-m-d H:i:s'), '', serialize($contrato));
        //print_r($log);
        //$log->insert();
        header('Location: contrato.php');
        
    }else{
        
        $contrato->update();
        header('Location: contrato.php');
    }
}
else if(isset($_GET['new'])){
    $tipo_bolsa = $bolsa->tipoBolsa();
    include_once './layout/form/contrato.form.php';
    
}else if(isset($_GET['update'])){
    $contrato = new contrato($_GET['update']);
    $contrato->select();
    $contrato->setDtinicio(date('d/m/Y', strtotime($contrato->getDtinicio())));
    $contrato->setDtfim(date('d/m/Y', strtotime($contrato->getDtfim())));
    $tipo_bolsa = $bolsa->tipoBolsa();
	
    
    include_once './layout/form/contrato.form.php';
    
}else if(isset($_GET['delete'])){
    $contrato = new contrato($_GET['delete']);
    $contrato->delete();
    
    header('Location: contrato.php');
}

else{

$listContratos = $contrato->selectAll();
include_once './layout/grid/contrato.grid.php';

}

$corpo = ob_get_clean();
include './layout/page/mestre2.php';

