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
        <h3><u>TERMO ADITIVO AO CONTRATO DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS</u></h3> 
        <h3><u>registrado sob o n° 187.286 em 23/06/2020 </u></h3>

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
                    com endereço na <?php echo $a->getLogradouro() . ' n° ' . $a->getNumero() . ', Bairro ' . $a->getBairro() . ' - ' . $a->getCidade() . ', CEP ' . $a->getCep(); ?>, doravante simplesmente denominada <b>CONTRATANTE</b>.
                    </td>
                </tr>
            </thead>
        </table>

        <p style="text-indent: 4em;">
            Os signatários do presente instrumento, devidamente qualificados resolvem 
            ADITAR o Contrato de Prestação de Serviços Educacionais registrado sob o nº  187.286 em 
            23/06/2020, conforme segue: 
        </p>
        <p>
            I - O CONTRATANTE manifesta neste ato a opção de realizar matrícula sob as condições do financiamento pela <b>PROGRAMA DE CRÉDITO UNIVERSITÁRIO (PRAVALER)</b>, bem como declara possuir todas as condições para obtenção do financiamento.
        </p>
        <p>
            II - O CONTRATANTE deverá realizar todos os procedimentos necessários para obtenção do financiamento, especialmente a comprovação perante a CONTRATADA, de acordo com as normas vigentes da <b>PRAVALER</b> e suas respectivas datas limites para cada ato do procedimento.
        </p>
        <p>
            III - Na  hipótese  de  não  realização  dos  procedimentos  para  obtenção  do  financiamento,  de 
                indeferimento ou de qualquer outro motivo de não conclusão do contrato de financiamento, o 
                CONTRATANTE ficará responsável pelos pagamentos correspontes às mensalidades do curso 
                contratado  e  constantes do  Termo  de  Adesão,  sob  as  penalidades  constantes da  legislação 
                vigente,  especilamente  a  cobrança  extrajudicial  e/ou  judicial,  bem  como  o  indeferimento  da 
                matrícula para o semestre subsequente na hipótese de inadimplemento das mensalidades, na 
                forma do artigo 5º da Lei 9.870/99. 
        </p>
        <p>
            IV - As demais cláusulas do contrato ficam mantidas e ratificadas. 
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
                <b>FACENS</b>
            </p>
            <br>
            <p style="text-align: center">
                <b>TESTEMUNHAS</b>
            </p>
            <br>
            <p> 
                <img src="layout/img/certificado/mar.jpg" height="105" width="150">   <br>
                1-________________________________________<br>
                <b>Nome: Marlene Silveira de Rocha Arruda</b><br>
                <b>CPF: 518.870.379-34</b><br>
                <b>RG: 19.178.191-5</b>
            </p>
            <p>
            <img src="layout/img/certificado/fab.jpg" height="105" width="150">  <br>
                2-________________________________________<br>
                <b>Nome: Fabiola Regiane do Nascimento </b><br>
                <b>CPF: 217.448.888-41</b><br>
                <b>RG: 30.098.287-2 </b>
            </p>
        </div>
        <br>
    </div>