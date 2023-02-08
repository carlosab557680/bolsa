<?php 

// Importar as classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';

function envia(){
    //$mail = new PHPMailer();

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


 echo envia();


?>