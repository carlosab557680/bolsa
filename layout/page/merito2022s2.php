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
                inscrita no CNPJ nº 45.718.988/0001-67, localizada à Rodovia Senador José Ermírio de Moraes nº 1425, 
                km 1,5 – Alto da Boa Vista, Sorocaba/SP, de ora em diante denominada <b>ACRTS</b> e, de outro lado, 
                <b><?php echo $a->getNome();?></b>, brasileiro(a), estudante, portador(a) do R,G. n.º <?php echo $a->getRg()?> e do C.P.F n.º <?php echo $a->getCpf()?>, 
				aluno(a) regularmente matriculado(a) no Centro Universitário FACENS, 
				<b>no curso de <?php echo $c->getCurso()?></b>,
				de ora em diante denominado simplesmente <b>ALUNO</b>, têm justa e acordado a presente concessão de bolsa,
				mediante as condições seguintes:</p>

				<?php
                    $valorbolsa = $a->getValorprincipal() * $c->getValorperc();
                    $valorfinal = $a->getValorprincipal() - $valorbolsa;
                ?>
				<br>
				<div style="float:left; width:100%">
					<div style="float:left; width:270px">
						1) A ACRTS, neste ato, concede Bolsa Mérito de:
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
				<br>
            <p>
				2) A bolsa será concedida durante o período regular do curso em que foi contemplada. A renovação da bolsa será semestral, vinculada ao rendimento escolar.
                <!--2) O período de concessão será de <b>no máximo 10 (dez) semestres</b>, conforme resultado publicado 
                no site (<a href="http://www.facens.br">www.facens.br</a>) e na secretaria da FACENS e depende do rendimento escolar do aluno.-->
            </p>
            <p style="margin-left: 10mm;">
				<!--2.1) Entende-se rendimento escolar suficiente para a manutenção de algum dos percentuais da bolsa de mérito 
(25%, 50%, 75% ou 100%) a aprovação em todas as disciplinas cursadas durante o curso escolhido pelo aluno.-->
				2.1) Entende-se rendimento escolar suficiente para a manutenção da bolsa mérito a aprovação em todas as disciplinas cursadas durante o curso escolhido pelo aluno;
            </p>
            <p style="margin-left: 10mm;">
                2.2) A reprovação em qualquer disciplina, seja por faltas (limite mínimo de presença de 75%) por nota (média final inferior a 5,0), acarretará no cancelamento definitivo da bolsa. O rendimento é avaliado semestralmente através do histórico acadêmico.
			</p>	
			<br>
            <p>
                3) Poderá perder o direito a bolsa <b>Mérito</b>:
            </p>	
			<p style="margin-left: 10mm;">3.1) O aluno que fizer a opção por outra bolsa ofertada pela Facens.</p>
			<p style="margin-left: 10mm;">3.2) Transferir-se para outro curso/modalidade;</p>
			<p style="margin-left: 10mm;">3.3) Trancar, cancelar ou não renovar a sua matrícula.</p>
 			<br>
            <p>
				4) O aluno concorda que se não houver o cumprimento de qualquer cláusula deste acordo, a bolsa será cancelada automaticamente sem aviso e sem qualquer contestação, para todos os efeitos de direito.
            </p>
			<!-- //////////page//////////////
			<p>
                5) Na renovação semestral da bolsa, o aluno poderá ter variação positiva, até o limite de 100%, no percentual auferido no
Concurso de bolsa, desde que tenha um desempenho escolar excepcional.
            </p>
			<p style="margin-left: 10mm;">
                5.1) Considera-se tendo um desempenho escolar excepcional o aluno que possua Coeficiente de Rendimento
CR≥0,87.
            </p>-->

			<br><br><br><br><br>
			
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
			<h3><u>Contrato de Concessão de Bolsa Mérito - RA <?php echo $a->getRa()?></u></h3>

            <p style="margin-left: 10mm;">
                5) O aluno autoriza a <b>ACRTS</b>, de acordo com exigência do <b>Ministério da Educação</b>, informar em relatório para órgão citado, seu nome, endereço completo, telefone, CPF (caso o aluno não possua, será informado do representante legal e filiação) e percentual de bolsa contemplado.
            </p>
			<br>

			<p class="pr">Por estarem de acordo com todos os termos e condições, as partes assinam o presente instrumento na presença das testemunhas abaixo.</p>
			
            <div class="invisible">
            <p>
                <br>
                <?php
                    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    echo strftime("Sorocaba, %d de %B de %Y.", strtotime('now'));
                ?>
            </p>
			<br>
            <p>
                ________________________________________________________<br>
                <b>Aluno: <?php echo $a->getNome();?></b><br>
			    <b>RA: <?php echo $a->getRa();?></b>
            </p>
			<br><br>
            <p>
                ________________________________________________________<br>
                <b>ACRTS – Assoc. Cult. De Renov. Tecn. Sorocabana<b>
             </p>
			 <br>
             <p style="text-align: left">
                <b>Testemunhas:</b>
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
                Nome: Fabiola Regiane do Nascimento<br>
                CPF: 217.448.888-41<br>
                RG: 30.098.287-2 
            </div>
			
             <br><br><br><br><br><br>
       

        <div class="rodape">
            <div>
                <img src="layout/img/certificado/footer_facens2R.png" width="720"> <!-- verificar a imagem -->
            </div>
        </div>
		
		</div>
		 </div>
    </div>
