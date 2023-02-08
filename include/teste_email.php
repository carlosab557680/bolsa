<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

    //$dest = '171162@facens.br';
    //$copia = 'carlos.barbosa@facens.br';
    //$dest = 'carlos.barbosa@facens.br';
	$dest = 'carlosaugusto.b@gmail.com';
	
	var_dump($dest);
	
    $send_name = 'Facens';
    $send = "noreply@facens.br";

    $subj = "Teste envio de e-mail";
    $corpo = "Teste envio de e-mail - Carlos via phpmailer, nova rotina \r\n\r\n<br><br>";
    //$corpo = "Olá, você esqueceu sua senha e está tentando alterá-la? \r\n\r\n<br><br>";
    //$corpo .= "Se sim, clique no link: <a href='https://wwfacens.br</a>\r\n\r\n<br><br>";
    //$corpo .= "Se não, desconsidere esse e-mail.\r\n\r\n<br><br>";
    $corpo .= "Facens - Faculdade de Engenharia de Sorocaba.";

    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type:text/html;charset=UTF-8\r\n";
    $header .= "From: " . $send_name . " <" . $send . ">\r\n";

    // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
    ///include_once("./include/PHPMailer/PHPMailerAutoload.php");
	include_once("PHPMailer/PHPMailerAutoload.php");

    var_dump($header);

    // Inicia a classe PHPMailer
    $mail = new PHPMailer();

    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    ///$mail->IsSMTP(); // Define que a mensagem será SMTP
    $mail->Host = "smtp.office365.com"; // Endereço do servidor SMTP
    ///$mail->SMTPSecure = "starttls"; //Tipo de criptografia
    $mail->Port = 587; //SMTP Port

    ///$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
    ///$mail->Username = 'noreply@facens.br'; // Usuário do servidor SMTP
    ///$mail->Password = 'n0r3pl@y'; // Senha do servidor SMTP
    // Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->From = "noreply@facens.br"; // Seu e-mail
    $mail->FromName = "Facens"; // Seu nome

    $mail->AddAddress($dest);

    //$mail->addAddress('email@email.com.br', 'Contato'’);
    //$mail->addCC('email@email.com.br', 'Cópia');
    //$mail->addBCC($copia, 'Cópia Oculta');



    $mail->CharSet = 'utf-8';

    $mail->Subject = $subj; // Assunto da mensagem
    $mail->Body = str_replace('\r\n', '', $corpo);
    $mail->AltBody = str_replace('<br>', '', $corpo);

    $enviado = $mail->Send();

    ///$mail->ClearAllRecipients();

    var_dump($enviado);

?>
