<?php
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

include_once './class/contemplado.class.php';
include_once './class/contrato.class.php';
include_once './class/aluno.class.php';
include_once './class/logtran.class.php';
include_once './include/config.php';
//include './include/email.include.php';
include './email.include.php';

ob_start();

$data_abertura = strtotime($config->getData_abertura());
$data_encerramento = strtotime($config->getData_encerramento());
$data_hoje = strtotime('now');

if ($data_hoje >= $data_abertura && $data_hoje <= $data_encerramento) {

    if (isset($_GET['id']) && isset($_GET['ra'])) {

        $ra = $_GET['ra'];
        $id = $_GET['id'];
        $contrato = new contrato();
        $contrato->selectLastPerletivo();

        $c = new contemplado($ra, $contrato->getPerletivo());
        if ($c->select(false)) {
            $hash_id = sha1($c->getId());

            if ($c->getStatus() != contemplado::STATUS_CONFIRMADO) {

                if ($hash_id == $id) {
                    $contrato = new contrato($c->getIdcontrato());
                    $contrato->select();

                    $a = new aluno($c->getRa(), $c->getPerletivo(), $c->getCodcur());
                    $a->select();

                    $nome = ucfirst(strtolower($a->getNome()));
                    $nome = explode(' ', $nome);
                    $nome = $nome[0];

                    $data = date('Y-m-d H:i:s');

                    $c->setStatus(contemplado::STATUS_CONFIRMADO);
                    $c->setDataaceite($data);
                    $c->update();

                    $log = new logtran($c->getIdcontrato(), $a->getRa(), logtran::ACEITE, $data, logtran::ACEITE_EMAIL, logtran::ACEITE_CONFIRM);
                    $log->insert();
                    
                    $a->selectRM();

                    $send = "facens@facens.br";
                    
                    $dest = $a->getEmail() != '' ? $a->getEmail() : "{$a->getRa()}@li.facens.br";
                    $subj = "{$contrato->getNome()} Facens - Confirmada";

                    $corpo = "Parabéns $nome, sua {$contrato->getNome()} foi confirmada :)\n\n<br><br>";
                    $corpo.= "--\n<br>Facens - Faculdade de Engenharia de Sorocaba";

                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $headers .= "From: Facens <" . $send . ">\r\n";

                    //mail($dest, $subj, $corpo, $headers);
                    enviaEmail($dest, $subj, $corpo, strip_tags($corpo));

                    echo "<div class='container-fluid'>";
                    echo "<div class='text-center alert alert-success'>Parabéns {$nome} sua <b>{$contrato->getNome()}</b> está confirmada. :)</div>";
                    echo "</div>";
                } else {
                    echo "<div class='container-fluid'>";
                    echo "<div class='text-center alert alert-danger'>Código de confirmação inválido.</div>";
                    echo "</div>";
                }
            }else{
                echo "<div class='container-fluid'>";
                echo "<div class='text-center alert alert-info'>Bolsa já confirmada anteriormente :)</div>";
                echo "</div>";
            }
        }else{
            echo "<div class='container-fluid'>";
            echo "<div class='text-center alert alert-danger'>Confirmação inválida.</div>";
            echo "</div>";
        }
    }
} else {
    $data = date('d/m/Y', strtotime($config->getData_encerramento()));
    echo "<div class='container-fluid'>";
    echo "<div class='text-center alert alert-danger'>A data ({$data}) para confirmação da bolsa expirou.</div>";
    echo "</div>";
}

$corpo = ob_get_clean();
include './layout/page/mestre2.php';


