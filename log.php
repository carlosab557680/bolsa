<?php

include './class/contrato.class.php';
include './class/logtran.class.php';
include './include/session.php';
include './include/access.php';

checkAcesso(array(1));

ob_start();
$c = new logtran();
$listLogs = $c->selectAll();
include_once './layout/grid/logtran.grid.php';
$corpo = ob_get_clean();
include './layout/page/mestre2.php';

