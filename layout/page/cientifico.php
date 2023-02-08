<link rel="stylesheet" type="text/css" href="layout/css/bolsa.css">
<style>
    .pagina1, .pagina2{
        margin: 0 10px; 
        text-align: justify;
        line-height: 1.5em;
    }
    .pagina1{
        page-break-after: always;
    }
    .pagina1 h3, .pagina2 h3{
        text-align: center;
    }
    .table-bolsa{
        border: 1px solid #000; border-collapse: collapse; width: 100%;
        font-size: 12pt;
    }
    .table-bolsa tr, td, th{
        border: 1px solid #000;
        padding: 2px;
    }
    .table-bolsa th{
        background-color: #595959;
        color: whitesmoke;
    }
    ul, ol {
        text-align: justify;
    }
    ol li{
        /*border: 1px solid red;*/
    }
    ol li ul{
        list-style: disc;
    }

</style>
<div class="principal">
    <div class="cabecalho invisible">
        <div>
            <img src="layout/img/certificado/header.png">
        </div>
    </div>

    <div class="pagina1">
        <h3><u>Contrato de Concessão de Bolsa à Iniciação Científica</u></h3> 

        <table class="table-bolsa">
            <thead>
                <tr>
                    <th style="width: 50%; text-align: center;">I - FACENS</th>
                </tr>
                <tr style="text-align: left;">
                    <td>ACRTS – Associação Cultural de Renovação Tecnológica Sorocabana, 
                        devidamente inscrita no CNPJ/MF sob o nº 45.718.988/0001-67, entidade mantedora  da FACENS - Faculdade 
                        de Engenharia de Sorocaba, com endereço  na Rodovia  Senador José Ermírio de Moraes, nº 
                        1425, KM 1,5 (Castelinho), Sorocaba -SP, doravante simplesmente denominada <b>FACENS</b>.
                    </td>
                </tr>
                <tr>
                    <th style="width: 50%; text-align: center;">II - CONTRATANTE</th>
                </tr>
                <tr style="text-align: left;">
                    <td><b><?php echo $a->getNome() ?></b> RG n.º <?php echo $a->getRg() ?> CPF/MF N.º <?php echo $a->getCpf() ?>, <b>RA <?php echo $a->getRa() ?></b>, 
                    com endereço na <?php echo $a->getLogradouro() . ' n° ' . $a->getNumero() . ', Bairro ' . $a->getBairro() . ' - ' . $a->getCidade() . ', CEP ' . $a->getCep(); ?>, doravante simplesmente denominada <b>ALUNO</b> têm justa e contratada a presente concessão de bolsa de estudo à Iniciação Científica, mediante as condições seguintes:
                    </td>
                </tr>
            </thead>
        </table>

        <p>
          I - A <b>ACRTS</b> neste ato concede bolsa de estudo à Iniciação Científica de: 40%
        </p>
        <p>
            II -Período de concessão, <b>abril/2020 a dezembro/2020</b>.
        </p>
        <p>
            III - O aluno declara ter conhecimento do <b>Programa de Iniciação Científica</b> - 2020 e sujeita-se a ele.
        </p>
        <p>
            IV - O aluno concorda que se não houver o cumprimento de qualquer cláusula do <b>Programa de Iniciação Científica - 2020</b>, a mesma será suspensa automaticamente sem aviso e sem qualquer contestação, para todos os efeitos de direito, <b>e o aluno será suspenso de participar de outros programas de bolsa pela Facens.</b>
        </p>
        <p>
            V - O aluno autoriza a ACRTS, de acordo com exigência da <b>Receita Federal do Brasil</b>, informar em relatório para órgão citado, seu nome endereço completo, telefone, CPF (caso o aluno não possua, será informado do representante legal e filiação).
        </p>
        
    </div>

        <div class="invisible">
            <div class="cabecalho invisible">
                <div>
                    <img src="layout/img/certificado/header.png">
                </div>
            </div>
            <p style="text-indent: 4em;">E, por estarem justas, contratadas, cientes e de acordo com todas as 
                cláusulas e condições do presente TERMO ADITIVO, as partes por si, seus herdeiros e sucessores 
                assinam  este  instrumento  nas  suas  2  (duas)  vias  para  um  só  efeito,  na  presença  das 
                testemunhas abaixo.
            </p>
            <p style="text-align: center">
                <br>
                <?php
                setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');
                //echo strftime("Sorocaba, %d de %B de %Y.", strtotime('now'));
                echo "Sorocaba, " . date('d') . ' de ' . getMes(date('m')) . ' de ' . date('Y');
                ?>
            </p>
            <p><br><br>
                __________________________________________<br>
                <b>CONTRATANTE</b>
            </p>
            <p>
                __________________________________________<br>
                <b>ACRTS</b> Assoc. Cult. de Renov. Tecn. Sorocabana
            </p>
            <br>   
            
        </div>
        <br>
    </div>