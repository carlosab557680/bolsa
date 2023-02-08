<?php

include './include/session.php';
include './include/access.php';
include_once './class/config.class.php';
include_once './include/config.php';

checkAcesso(array(1,2));

ob_start();

if(isset($_POST['btnAtualizar'])){
    
    $config->setId($_POST['id']);
    $config->setPerletivo_atual($_POST['perletivo_atual']);
    
    $data_abertura = explode("/", $_POST['data_abertura']);
    $data_abertura = array_reverse($data_abertura);
    $data_abertura = implode("-", $data_abertura);
    $config->setData_abertura($data_abertura . ' ' . $_POST['hora_abertura']);
    
    $data_encerramento = explode("/", $_POST['data_encerramento']);
    $data_encerramento = array_reverse($data_encerramento);
    $data_encerramento = implode("-", $data_encerramento);
    $config->setData_encerramento($data_encerramento . ' ' . $_POST['hora_encerramento']);
    
    if($config->update()){
        
        $_SESSION['config'] = serialize($config);
    }
}

include './layout/form/config.form.php';
$corpo = ob_get_clean();
include './layout/page/mestre2.php';
