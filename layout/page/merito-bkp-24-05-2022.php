<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Contrato de Concessão de Bolsa Mérito</title>
    <!--<link rel="stylesheet" type="text/css" href="layout/css/historico.css">-->
    <link rel="stylesheet" type="text/css" href="layout/css/bolsa.css">
</head>
<style>
    .pagina1, .pagina2{
        margin: 0 12mm; 
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
        border: 1px solid red;
    }
    ol li ul{
        list-style: disc;
    }
    .pr{
        text-indent: 15mm;
    }

</style>
<body>
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
            <h3><u>Contrato de Concessão de Bolsa Mérito - RA <?php echo $a->getRa()?></u></h3>
            <p class="pr">Pelo presente Contrato de Concessão de Bolsa Mérito,
                a <b><i>ACRTS – Associação Cultural de Renovação Tecnológica Sorocabana</i></b>, 
                inscrita no CNPJ nº 45.718.988/0001-67, localizada na Rodovia Senador José Ermírio de Moraes nº 1425, 
                km 1,5 – Alto da Boa Vista, Sorocaba/SP, de ora em diante denominada <b>ACRTS</b> e, de outro lado, 
                <b><?php echo $a->getNome()?></b>, brasileiro(a), portador (a) do RG n.º <?php echo $a->getRg()?> e do CPF n.º <?php echo $a->getCpf()?>, 
                aluno(a) regularmente matriculado(a) na FACENS - Faculdade de Engenharia de Sorocaba, 
                de ora  em diante denominado simplesmente <b>ALUNO</b>,  têm justa e contratada a presente concessão de bolsa, 
                mediante as condições seguintes:</p>
                1)	A ACRTS neste ato concede Bolsa Mérito de:
                
                <?php
                    $valorbolsa = $a->getValorprincipal() * $c->getValorperc();
                    //$dp = $a->getEstoquedp() * $contrato->getValorcredito();
                    $valorfinal = $a->getValorprincipal() - $valorbolsa;
                ?>
                <table class="table-bolsa">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 25%;">Mensalidade-Base</th>
                            <th class="text-center" style="width: 25%;">Porcentagem de Bolsa</th>
                            <th class="text-center" style="width: 25%;">Valor da Bolsa em <?php echo date('Y',strtotime($contrato->getDtinicio()))?></th>
                            <th class="text-center" style="width: 25%;">Valor Final da Mensalidade em <?php echo date('Y',strtotime($contrato->getDtfim()))?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>R$ <?php echo number_format($a->getValorprincipal(), 2, ',', '.')?></td>
                            <td><?php echo $c->getValorperc() * 100?>%</td>
                            <td>R$ <?php echo number_format($valorbolsa, 2, ',', '.') ?></td>
                            <td>R$ <?php echo number_format($valorfinal, 2, ',', '.')?></td>
                        </tr>
                    </tbody>
                </table>
            <p>
                2) O período de concessão será de <b>no máximo 10 (dez) semestres</b>, conforme resultado publicado 
                no site (<a href="http://www.facens.br">www.facens.br</a>) e na secretaria da FACENS e depende do rendimento escolar do aluno.
            </p>
            <p style="margin-left: 10mm;">
                2.1) Entende-se rendimento escolar suficiente para a manutenção de algum dos percentuais da bolsa de mérito (25%, 50% ou 75%) a aprovação em todas as disciplinas cursadas durante o curso escolhido pelo aluno.
            </p>
            <p style="margin-left: 10mm;">
                2.2) A reprovação em qualquer disciplina, seja por faltas (limite mínimo de presença de 75%) ou por nota (média final inferior a 5,0) causará o cancelamento definitivo da bolsa.
            </p>
            <p>
                3) O aluno que venha possuir qualquer outro tipo de Bolsa de Estudo com o percentual de 100%, terá a Bolsa Mérito cancelada definitivamente.
            </p>
            <p>
                4) Caso o aluno possua a Bolsa Mérito e qualquer outro tipo de bolsa cumulativamente, o valor somado das bolsas será menor ou igual a 80% da mensalidade a pagar.
            </p>
            <p>
                5) Na renovação semestral da bolsa, o aluno poderá ter variação positiva, até o limite de 75%, no percentual auferido no Concurso de bolsa, desde que tenha um desempenho escolar excepcional.
            </p>
            <p style="margin-left: 10mm;">
                5.1) Considera-se tendo um desempenho escolar excepcional o aluno que possua Coeficiente de Rendimento CR≥0,87.
            </p>
            <p style="margin-left: 10mm;">
                5.2) A manutenção do Coeficiente de Rendimento acima ou igual 0,87 propicia um aumento de 25% na bolsa até o limite de 75% da mensalidade.
            </p>

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

            <p>
                6) Na renovação semestral da bolsa o aluno poderá ter variação negativa do percentual auferido no concurso de bolsa, caso tenha um Coeficiente de Rendimento inferior a 0,67, CR<0,67.
            </p>

            <p style="margin-left: 10mm;">
                6.1) A manutenção de um CR < 0,7 reduz a bolsa em 25% até o limite mínimo de 25% da mensalidade.
            </p>

            <p>
                7) O aluno concorda que se não houver o cumprimento de qualquer cláusula deste acordo, a bolsa será cancelada automaticamente sem aviso e sem qualquer contestação, para todos os efeitos de direito.
            </p>

            <p>
                8) O aluno autoriza a <b>ACRTS</b>, de acordo com exigência do <b>Ministério da Educação e Cultura</b> e da  <b>Receita Federal do Brasil</b>, informar em relatório para órgão citado, seu nome, endereço completo, telefone, CPF (caso o aluno não possua, será informado do representante legal e filiação) e percentual de bolsa contemplado.
            </p>
            <div class="invisible">
            <p style="text-align: right">
                <br>
                <?php
                    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    echo strftime("Sorocaba, %d de %B de %Y.", strtotime('now'));
                ?>
            </p><br>
            <p>
                __________________________________________<br>
                <b>Aluno: <?php echo $a->getNome()?> - <?php echo $a->getRa()?></b>
            </p>
            <p>
                __________________________________________<br>
                <b>ACRTS – Associação Cultural de Renovação Tecnológica Sorocabana<b>
             </p>
             <p style="text-align: center">
                <b>TESTEMUNHAS</b>
            </p>
            <p> 
                <img src="layout/img/certificado/mar.jpg" height="52" width="75">   <br>
                1-________________________________________<br>
                <b>Nome: Marlene Silveira de Rocha Arruda</b><br>
                <b>CPF: 518.870.379-34</b><br>
                <b>RG: 19.178.191-5</b>
            </p>
            <p>
            <img src="layout/img/certificado/fab.jpg" height="52" width="75">  <br>
                2-________________________________________<br>
                <b>Nome: Fabiola Regiane do Nascimento </b><br>
                <b>CPF: 217.448.888-41</b><br>
                <b>RG: 30.098.287-2 </b>
            </p>
             </div>
        </div>
    </div>
</body>
</html>
