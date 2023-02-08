<?php
ob_start();
?>
<div class="container-fluid">
    <fieldset>
        <legend>Tutorial de Aceitação</legend>
    </fieldset>
    <div>
        <p class="alert alert-info">1. Preencha os campos com seu RA e CPF para poder acessar o contrato. Caso você não tenha sido 
            contemplado uma mensagem de erro aparecerá indicando o mesmo.</p>
        <img src="layout/img/tutorial/1.PNG" style="width: 800px;">
    </div>

    <div>
        <p class="alert alert-info">2. Leia todo contrato de bolsa mérito ou filantropia (arraste para baixo a barra de rolagem), e em seguida,
            caso concorde, habilite o campo de checagem de leitura (li e aceito os termos do contrato) e clique no botão CONFIRMAR.</p>
        <img src="layout/img/tutorial/2-0.PNG" style="width: 800px;">
    </div>
    <br>
    <div>
        <p class="alert alert-info">3. Ao clicar em CONFIRMAR, aparecerá uma mensagem parecida com essa, indicando que foi enviado um e-mail para confirmação.</p>
        <img src="layout/img/tutorial/3.PNG" style="width: 800px; border: 1px solid black;">
    </div><br>

    <div>
        <p class="alert alert-info">4. Caso utilize e-mail da Facens, acesse o site da <a href="http://www.facens.br">http://www.facens.br</a> e em seguida clique em WEBMAIL</p>
        <img src="layout/img/tutorial/4-1.PNG" style="width: 800px;">
    </div>
    <br>

    <div>
        <p class="alert alert-info">5. Entre com seu usuário e senha para acessar seu webmail</p>
        <img src="layout/img/tutorial/5.PNG" style="width: 500px;">
    </div>

    <br>

    <div>
        <p class="alert alert-info">6. O e-mail terá um link para confirmação de identidade do aluno, juntamente com uma cópia em arquivo
            do contrato de bolsa. Clique no link para confirmar.</p>
        <img src="layout/img/tutorial/6.PNG" style="width: 800px;">
    </div>
    <br>

    <div>
        <p class="alert alert-info">7. Pronto, sua bolsa está confirmada, logo em seguida você receberá um e-mail com a bolsa confirmada.</p>
        <img src="layout/img/tutorial/7.PNG" style="width: 800px;">
    </div>
    <br>

    <div>
        <p class="alert alert-info">8. Verifique sua caixa de e-mails, deverá conter uma mensagem confirmando sua bolsa. Parabéns!</p>
        <img src="layout/img/tutorial/8.PNG" style="width: 800px;">
    </div>
    

</div>
<?php
$corpo = ob_get_clean();
include './layout/page/mestre2.php';

