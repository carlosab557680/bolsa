<?php

ini_set('display_errors', TRUE);
set_time_limit(0);

include_once './include/session.php';
include_once 'imprimir.php';
include_once 'class/bd/banco.class.php';
include_once 'class/contemplado.class.php';
include_once 'class/contrato.class.php';
include_once 'class/aluno.class.php';

$con = banco::con();
$query = "select * from contemplado where perletivo = '2022s2' and status = 1;";
$list = array();
if (function_exists('mssql_connect')) {
    $result = mssql_query($query, $con);
    if (mssql_num_rows($result) > 0) {
        while ($row = mssql_fetch_assoc($result)) {
            $c = new contemplado();
            foreach ($row as $key => $value) {
                $cl = ucfirst($key);
                $c->{"set$cl"}($value);
            }
            $list[] = $c;
        }
    }
} else if (function_exists('sqlsrv_connect')) {
    $opt = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $result = sqlsrv_query($con, $query, array(), $opt);
    if (sqlsrv_num_rows($result) > 0) {
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $c = new contemplado();
            foreach ($row as $key => $value) {
                $cl = ucfirst($key);
                $c->{"set$cl"}($value);
            }
            $list[] = $c;
        }
    }
}

for ($i = 0; $i < count($list); $i++) {
    $c = $list[$i];
    $a = new aluno($c->getRa(), $c->getPerletivo(), $c->getCodcur());
    $a->select();
    $_SESSION['aluno'] = serialize($a);
    $data = $c->getDatamodif();
	
    enviarCopia();

}




