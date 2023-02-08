<?php
if ($aluno->array_medias_graf == null) {
        $medias = array(array(), array(), array(), array(), array(), array(), array(), array(), array(), array());
        foreach ($listDisciplinas as $list) {
            foreach ($list as $d) {
                array_push($medias[$d->getSerie() - 1], $d->getNota());
            }
        }
        $array_medias = array();
        foreach ($medias as $i => $a) {
            if (count($a) > 0) {
                $m = 0;
                $c = 0;
                foreach ($a as $value) {
                    if ($value > 0) {
                        $m += $value;
                        $c++;
                    }
                }
                $array_medias[$i] = $m / $c;
            } else {
                $array_medias[$i] = 0;
            }
        }

        $chk = 0;
        foreach ($array_medias as $i => $value) {
            if ($value != 0) {
                $chk = $i;
            }
        }
        if ($chk < 9) {
            for ($i = $chk + 1; $i < 10; $i++) {
                array_pop($array_medias);
            }
        }
        
        $aluno->array_medias_graf = $array_medias;
        $_SESSION['aluno'] = serialize($aluno);
    }else{
        $array_medias = $aluno->array_medias_graf;
    }
?>

<script src="./layout/highcharts/js/highcharts.js"></script>
<script type="text/javascript">
    $(function () {
        $('#g_evolucao').highcharts({
            chart: {
                //zoomType: 'x'
            },
            title: {
                //text: 'Evolução de Médias por Semestre'
                text: null
            },
            xAxis: {
                //type: 'linear',
                //minRange: 1 // fourteen days,
                categories: ['1°', '2°', '3°', '4°', '5°', '6°',
                    '7º', '8º', '9º', '10º'],
                title: {
                    text: 'Período'
                }
            },
            yAxis: {
                title: {
                    text: 'Nota Média'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {x1: 0, y1: 0, x2: 0, y2: 1},
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                    type: 'area',
                    name: 'Média do Período',
                    pointInterval: 1,
                    pointStart: 0,
                    data: <?php echo json_encode($array_medias) ?>
                }],
            exporting: {
                buttons: {
                    contextButton: {
                        enabled: false
                    }
                }
            },
            credits: {
                enabled: false
            }
        });

        // Build the chart
        $('#').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: 'Quantidade de Disciplinas',
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: true,
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Quantidade',
                    data: [
                        ['Aprovadas', 80],
                        ['Reprovadas', 1],
                        {
                            name: 'Atuais',
                            y: 10,
                            sliced: true,
                            selected: true
                        },
                        //['Atuais',    10],
                        ['Pendentes', 10],
                                //['Others',   0.7]
                    ],
                    colors: ['#2f7ed8', 'red', '#8bbc21', 'silver']
                }],
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: 0,
                y: 100
            },
            exporting: {
                buttons: {
                    contextButton: {
                        enabled: false
                    }
                }
            },
            credits: {
                enabled: false
            }
        });
    });
</script>
