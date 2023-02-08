<?php
// Importar as classes - namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';

function enviaEmailPdf($dest, $assunto, $corpoHtml, $array_content, $corpoText = '') {
    $mail = new PHPMailer(true);
    //$mailDestino = "carlosaugusto.b@gmail.com";
	//$mailDestino = "carlos.barbosa@facens.br";
	$mailDestino = $dest;
	if($dest == "jo_bieco@hotmail.com"){
		$mailDestino = "carlosaugusto.b@gmail.com";
	}else{
		$mailDestino = $dest;
	}
	
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
	$mail->IsHTML(true); 
    $mail->Subject = $assunto ; // Assunto
    //$mail->Body = '<br/>' . $mensagem . '<br/>' ; //Corpo da mensagem caso seja HTML
	$mail->Body = $corpoHtml;
	$mail->AltBody = $corpoText;
    //$mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML
	$mail->addStringAttachment($array_content['data'], $array_content['filename']);
	return $mail->Send();
	
	$mail->ClearAllRecipients();
    $mail->ClearAttachments();
}
function enviaEmail($dest, $assunto, $corpoHtml, $corpoText = '') {
	$mail = new PHPMailer(true);
	//$mailDestino = "carlosaugusto.b@gmail.com";
	$mailDestino = $dest;
	
	if($dest == "jo_bieco@hotmail.com"){
		$mailDestino = "carlosaugusto.b@gmail.com";
	}else{
		$mailDestino = $dest;
	}
	
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
	$mail->Subject = $assunto; // Assunto da mensagem
	$mail->AddAddress($mailDestino, $nome); // Email e nome de quem receberá //Responder
	$mail->WordWrap = 50; // Definir quebra de linha
	$mail->IsHTML(true); 
	$mail->Body = $corpoHtml;
	$mail->AltBody = $corpoText;
    return $mail->Send();
}
function enviaEmailContato($dest, $assunto, $corpoHtml, $corpoText = '') {
	$mail = new PHPMailer(true);
	//$mailDestino = "carlosaugusto.b@gmail.com";
	$mailDestino = $dest;
	
	if($dest == "jo_bieco@hotmail.com"){
		$mailDestino = "carlosaugusto.b@gmail.com";
	}else{
		$mailDestino = $dest;
	}
	
	$mail->IsSMTP(); // envia por SMTP 
	$mail->CharSet = 'UTF-8';
	$mail->True;
	$mail->Host = "smtp.office365.com"; // Servidor SMTP
	$mail->Port = 587;
    $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação	
	$mail->Username = "noreply@facens.br"; // SMTP username
	$mail->Password = "n0r3pl@y"; // SMTP password
	$mail->From = "noreply@facens.br"; // From
	$mail->FromName = "Contato - Cursos de férias | Facens"; // Seu nome
	$mail->Subject = $assunto; // Assunto da mensagem
	$mail->AddAddress($mailDestino); // Email e nome de quem receberá //Responder
	$mail->WordWrap = 50; // Definir quebra de linha
	$mail->IsHTML(true); 
	$mail->Body = $corpoHtml;
	$mail->AltBody = $corpoText;
    return $mail->Send();
}
?>

