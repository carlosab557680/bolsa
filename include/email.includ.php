<?php

function enviaEmail($dest, $assunto, $corpoHtml, $corpoText = '') {
 
    // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
    include_once("./include/PHPMailer/PHPMailerAutoload.php");
    // Inicia a classe PHPMailer
    $mail = new PHPMailer();
    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    /////$mail->IsSMTP(); // Define que a mensagem será SMTP
    $mail->Host = "smtp.office365.com"; // Endereço do servidor SMTP
    ////$mail->SMTPSecure = "starttls"; //Tipo de criptografia
    $mail->Port = 587; //SMTP Port
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
    /////$mail->AddAddress($dest);
	$dest = "carlos.barbosa@facens.br";
	$mail->AddAddress($dest);
	
   // $mail->addBCC('servicosocial@facens.br');
    //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
    //$mail->AddBCC('carlos.barbosa@facens.br', 'Carlos Barbosa'); // Cópia Oculta
    // Define os dados técnicos da Mensagem
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    /////$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'utf-8';
    //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
    // Define a mensagem (Texto e Assunto)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->Subject = $assunto; // Assunto da mensagem
    $mail->Body = $corpoHtml;
    $mail->AltBody = $corpoText;
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

function enviaEmailPdf($dest, $assunto, $corpoHtml, $array_content, $corpoText = '') {
 
    // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
    include_once("./include/PHPMailer/PHPMailerAutoload.php");
    // Inicia a classe PHPMailer
    $mail = new PHPMailer();
    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsSMTP(); // Define que a mensagem será SMTP
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
   // $mail->addBCC('servicosocial@facens.br');
    //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
    // Define os dados técnicos da Mensagem
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'utf-8';
    //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
    // Define a mensagem (Texto e Assunto)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->Subject = $assunto; // Assunto da mensagem
    $mail->Body = $corpoHtml;
    $mail->AltBody = $corpoText;
    // Define os anexos (opcional)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
    $mail->addStringAttachment($array_content['data'], $array_content['filename']);
    // Envia o e-mail
    $enviado = $mail->Send();
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();

    // Exibe uma mensagem de resultado
    return $enviado;

}

function enviaEmailContato($dest, $assunto, $corpoHtml, $corpoText = '') {
 
    // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
    include_once("./includes/PHPMailer/PHPMailerAutoload.php");
    // Inicia a classe PHPMailer
    $mail = new PHPMailer();
    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsSMTP(); // Define que a mensagem será SMTP
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
    $mail->FromName = "Contato - Cursos de férias | Facens"; // Seu nome
    // Define os destinatário(s)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress($dest);
    //$mail->addBCC('flavio.bogila@facens.br');
    //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
    // Define os dados técnicos da Mensagem
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    $mail->CharSet = 'utf-8';
    //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
    // Define a mensagem (Texto e Assunto)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->Subject = $assunto; // Assunto da mensagem
    $mail->Body = $corpoHtml;
    $mail->AltBody = $corpoText;
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

?>

