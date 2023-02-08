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
            <div id="img_cabecalho">
                <img src="layout/img/certificado/logo_cabecalho.png">
            </div>
            <div id="txt_cabecalho">
                <h2>
                    FACULDADE DE ENGENHARIA DE SOROCABA<br>
                    CAMPUS ALEXANDRE BELDI NETTO
                </h2>
                Recredenciada pela Portaria Ministerial nº 358 de 05/04/2012<br>
                Rodovia Senador José Ermírio de Moraes, 1425, km 1,5<br>
                CEP 18087-125 Sorocaba-SP<br>
                Fone: (15) 3238-1188 - www.facens.br<br>
            </div>
        </div>

        <div class="pagina1">
            <h3><u>Contrato de Concessão de Bolsa de Estudo Filantrópica</u></h3>
            <p style="text-indent: 4em;">Pelo presente Contrato de Concessão de Bolsas de Estudos Filantrópicas,
                a <b><i>ACRTS – Associação Cultural de Renovação Tecnológica Sorocabana</i></b>, 
                inscrita no CNPJ nº 45.718.988/0001-67, localizada na Rodovia Senador José Ermírio de Moraes nº 1425, 
                km 1,5 – Alto da Boa Vista, Sorocaba/SP, de ora em diante denominada <b>ACRTS</b> e, de outro lado, 
                <b><?php echo $a->getNome()?></b>, brasileiro(a), portador (a) do RG n.º <?php echo $a->getRg()?> e do CPF n.º <?php echo $a->getCpf()?>, 
                aluno(a) regularmente matriculado(a) na FACENS - Faculdade de Engenharia de Sorocaba, 
                de ora  em diante denominado simplesmente <b>ALUNO</b>,  têm justa e contratada a presente concessão de bolsa, 
                mediante as condições seguintes:</p>
            1)	A ACRTS neste ato concede bolsa de estudo filantrópica de:
            <?php
                $valorbolsa = $a->getValorprincipal() * $c->getValorperc();
                //$dp = $a->getEstoquedp() * $contrato->getValorcredito();
                //$valorfinal = $valorbolsa + $dp;
                $valorfinal = $valorbolsa;
             ?>
            <table class="table-bolsa">
                <thead>
                    <tr>
                        <th style="width: 50%; text-align: center;">Porcentagem de bolsa</th>
                        <th style="width: 50%; text-align: center;">Valor da bolsa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $c->getValorperc() * 100; ?>%</td>
                        <td>R$ <?php echo number_format($valorfinal, 2, ',', '.')?></td>
                    </tr>
                </tbody>
            </table>
            <p>
                2) Período de concessão, <b>mês de <?php echo getMes(date("m", strtotime($contrato->getDtinicio())))?> à <?php echo getMes(date("m", strtotime($contrato->getDtfim())));?> de <?php echo strftime("%Y", strtotime($contrato->getDtfim()))?>.</b>
            </p>
            <p>
                3) O aluno declara ter conhecimento do <b><u>Regulamento para Concessão de Bolsa de Estudos Filantrópicas</u></b> e sujeita-se a ele.
            </p>
            <p>
                4) O aluno concorda que se não houver o cumprimento de qualquer cláusula do <u>Regulamento para Concessão de Bolsa de Estudo Filantrópica</u>, a mesma será suspensa automaticamente sem aviso e sem qualquer contestação, para todos os efeitos de direito.
            </p>
            <p>
                5) O aluno autoriza a <b>ACRTS</b>, de acordo com exigência do <b>Ministério da Educação e Cultura</b> e <b>da Receita Federal do Brasil</b>, informar em relatório para órgão citado, seu nome, endereço completo, telefone, CPF (caso o aluno não possua, será informado do representante legal e filiação).
            </p>
            <div class="invisible">
                <p style="text-align: right">
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
                    <b><?php echo $a->getNome()?> - <?php echo $a->getRa()?></b>
                </p>
                <p>
			 __________________________________________<br>

                   <b>ACRTS – Associação Cultural de Renovação Tecnológica Sorocabana</b>
                </p>
            </div>
            <br>
        </div>



        <div class="cabecalho invisible">
            <div id="img_cabecalho">
                <img src="layout/img/certificado/logo_cabecalho.png">
            </div>
            <div id="txt_cabecalho">
                <h2>
                    FACULDADE DE ENGENHARIA DE SOROCABA<br>
                    CAMPUS ALEXANDRE BELDI NETTO
                </h2>
                Recredenciada pela Portaria Ministerial nº 358 de 05/04/2012<br>
                Rodovia Senador José Ermírio de Moraes, 1425, km 1,5<br>
                CEP 18087-125 Sorocaba-SP<br>
                Fone: (15) 3238-1188 - www.facens.br<br>
            </div>
        </div>
        <div class="pagina2">

            <h3><u>Regulamento para Concessão de Bolsas de Estudos Filantrópicas</u></h3>

            <ol>
<!--                <li>Todo aluno poderá ser contemplado com bolsa de 100% ( cem por cento ) da mensalidade a pagar, 
                    excluindo o valor das DPs, de acordo com a carência sócio-econômica apresentada e comprovada 
                    junto ao Serviço Social, através de documentação, entrevistas e visitas domiciliares quando necessário.-->
                    
                    <li>Todo aluno poderá ser contemplado com bolsa de até 100% ( cem por cento ) da mensalidade a pagar, 
                     de acordo com a carência sócio-econômica apresentada e comprovada 
                    junto ao Serviço Social, através de documentação, entrevistas e visitas domiciliares quando necessário.
                    <ol>
                        <li>
                            1. A bolsa de estudos não incide sobre as disciplinas que o aluno estiver com dependência.<br><br>
                        </li>
                    </ol>
                </li>

                <li>O aluno que possuir qualquer outro tipo de bolsa de estudo ou financiamento não poderá ser contemplado com a bolsa de estudo Filantropia da faculdade.<br><br></li>
                <li>As bolsas concedidas incidirão no máximo sobre os meses do ano corrente. A bolsa é concedida anualmente, através de processo seletivo, por um período máximo de 05 anos.<br><br></li>
                <li>O aluno terá o crédito da bolsa de estudo suspenso quando:
                    <ul>

                        <!--<li>tiver freqüência inferior a 75% e ou notas de aprovação semestrais menor que 5,0 ( cinco ).</li>-->
                        <li>tiver freqüência inferior a 75% e rendimento inferior a 100% das matérias cursadas.</li>
                        <li>for constatado qualquer irregularidade nas informações prestadas pelo aluno bolsista, 
                            sendo que o mesmo terá sua bolsa suspensa e compromete-se a devolver os créditos recebidos com o 
                            benefício da bolsa no período, para a faculdade com juros e correção.
                        </li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
