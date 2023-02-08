<?php

//definindo caminho
include('mpdf.php');

//criando o objeto com os parametros de tipo de folha e margens
$mpdf =  new mPDF('c', 'A4', '', '', 10, 10, 5, 15);

//incluindo rodapé
$mpdf->defaultfooterline = 0;
$mpdf->defaultfooterfontstyle = 'B';

//configurando a pagina pra ingles e portugues
$content = 'Página {PAGENO} / {nbpg}';
$pdf = 'Flávio Bogila';

//configurando paginas impares
$mpdf->SetFooter(array(
        'L' => array(
            'content' => $content,
            'font-family' => 'arial',
            //'font-style' => '', /* blank, B, I, or BI */
            'font-size' => '9', /* in pts */
        ),
        'line' => 0, /* 1 to include line below header/above footer */
    ),'E'
);
//condigurando paginas pares
$mpdf->SetFooter(array(
        'L' => array(
            'content' => $content,
            'font-family' => 'arial',
            //'font-style' => '', /* blank, B, I, or BI */
            'font-size' => '9', /* in pts */
        ),
        'line' => 0, /* 1 to include line below header/above footer */
    ),'O'
);

//incluindo css
//$stylesheet = file_get_contents('layout/css/historico.css');
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($pdf);
//$mpdf->SetJS('this.print();');
//imprimindo
$mpdf->Output();
exit();