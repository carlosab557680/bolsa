<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

include_once './include/config.php';
include_once './include/session.php';
include_once './class/contemplado.class.php';
include_once './class/aluno.class.php';
include_once './class/contrato.class.php';
include_once './class/logtran.class.php';
include_once './imprimir.php';

/**
 * Pega um comteplado com um determinado status da lista de contemplados
 * @param array $list lista de contemplados
 * @param int $status status do contemplado
 * @return boolean contemplado ou false
 */
function getContempladoByStatus($list, $status){
    foreach ($list as $item) {
        if($item->getStatus() == $status){
            return $item;
        }
    }
    return false;
}

ob_start();

//request de inicio de aceite
if (isset($_POST['btnEntrar'])) {

    $ra = $_POST['ra'];
    $cpf = str_replace(array('.', '-'), '', $_POST['cpf']); //remove ponto e traço

    $pendencia = false;
    $arrayRaPendenciaFinanceira = array(
        "470.230.708-85",
        "478.603.348-01",
        "478.153.898-30",
        "503.753.568-94",
        "444.449.294-07",
        "446.450.358-60",
        "424.665.238-50",
        "460.455.408-08",
        "470.923.478-74",
        "459.469.758-54",
        "457.081.088-86",
        "362.087.628-20",
        "389.088.928-00",
        "449.242.808-95",
        "062.585.013-03",
        "486.081.188-74",
        "451.543.558-22",
        "446.463.478-81",
        "456.785.058-07",
        "476.124.988-98",
        "472.657.718-26",
        "497.346.888-63",
        "450.986.128-10",
        "457.766.628-69",
        "440.745.708-23",
        "480.693.858-04",
        "490.335.358-31",
        "491.145.888-70",
        "489.509.838-93",
        "490.885.468-86",
        "451.019.378-51",
        "475.277.158-63",
        "413.297.578-90",
        "134.747.267-30",
        "469.373.388-13",
        "472.125.748-13",
        "496.335.448-90",
        "473.002.978-03",
        "394.514.558-92",
        "410.287.828-96",
        "457.375.088-62",
        "454.939.828-03",
        "450.896.818-05",
        "463.099.218-94",
        "443.378.908-90",
        "503.010.428-37",
        "432.077.758-10"
    );

    $pendenciaFinanceira = false;

    foreach ($arrayRaPendenciaFinanceira as $item) {

        $cpfsemmascara = str_replace(array('.', '-'), '', $item);;
        
        if($cpf == $cpfsemmascara)
        {
           // $pendencia = true;
            //$pendenciaFinanceira = true;
        break;
        }
    }


    $arrayRaCalouro100 = array(
        "461.216.778-30",
        "519.810.058-70",
        "497.399.688-21",
        "455.547.088-54",
        "496.955.948-16",
        "506.979.758-19",
        "504.135.648-35",
        "429.195.908-71",
        "486.463.528-54",
        "486.463.328-29",
        "436.760.868-99",
        "511.777.828-63",
        "462.581.658-00",
        "538.672.778-85",
        "498.929.778-40",
        "515.228.788-90",
        "486.504.408-60",
        "430.660.248-65",
        "373.632.528-23",
        "463.437.248-77",
        "487.565.688-27",
        "457.348.228-84",
        "488.211.028-82",
        "237.721.538-60",
        "395.020.758-97",
        "489.767.458-17",
        "524.363.138-81",
        "443.486.598-69",
        "475.396.998-33",
        "490.479.318-82",
        "445.662.548-10",
        "477.795.758-61",
        "504.376.548-85",
        "506.311.168-85",
        "459.753.238-27",
        "334.346.018-48",
        "452.414.058-10",
        "484.340.998-70",
        "445.662.218-06",
        "440.339.938-00",
        "511.973.398-09",
        "512.084.728-52",
        "125.496.564-58",
        "473.640.588-00",
        "460.568.958-31",
        "396.907.738-95",
        "460.158.408-62",
        "505.630.598-77",
        "444.816.748-81",
        "446.679.398-00",
        "374.051.598-85",
        "511.702.608-02",
        "525.114.018-51",
        "144.773.468-83",
        "378.011.318-00",
        "510.348.538-99",
        "514.562.458-13",
        "461.600.678-42",
        "531.956.438-47",
        "429.639.028-75",
        "438.329.728-54",
        "463.565.758-24",
        "509.848.278-03",
        "484.626.138-76",
        "458.997.988-82",
        "446.271.568-39",
        "230.492.928-14",
        "527.144.098-22",
        "518.597.458-30",
        "422.614.048-67",
        "512.049.878-74",
        "431.317.108-88",
        "506.189.588-60",
        "438.485.638-51",
        "518.248.028-89"        
    );

    $pendenciaCalouro100 = false;

    foreach ($arrayRaCalouro100 as $item) {

        $cpfsemmascara = str_replace(array('.', '-'), '', $item);;
        
        if($cpf == $cpfsemmascara)
        {
          
          /*Solicitado pela Tais em 19FEV2020
            $pendenciaCalouro100 = true;
            $pendencia = true;
            */
                
        break;
        }
    }

    $arrayRaCalouro50 = array(
        "451.662.058-80",
        "508.157.568-19",
        "491.314.548-79",
        "424.060.508-31",
        "448.574.418-37",
        "503.382.878-92",
        "468.848.528-01",
        "448.151.228-81",
        "468.613.548-64",
        "515.355.508-99"
    );

    $pendenciaCalouro50 = false;

    foreach ($arrayRaCalouro50 as $item) {

        $cpfsemmascara = str_replace(array('.', '-'), '', $item);;
        
        if($cpf == $cpfsemmascara)
        {
           // $pendenciaCalouro50 = true;
           // $pendencia = true;
        break;
        }
    }


    $contrato = new contrato();
    $contrato->selectLastPerletivo();


    if(!$pendencia)
    {

            if ($ra != '' && $cpf != '') {
                $c = new contemplado($ra, $contrato->getPerletivo());
                //buscando contemplado
                //$is = $c->select(false);
                $lc = $c->selectAllByRaPerletivo();
                
                $c->select();
                
                
                $contr = new contrato();
                $contr->setId($c->getIdcontrato());
                $contr->select();

                if (count($lc) > 0) {
                    //caso o aluno já tenha feito a confirmação da bolsa, não pode entrar novamente.
                    if ($c = getContempladoByStatus($lc, contemplado::STATUS_AGUARDANDO)) {
                        $a = new aluno(trim($c->getRa()), $c->getPerletivo(), $c->getCodcur());

                        $a->setValorcredito($contr->getValorcredito());
                        //buscando informações do aluno

                        if ($a->select()) {
                            if(strpos($a->getEmail(), '@li.facens.br')){
                                $msg = "O e-mail {$a->getEmail()} foi desativado, por favor faça "
                                . "a alteração do seu e-mail da Facens "
                                . "<a href='http:///www3.facens.br/global/trocaemail'>AQUI<a>.";
                                
                                include './layout/form/home.form.php';
                            }else{
                                if ($a->getValorprincipal() != '') {
                                    if ($a->getErro() == '') {
                                        if ($a->getCpf() == $cpf) {
                                            $_SESSION['aluno'] = serialize($a);

                                            $log = new logtran($c->getIdcontrato(), $ra, logtran::ACEITE, date('Y-m-d H:i:s'));
                                            $log->insert();

                                            $listContratos = $contrato->selectAllByRAPerletivo($a->getRa(), $a->getPerletivo());
                                            if(count($listContratos) == 1){
                                                $contr = array_pop($listContratos);
                                                header('location: ?contrato=' . $contr->getId() );
                                            }
                                            include './layout/grid/bolsas.grid.php';
                                        } else {
                                            $msg = "O CPF não confere com esse RA.";
                                            include './layout/form/home.form.php';
                                        }
                                    } else {
                                        $msg = "Aluno não matriculado no atual período letivo .";
                                        include './layout/form/home.form.php';
                                    }
                                } else {
                                    $msg = "Aluno não matriculado no atual período letivo.";
                                    include './layout/form/home.form.php';
                                }
                            }
                        } else {
                            $msg = 'Aluno não encontrado.';
                            include './layout/form/home.form.php';
                        }
                    } else if ($c = getContempladoByStatus ($lc, contemplado::STATUS_ENVIADO_EMAIL)) {
                        $msg = 'Aguardando confirmação de aceite, acesse seu e-mail e confirme por favor!';
                        include './layout/form/home.form.php';
                    } else {
                        $msg_ok = 'Sua bolsa já foi confirmada anteriormente :)';
                        include './layout/form/home.form.php';
                    }
                    //caso o aluno esteja em mais de um curso
                } else {
                    $msg = 'Infelizmente o RA: '.$ra.' não foi contemplado.';
                    include './layout/form/home.form.php';
                }
            } else {
                $msg = 'Por favor, não deixe nenhum campo em branco.';
                include './layout/form/home.form.php';
            }
        }
        else
        {
            if($pendenciaFinanceira)
            {
                $msg = "Aluno não regularmente matriculado.";  
            }
            else
            {
                if($pendenciaCalouro100)
                {
                    $msg = "Parabéns! Você foi contemplado com uma bolsa de 100%, 
                    aguarde o início do período letivo para assinatura do contrato.
                    "; 
                }
                else
                {
                    $msg = "Parabéns! Você foi contemplado com uma bolsa de 50%, 
                    aguarde o início do período letivo para assinatura do contrato.
                    "; 
                }
            }
            
            include './layout/form/home.form.php';
        }
}

