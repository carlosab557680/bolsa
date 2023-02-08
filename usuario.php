<?php

include './class/usuario.class.php';
include './include/session.php';
include './include/access.php';

checkAcesso(array(1));

ob_start();
$usuario = new usuario();

if(isset($_POST['btnSalvar'])){
    
    $usuario->setId($_POST['id']);
    $usuario->setTipo($_POST['tipo']);
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setNome($_POST['nome']);
    
    if($usuario->getId() == ''){
        $usuario->insert();
    }else{
        $usuario->update();
    }
    
    header('Location: usuario.php');
}

else if(isset($_GET['update'])){
    $usuario->setUsuario($_GET['update']);
    $usuario->select();
    include './layout/form/usuario.form.php';
}

else if(isset($_GET['new'])){
    include './layout/form/usuario.form.php';
}

else if(isset($_GET['delete'])){
    $usuario->setId($_GET['delete']);
    $usuario->delete();
    header('Location: usuario.php');
}

else{
    $listUsuarios = $usuario->selectAll();
    include_once './layout/grid/usuario.grid.php';
}
$corpo = ob_get_clean();
include './layout/page/mestre2.php';

