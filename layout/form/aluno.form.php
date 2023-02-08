<?php
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
?>
<script>
    $(document).ready(function(){
       $('#leu').on('change', function(){
          if($(this).is(':checked')){
              $('#btnConfirma').removeAttr('disabled');
          }else{
              $('#btnConfirma').attr('disabled', 'disabled');
          }
       }); 
    });
</script>
<div class="container-fluid">
<form method="post">
    <div class="alert alert-warning">
        Leia com atenção o contrato de bolsa e caso esteja de acordo, clique em "CONFIRMAR", logo em seguida será enviado
        um e-mail para seu endereço da Facens com um link para confirmação de aceitação, juntamente com uma cópia do contrato.
    </div>
    <?php 
	
	    //const BOLSA_FIES = 4;
		//const BOLSA_PRAVALER = 5;
		//const BOLSA_FUNDACRED =  6;
	
		if ($contrato->getTipo() == contrato::BOLSA_FIES){
            include './layout/page/fies.php';
        }else if($contrato->getTipo() == contrato::BOLSA_FUNDACRED){
			include './layout/page/fundacred.php';
        } else if($contrato->getTipo() == contrato::BOLSA_PRAVALER){
			include './layout/page/pravaler.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_FILATROPICA) {
            include './layout/page/filantropica.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_MERITO) {
            include './layout/page/merito.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_MONITORIA){
            include './layout/page/bolsa_monitoria.php';
        } else if ($contrato->getTipo() == contrato::BOLSA_FIES){
            include './layout/page/fies.php';
        }else if ($contrato->getTipo() == contrato::INICIAÇÃO_CIENTIFICA){
            include './layout/page/cientifico.php';
        }
    ?>
    <input type="hidden" name="tipo" value="<?php echo $contrato->getTipo(); ?>" />
    <br>
    <div style="padding-left: 10px" class="checkbox">
        <label>
            <input type="checkbox" name="leu" id="leu" checked/> Li e aceito os termos do contrato.
        </label>
    </div>
<!--    <div class="checkbox">
        <label>
          <input type="checkbox" name="copia" checked/> Enviar uma cópia do contrato por e-mail.
        </label>
    </div>-->
    <div style="padding-left: 10px" class="form-group">
        <div>
            <button type="submit" name="btnConfirma" id="btnConfirma" class="btn btn-primary">Confirmar</button>
        </div>
    </div>
</form>
</div>