//request para confirmação de aceite
else if (isset($_POST['btnConfirma'])) {
    //enviando copia em pdf para o email do aluno.
	
    $data = date('Y-m-d H:i:s');
	
	?>
	<div style="font-color: #fff;"><?php echo $data;?></div>
	<?php
	
    if (enviarCopia()) {
        $a = unserialize($_SESSION['aluno']);
        $c = new contemplado($a->getRa(), $a->getPerletivo());
        $c->select();
        
        $a->selectRM();

        echo "<div class='container-fluid'><div class='alert alert-danger text-center'>";
        echo "Será enviado um e-mail para {$a->getEmail()} com um link de confirmação, acesse seu e-mail e confirme por favor clicando no link enviado.";
        echo "</div></div>";

        $c->setStatus(contemplado::STATUS_ENVIADO_EMAIL);
        $c->setDatamodif($data);
        if ($c->update()) {

            $log = new logtran($c->getIdcontrato(), $a->getRa(), logtran::ACEITE, $data, logtran::ACEITE_VIEW, logtran::ACEITE_EMAIL);
            $log->insert();
        }
    }
} 

else if (isset($_GET['contrato']) && isset($_SESSION['aluno'])) {
    $a = new aluno();
    $a = unserialize($_SESSION['aluno']);

    $contemplado = new contemplado($a->getRa(), $a->getPerletivo());
    $lc = $contemplado->selectAllByRaPerletivo();
    if(isset($lc[$_GET['contrato']])){
        $c = $lc[$_GET['contrato']];
        $contrato = new contrato($c->getIdcontrato());
        $contrato->select();
        include './layout/form/aluno.form.php';
    }else{
        header('location: ./');
    }
} else {
    //include './layout/grid/home.php';
    include './layout/form/home.form.php';
}

$corpo = ob_get_clean();
include './layout/page/mestre2.php';

