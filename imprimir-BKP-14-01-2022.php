<?php

include './include/email.include.php';
include './class/monitoria.class.php';

function getMes($mes){
    $mes = (int)$mes;
    $meses = array(
        '1' => 'Janeiro',
        '2' => 'Fevereiro',
        '3' => 'Março',
        '4' => 'Abril',
        '5' => 'Maio',
        '6' => 'Junho',
        '7' => 'Julho',
        '8' => 'Agosto',
        '9' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    );
    
    return $meses[$mes];
}

function enviarCopia() {

    global $data;

    $a = new aluno();
    $a = unserialize($_SESSION['aluno']);

    $c = new contemplado($a->getRa(), $a->getPerletivo());
    if ($c->select()) {

        $contrato = new contrato($c->getIdcontrato());
        $contrato->select();

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        //boofer com o html
        ob_start();
        if ($contrato->getTipo() == contrato::BOLSA_FILATROPICA) {
            include './layout/page/filantropica.php';
        }else if ($contrato->getTipo() == contrato::BOLSA_FUNDACRED) {
            include './layout/page/fundacred.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_MERITO) {
            include './layout/page/merito.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_MONITORIA){
            $monitoria = monitoria::selectProfessorByRa($a->getRa());
            $professor = $monitoria['professor'];
            
            if(in_array($contrato->getPerletivo(), array('2016s1','2017s1')) ){
                include './layout/page/bolsa_monitoria_' . $contrato->getPerletivo() . '.php';
            }else{
                include './layout/page/bolsa_monitoria.php';
            }
        } else if ($contrato->getTipo() == contrato::BOLSA_FIES){
            include './layout/page/fies.php';
        }


        $corpo = ob_get_clean();
        //include './layout/page/mestre2.php';
        //definindo caminho
        define('MPDF_PATH', 'include/mpdf/');
        include_once(MPDF_PATH . 'mpdf.php');

        //criando o objeto com os parametros de tipo de folha e margens
        $mpdf = new mPDF('c', 'A4', '', '', 10, 10, 5, 15);

        //incluindo rodapé
        $mpdf->defaultfooterline = 0;
        $mpdf->defaultfooterfontstyle = 'B';
        

        $content = 'Página {PAGENO} / {nbpg}';
        $data_aceite = $data != '' ? date('d/m/Y H:i:s', strtotime($data)) : '';


        //configurando paginas impares
        $mpdf->SetFooter(array(
            'L' => array(
                'content' => $content,
                'font-family' => 'arial',
                //'font-style' => '', /* blank, B, I, or BI */
                'font-size' => '9', /* in pts */
            ),
            'R' => array(
                'content' => $data_aceite,
                'font-family' => 'arial',
                //'font-style' => '', /* blank, B, I, or BI */
                'font-size' => '9', /* in pts */
            ),
            'line' => 0, /* 1 to include line below header/above footer */
                ), 'E'
        );
        //condigurando paginas pares
        $mpdf->SetFooter(array(
            'L' => array(
                'content' => $content,
                'font-family' => 'arial',
                //'font-style' => '', /* blank, B, I, or BI */
                'font-size' => '9', /* in pts */
            ),
            'R' => array(
                'content' => $data_aceite,
                'font-family' => 'arial',
                //'font-style' => '', /* blank, B, I, or BI */
                'font-size' => '9', /* in pts */
            ),
            'line' => 0, /* 1 to include line below header/above footer */
                ), 'O'
        );

        $mpdf->SetDefaultFontSize(11);
        $mpdf->SetDefaultFont("arial");
        //incluindo css
        $stylesheet = file_get_contents('layout/css/bolsa.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($corpo);

        $content = $mpdf->Output('mail.pdf', 'S');
        
        $a->selectRM();

        $mailto = $a->getEmail() != '' ? $a->getEmail() : "{$a->getRa()}@li.facens.br";
        $subject = $contrato->getNome() . ' Facens - Confirmação';
        $message = "Olá,<br><br>";
        $message .= 'Leia o contrato anexo e clique no link a seguir para confirmar sua bolsa: <br><br>';
        $link ='http://www3.facens.br/bolsa/confirmacao.php?ra=' . $a->getRa() . '&id=' . sha1($c->getId());
        $message .= "<a href='$link'>$link</a>";

        $is_sent = enviaEmailPdf(
                $mailto, $subject, $message, array('data' => $content, 'filename' => "Contrato {$contrato->getNome()}.pdf"));

        return $is_sent;
    }
    return false;
}

function imprimir() {
    
    //ini_set('display_errors', true);
    
    $a = new aluno();
    $a = unserialize($_SESSION['aluno']);

    $c = new contemplado($a->getRa(), $a->getPerletivo());
    if ($c->select(false)) {

        $contrato = new contrato($c->getIdcontrato());
        $contrato->select();

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        
        //boofer com o html
        ob_start();

        if ($contrato->getTipo() == contrato::BOLSA_FILATROPICA) {
            include './layout/page/filantropica.php';
        }else if ($contrato->getTipo() == contrato::INICIAÇÃO_CIENTIFICA) {
            include './layout/page/cientifico.php';
        }else if ($contrato->getTipo() == contrato::BOLSA_PRAVALER) {
            include './layout/page/pravaler.php';
        }else if ($contrato->getTipo() == contrato::BOLSA_FUNDACRED) {
            include './layout/page/fundacred.php';
        }else if ($contrato->getTipo() == contrato::BOLSA_MERITO) {
            include './layout/page/merito.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_MONITORIA){
            $monitoria = monitoria::selectProfessorByRa($a->getRa());
            $professor = $monitoria['professor'];
            
            if(in_array($contrato->getPerletivo(), array('2016s1','2017s1')) ){
                include './layout/page/bolsa_monitoria_' . $contrato->getPerletivo() . '.php';
            }else{
                include './layout/page/bolsa_monitoria.php';
            }
        } else if ($contrato->getTipo() == contrato::BOLSA_FIES){
            include './layout/page/fies.php';
        }

        $corpo = ob_get_clean();
        
        define('MPDF_PATH', 'include/mpdf/');
        
        //include './layout/page/mestre2.php';
        //definindo caminho
        include(MPDF_PATH . 'mpdf.php');

        //criando o objeto com os parametros de tipo de folha e margens
        $mpdf = new mPDF('c', 'A4', '', '', 10, 10, 5, 15);

        //incluindo rodapé
        $mpdf->defaultfooterline = 0;
        $mpdf->defaultfooterfontstyle = 'B';

        $content = 'Página {PAGENO} / {nbpg}';
        $data_aceite = $c->getDatamodif() != '' ? date('d/m/Y H:i:s', strtotime($c->getDatamodif())) : '';


        //configurando paginas impares
        $mpdf->SetFooter(array(
            'L' => array(
                'content' => $content,
                'font-family' => 'arial',
                //'font-style' => '', /* blank, B, I, or BI */
                'font-size' => '9', /* in pts */
            ),
            'R' => array(
                'content' => $data_aceite,
                'font-family' => 'arial',
                //'font-style' => '', /* blank, B, I, or BI */
                'font-size' => '9', /* in pts */
            ),
            'line' => 0, /* 1 to include line below header/above footer */
                ), 'E'
        );
        //condigurando paginas pares
        $mpdf->SetFooter(array(
            'L' => array(
                'content' => $content,
                'font-family' => 'arial',
                //'font-style' => '', /* blank, B, I, or BI */
                'font-size' => '9', /* in pts */
            ),
            'R' => array(
                'content' => $data_aceite,
                'font-family' => 'arial',
                //'font-style' => '', /* blank, B, I, or BI */
                'font-size' => '9', /* in pts */
            ),
            'line' => 0, /* 1 to include line below header/above footer */
                ), 'O'
        );

        $mpdf->SetDefaultFontSize(11);
        $mpdf->SetDefaultFont("arial");
        //incluindo css
        $stylesheet = file_get_contents('layout/css/bolsa.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($corpo);
        $mpdf->Output();
    }
}
