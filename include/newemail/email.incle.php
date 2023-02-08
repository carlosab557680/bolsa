<?php
// Importar as classes teste Carlos
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';


function enviaEmail() {
    $mail = new PHPMailer(true);
    global $usuario;
	
    //$hash = base64_encode(date('Y-m-d', strtotime('now')).$usuario->getLogin());
    $hash = fcrypt::encrypt(date('Y-m-d', strtotime('now')) . $usuario->getLogin());
    $hash = urlencode($hash);

	$dest = $usuario->getEmail();
	$dest = 'carlos.barbosa@facens.br';
    $send_name = 'Facens';
    $send = "noreply@facens.br";

    $subj = "Troca de senha";
    $corpo = "Olá, você esqueceu sua senha e está tentando alterá-la? \r\n\r\n<br><br>";
    $corpo .= "Se sim, clique no link: <a href='https://www3.facens.br/global/trocasenha?code=$hash'>http://www3.facens.br/global/trocasenha?code=$hash</a>\r\n\r\n<br><br>";
    $corpo .= "Se não, desconsidere esse e-mail.\r\n\r\n<br><br>";
    $corpo .= "Facens - Faculdade de Engenharia de Sorocaba.";
    
    ob_start();
    $code = $hash;
    include './layout/grid/_email_troca_senha.grid.php';
    $corpo = ob_get_clean();

    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type:text/html;charset=UTF-8\r\n";
    $header .= "From: " . $send_name . " <" . $send . ">\r\n";


	$mail->IsSMTP(); // envia por SMTP /Carlos ///era esse o principal problema de envio de e-mail somente para e-mail interno
	
	$mail->Host = "smtp.office365.com"; // Servidor SMTP
    ///$mail->SMTPSecure = "starttls"; //Tipo de criptografia
	///$mail->SMTPSecure = "tls"; //Tipo de criptografia

	$mail->True; //Carlos
    $mail->Port = 587; 
	$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação /Carlos ///era esse o principal problema de envio de e-mail somente para e-mail interno
    //$mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
    //$mail->Debugoutput = 'html';
    $mail->Username = 'noreply@facens.br'; // Usuário do servidor SMTP
    $mail->Password = 'n0r3pl@y'; // Senha do servidor SMTP
    // Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->From = "noreply@facens.br"; // Seu e-mail
    $mail->FromName = "Facens"; // Seu nome

    $mail->AddAddress($dest);
    ///$mail->AddBCC('carlosaugusto.b@gmail.com'); // Cópia Oculta
  
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	$mail->CharSet = 'UTF-8'; //&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
    //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

    $mail->Subject = $subj; // Assunto da mensagem
    $mail->Body = str_replace('\r\n', '', $corpo);
    $mail->AltBody = str_replace('<br>', '', $corpo);

    //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
 
    $enviado = $mail->Send();
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
    //return $dest;
	return $enviado;

}
 

function enviaSimpleEmail($remetente, $assunto, $msg, $cco = '') {

    $dest = $remetente;
    $send_name = 'Facens';
    $send = "noreply@facens.br";

    $subj = $assunto;
    $corpo = $msg;
    $corpo .= "<br><br>\n\r\n\rFacens - Faculdade de Engenharia de Sorocaba";
    
    // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
    ////////include_once("./include/PHPMailer/PHPMailerAutoload.php");
    // Inicia a classe PHPMailer
    $mail = new PHPMailer();
    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    ///$mail->IsSMTP(); // Define que a mensagem será SMTP
    $mail->Host = "smtp.office365.com"; // Endereço do servidor SMTP
    $mail->SMTPSecure = "starttls"; //Tipo de criptografia
    $mail->Port = "587"; //SMTP Port
    //$mail->SMTPDebug  = 3;                     // enables SMTP debug information (for testing)
    //$mail->Debugoutput = 'html';
    $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
    $mail->Username = 'noreply@facens.br'; // Usuário do servidor SMTP
    $mail->Password = 'n0r3pl@y'; // Senha do servidor SMTP
    // Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->From = "noreply@facens.br"; // Seu e-mail
    $mail->FromName = "Facens"; // Seu nome
    // Define os destinatário(s)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress($dest);
    //$mail->AddAddress('flagila@gmail.com');
    //$mail->addBCC($cco, 'Global'); // Copia
    //$mail->addCC($cco, 'Global'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta/
	/////$mail->addCC('carlosaugusto.b@gmail.com', 'Teste Facens');
	
    // Define os dados técnicos da Mensagem
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'utf-8';
    //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
    // Define a mensagem (Texto e Assunto)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->Subject = $subj; // Assunto da mensagem
    $mail->Body = str_replace('\r\n', '', $corpo);
    $mail->AltBody = str_replace('<br>', '', $corpo);
    // Define os anexos (opcional)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
    // Envia o e-mail
    $enviado = $mail->Send();
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
    // Exibe uma mensagem de resultado
    return $enviado;

}

echo enviaEmail();

echo "vamos ver";
?>

