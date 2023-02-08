<link rel="stylesheet" type="text/css" href="layout/css/bolsa.css">
<style>
    .pagina1, .pagina2{
		margin: 0 10px; 
        text-align: justify;
        line-height: 1.5em;
		font-size: 12px;
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
	
	.table-bolsa2{
        border: 1px solid #000; border-collapse: collapse; width: 200px;
        font-size: 10pt;
    }
    .table-bolsa2 tr, td, th{
        border: 1px solid #000;
        padding: 1px;
    }
    .table-bolsa2 th{
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

<?php 
if($a->getPerletivo() === '2022s1'){
	include ('merito2022s2.php');
}else{
?>

	<div class="principal">
		<div class="cabecalho invisible" style="border-bottom: #fff; margin-top:-10px">
			<div>
				<img src="layout/img/certificado/header_facens2.png">
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
				<b>no curso de <?php echo $c->getCurso()?></b>,
				de ora em diante denominado simplesmente <b>ALUNO</b>, têm justa e acordado a presente concessão de bolsa, 
				mediante as condições seguintes:</p>
				<?php
                    $valorbolsa = $a->getValorprincipal() * $c->getValorperc();
                    $valorfinal = $a->getValorprincipal() - $valorbolsa;
                ?>
				
				<div style="float:left; width:100%">
					<div style="float:left; width:270px">
						1)	A ACRTS neste ato concede Bolsa Mérito de:
					</div>
				   <div style="float:left; width:300px; margin-top: -5px">
						<table class="table-bolsa2">
								<tr>
									<td>% Bolsa</td>
									<td><?php echo $c->getValorperc() * 100?></td>
								</tr>
						</table>
					</div>
				</div>
				
				<p style="margin-left: 10mm;">
					1.1) A Bolsa ora concedida é válida somente para o curso em que o aluno foi contemplado por meio do Concurso
de Bolsa.
				</p>
				
            <p>
                2) O período de concessão será de <b>no máximo 10 (dez) semestres</b>, conforme resultado publicado 
                no site (<a href="http://www.facens.br">www.facens.br</a>) e na secretaria da FACENS e depende do rendimento escolar do aluno.
            </p>
            <p style="margin-left: 10mm;">
				2.1) Entende-se rendimento escolar suficiente para a manutenção de algum dos percentuais da bolsa de mérito
(25%, 50%, 75% ou 100%) a aprovação em todas as disciplinas cursadas durante o curso escolhido pelo aluno.
            </p>
            <p style="margin-left: 10mm;">
                2.2) A reprovação em qualquer disciplina, seja por faltas (limite mínimo de presença de 75%), por nota (média
final inferior a 5,0) ou mudança de Curso causará o cancelamento definitivo da bolsa
            </p>	
            <p>
                3) Poderá perder o direito a bolsa
            </p>	
			<p style="margin-left: 10mm;">3.1) O aluno que venha possuir qualquer outro tipo de Bolsa de Estudo com o percentual de 100%, terá a Bolsa
Mérito cancelada definitivamente.</p>
			<p style="margin-left: 10mm;">3.2) Transferir-se para outro curso.</p>
			<p style="margin-left: 10mm;">3.3) Trancar ou cancelar a sua matrícula.</p>			
            <p>
				4) Caso o aluno possua a Bolsa Mérito e qualquer outro tipo de bolsa cumulativamente, o valor somado das bolsas será
menor ou igual a 100% da mensalidade a pagar.
            </p>
			<p>
                5) Na renovação semestral da bolsa, o aluno poderá ter variação positiva, até o limite de 100%, no percentual auferido no
Concurso de bolsa, desde que tenha um desempenho escolar excepcional.
            </p>
			<p style="margin-left: 10mm;">
                5.1) Considera-se tendo um desempenho escolar excepcional o aluno que possua Coeficiente de Rendimento
CR≥0,87.
            </p>

			<br><br><br><br>		
			
	    <div >
            <div>
                <img src="layout/img/certificado/footer_facens2R.png" width="720"> <!-- verificar a imagem -->
            </div>
        </div>		
			
        </div>

		
	<div class="cabecalho invisible" style="border-bottom: #fff; margin-top:-10px">
		<div>
			<img src="layout/img/certificado/header_facens2.png">
		</div>
    </div>
		
        <div class="pagina2">


            <p style="margin-left: 10mm;">
                5.2) A manutenção do Coeficiente de Rendimento acima ou igual 0,87 propicia um aumento de 25% na bolsa até
o limite de 100% da mensalidade, sendo que a solicitação para aumento deve partir do aluno.
            </p>
			<p style="margin-left: 10mm;">
                5.3) A variação positiva de 25% ocorre uma única vez.
            </p>
            <p>
                6) Na renovação semestral da bolsa o aluno poderá ter variação negativa do percentual auferido no concurso de bolsa,
caso tenha um Coeficiente de Rendimento inferior a 0,67, CR<0,67.
            </p>

            <p style="margin-left: 10mm;">
                6.1) A manutenção de um CR < 0,7 reduz a bolsa em 25% até o limite mínimo de 25% da mensalidade.
            </p>
			<p style="margin-left: 10mm;">
                6.2) A variação negativa de 25% ocorre uma única vez.
            </p>
            <p>
                7) O aluno concorda que se não houver o cumprimento de qualquer cláusula deste acordo, a bolsa será cancelada
automaticamente sem aviso e sem qualquer contestação, para todos os efeitos de direito.
            </p>
            <p>
				8) O aluno autoriza a <b>ACRTS</b>, de acordo com exigência do <b>Ministério da Educação e Cultura</b> e da <b>Receita Federal do
Brasil</b>, informar em relatório para órgão citado, seu nome, endereço completo, telefone, CPF (caso o aluno não possua,
será informado do representante legal e filiação) e percentual de bolsa contemplado.
            </p>
			
			<p class="pr">Por estarem de acordo com todos os termos e condições, as partes assinam o presente instrumento na presença
das testemunhas abaixo.</p>
			
            <div class="invisible">
            <p style="text-align: left">
                <br>
                <?php
                    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    echo strftime("Sorocaba, %d de %B de %Y.", strtotime('now'));
                ?>
            </p>
            <p>
                __________________________________________<br>
                <b>Aluno: <?php echo $a->getNome()?> - <?php echo $a->getRa()?></b>
            </p>
            <p>
                __________________________________________<br>
                <b>ACRTS – Associação Cultural de Renovação Tecnológica Sorocabana<b>
             </p>
             <p style="text-align: left">
                <b>TESTEMUNHAS</b>
            </p>
			
            <div style="float: left; width: 300px; padding-right: 40px;"> 
                <img src="layout/img/certificado/mar.jpg" height="52" width="75">   <br>
                1-________________________________________<br>
                Nome: Marlene Silveira da Rocha Arruda<br>
                CPF: 518.870.379-34<br>
                RG: 19.178.191-5
            </div>
			
            <div style="float: left; width: 300px;"> 
				<img src="layout/img/certificado/fab.jpg" height="52" width="75">  <br>
                2-________________________________________<br>
                Nome: Fabiola Regiane do Nascimento <br>
                CPF: 217.448.888-41<br>
                RG: 30.098.287-2 
            </div>
			
             <br><br>
       

        <div class="rodape">
            <div>
                <img src="layout/img/certificado/footer_facens2R.png" width="720"> <!-- verificar a imagem -->
            </div>
        </div>
		
		</div>
		 </div>
    </div>

<?
}
?>