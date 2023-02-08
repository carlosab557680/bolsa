<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);


include './class/usuario.class.php';

if (isset($_POST['Usuario'])) {
    $login = $_POST['Usuario']['login'];
    $senha = $_POST['Usuario']['senha'];
    try {
        $usuario = new usuario();
        $usuario->setUsuario($login);
        $usuario->setSenha($senha);

        if ($usuario->login()) {
            session_name('bolsa');
            session_start();
            $_SESSION['operador'] = serialize($usuario);
            header('Location: ./');
        } else {
            $msg = 'Usuário ou senha incorretos.';
        }
    } catch (Exception $ex) {
        $msg = $ex->getMessage();
    }
}

include './layout/page/login.php';


