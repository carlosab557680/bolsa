<?php

include_once './class/usuario.class.php';

function checkAcesso($array) {
    if (isset($_SESSION['operador'])) {
        $operador = unserialize($_SESSION['operador']);
        $tipo = $operador->getTipo();
        if (!in_array($tipo, $array)) {
            session_destroy();
            header('Location: login.php');
        }
    } else {
        header('Location: login.php');
    }
}
