<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Importar as classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';

function enviarCopiateste(){
    $mail = new PHPMailer(true);

    //$mailDestino = "carlos.barbosa@facens.br";
    $mailDestino = "carlosaugusto.b@gmail.com";
    $nome = "Carlones";
    $mensagem = "Teste Mensagem";

    //smtp.office365.com
    //starttls
    //tls
   // noreply@facens.br
    //n0r3pl@y

    $mail->IsSMTP(); // envia por SMTP 
    $mail->CharSet = 'UTF-8';
    $mail->True;
    $mail->Host = "smtp.office365.com"; // Servidor SMTP
    $mail->Port = 587; 
    $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
    $mail->Username = "noreply@facens.br"; // SMTP username
    $mail->Password = "n0r3pl@y"; // SMTP password
    $mail->From = "noreply@facens.br"; // From
    $mail->FromName = "Facens" ; // Nome de quem envia o email
    $mail->AddAddress($mailDestino, $nome); // Email e nome de quem receberá //Responder
    $mail->WordWrap = 50; // Definir quebra de linha
    $mail->IsHTML = true ; // Enviar como HTML
    $mail->Subject = $assunto ; // Assunto
    $mail->Body = '<br/>' . $mensagem . '<br/>' ; //Corpo da mensagem caso seja HTML
    $mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML

    return $mail->Send();
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
        if ($contrato->getTipo() == contrato::BOLSA_FIES){
            include './layout/page/fies.php';
        }else if($contrato->getTipo() == contrato::BOLSA_FUNDACRED){
			include './layout/page/fundacred.php';
        } else if($contrato->getTipo() == contrato::BOLSA_PRAVALER){
			include './layout/page/pravaler.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_FILATROPICA) {
            include './layout/page/filantropica.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_MERITO) {
            include './layout/page/merito.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_MONITORIA){
            include './layout/page/bolsa_monitoria.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_FIES){
            include './layout/page/fies.php';
        }else if ($contrato->getTipo() == contrato::INICIAÇÃO_CIENTIFICA){
            include './layout/page/cientifico.php';
        }
        $corpo = ob_get_clean();
        //include './layout/page/mestre2.php'; //já estava comentado
        //definindo caminho
        //define('MPDF_PATH', 'include/mpdf/');
        //include_once(MPDF_PATH . 'mpdf.php');
		
		$mpdf = new \Mpdf\Mpdf([
			'tempDir' => __DIR__ . '/tmp'
		]);
        ///$mpdf = new mPDF('c', 'A4', '', '', 10, 10, 5, 15);

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

        //$email = $a->getEmail();
        $email = 'carlosaugusto.b@gmail.com';
		//var_dump(sha1($c->getId()));
		echo $a->getRa()." === ".$sid = sha1($c->getId());
		echo "<br>";

        //$mailto = $a->getEmail() != '' ? $a->getEmail() : "{$a->getRa()}@li.facens.br";
		$mailto = $email;
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


 //echo envia();


?>