<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);

error_reporting(E_ALL);

include './class/contrato.class.php';
include './class/contemplado.class.php';
include './class/curso.class.php';
include './class/usuario.class.php';
include './class/aluno.class.php';
include './class/logtran.class.php';
include './include/session.php';
include './include/access.php';
include './include/config.php';
include './imprimir.php';

checkAcesso(array(1,2,3));

ob_start();
$c = new contemplado();
$config = new config();
$config->select();
$c->setPerletivo($config->getPerletivo_atual());

///echo "<h1>".$config->getPerletivo_atual()."</h1>";

if(isset($_POST['btnSalvar'])){
    
    if($_POST['id'] != ''){
        $c->setId($_POST['id']);
        $c->selectById();
    }
    
    $c->setId($_POST['id']);
    $c->setRa($_POST['ra']);
    $c->setPerletivo($_POST['perletivo']);
    $c->setIdcontrato($_POST['idcontrato']);
    $c->setValorperc(str_replace(',','.', $_POST['valorperc'] / 100));
    $c->setStatus($_POST['status']);
    $c->setCodcur($_POST['codcur']);
   
    
    $log = new logtran();
    
    $log->setIdcontrato($c->getIdcontrato());
    $log->setUsuario(unserialize($_SESSION['operador'])->getUsuario());
    $log->setDatatran(date('Y-m-d H:i:s'));
    $log->setValornovo(base64_encode(serialize($c)));

    if($c->getId() == ''){
        $log->setProcesso(logtran::CONTEMPLADO_INSERT);
        $log->insert();
        
        $c->setDatamodif('');
        $c->setDataaceite('');
        
        $c->insert();
        header('Location: contemplado.php');
    }else{
        
//        if($c->getStatus() == contemplado::STATUS_ENVIADO_EMAIL){
//            $c->setDatamodif(date('Y-m-d H:i:s'));
//        }else if($c->getStatus() == contemplado::STATUS_CONFIRMADO){
//            $c->setDataaceite(date('Y-m-d H:i:s'));
//        }
        
        if($c->update()){
            
            $log->setProcesso(logtran::CONTEMPLADO_UPDATE);
        
            $ct = new contemplado();
            $ct->setId($c->getId());
            $ct->selectById();

            $log->setValorantigo(base64_encode(serialize($ct)));
            $log->insert();
            
        }
        header('Location: contemplado.php');
    }
    
}

else if(isset ($_GET['print'])){
    $c->setId($_GET['print']);
    $c->selectById();
    
    $contrato = new contrato($c->getIdcontrato());
    $contrato->select();
    
    $a = new aluno(trim($c->getRa()), $c->getPerletivo(), $c->getCodcur());
    $a->setValorcredito($contrato->getValorcredito());
    $a->select();
    
    $_SESSION['aluno'] = serialize($a);
    imprimir();
    exit();
    
}

else if(isset($_GET['new'])){
    include_once './layout/form/contemplado.form.php';
}

else if(isset($_GET['update'])){
    $c->setId($_GET['update']);
    $c->selectById();
    include_once './layout/form/contemplado.form.php';
}
else if(isset($_GET['delete'])){
    $c->setId($_GET['delete']);
    $c->delete();
    header('Location: contemplado.php');
}
else{
    $operador = isset($_SESSION['operador']) ? unserialize($_SESSION['operador']) : new usuario();

    $lPerletivo = $c->selectAllPerletivo();   
    $c->setPerletivo(isset($_GET['perletivo']) ? $_GET['perletivo'] : $lPerletivo[0]['perletivo']);
        
    $contrato = new contrato();
    $contrato->setPerletivo($c->getPerletivo());
    $listContratos = $contrato->selectAllByPerletivo();
    
    $idcontrato = isset($_GET['contrato']) ? $_GET['contrato'] : $listContratos[count($listContratos)-1]->getId();
    $listContemplados = $c->selectAllByPerletivo($idcontrato);
    include_once './layout/grid/contemplado.grid.php';
}

$corpo = ob_get_clean();
include './layout/page/mestre2.php';

