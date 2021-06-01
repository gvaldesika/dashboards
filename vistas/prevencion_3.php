<?php
require_once "librerias/phplot/phplot.php";

//$resu = PrevencionControlador::ctrObtenerNroIncidentesAnual(2020);
$div = PrevencionControlador::ctrVerTipoIncidente();
$resu = PrevencionControlador::ctrVerGraficoIncidentesTipo(2020);

$grafico = PrevencionControlador::ctrVerGraficoIncidentesTipoV2(2020);



$listaDiv = array();
foreach ($div as $row)
{
    $listaDiv[] = utf8_decode($row['clasificacion']);
}
generaGrafico($resu,$listaDiv);

?>
<div class="row">
    <div class="col-lg-12">
<div class="card">
    <div class="card-body">
        <center>
            <canvas id="bar-chart" width="600" height="350"></canvas>
        <!--<img src="grafico.png"> -->
        </center>
    </div>
</div>
    </div>


    <div class="col-lg-12">

    </div>
</div>

<?php

function generaGrafico($resu,$listaDiv)
{
    $plot = new PHPlot(1200, 700);
    $plot->SetPrintImage(false); // Defer output until the end
    $plot->SetImageBorderType('plain');

    $plot->SetPlotType('bars');
    $plot->SetDataType('text-data');
    $plot->SetDataValues($resu);
    $plot->SetYLabelType('data',0);
    # Main plot title:
    $plot->SetTitle('Reportabilidad de Incidentes por Tipo');

    # Make a legend for the 3 data sets plotted:
    $plot->SetLegend($listaDiv);

    # Turn off X tick labels and ticks because they don't apply here:
    $plot->SetXTickLabelPos('none');
    $plot->SetXTickPos('none');
    $plot->SetYDataLabelPos('plotin');


    $plot->SetIsInline(true);
    $plot->SetOutputFile('grafico.png');
    $plot->DrawGraph();
    $plot->PrintImage();
}


?>



<script>

    var ctx = document.getElementById("bar-chart").getContext("2d");

    var data = {
        labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
        datasets: [{
            label: ['<?php echo $grafico[0][0]; ?>'],
            backgroundColor: "#3e95cd",
            data: ['<?php echo $grafico[0][1]; ?>','<?php echo $grafico[0][2]; ?>','<?php echo $grafico[0][3]; ?>','<?php echo $grafico[0][4]; ?>','<?php echo $grafico[0][5]; ?>','<?php echo $grafico[0][6]; ?>','<?php echo $grafico[0][7]; ?>','<?php echo $grafico[0][8]; ?>','<?php echo $grafico[0][9]; ?>','<?php echo $grafico[0][10]; ?>','<?php echo $grafico[0][11]; ?>','<?php echo $grafico[0][12]; ?>']
        },

            {
                label: ['<?php echo $grafico[1][0]; ?>'],
                backgroundColor: "#8e5ea2",
                data: ['<?php echo $grafico[1][1]; ?>','<?php echo $grafico[1][2]; ?>','<?php echo $grafico[1][3]; ?>','<?php echo $grafico[1][4]; ?>','<?php echo $grafico[1][5]; ?>','<?php echo $grafico[1][6]; ?>','<?php echo $grafico[1][7]; ?>','<?php echo $grafico[1][8]; ?>','<?php echo $grafico[1][9]; ?>','<?php echo $grafico[1][10]; ?>','<?php echo $grafico[1][11]; ?>','<?php echo $grafico[1][12]; ?>']
            },
            {
                label: ['<?php echo $grafico[2][0]; ?>'],
                backgroundColor: "#3cba9f",
                data: ['<?php echo $grafico[2][1]; ?>','<?php echo $grafico[2][2]; ?>','<?php echo $grafico[2][3]; ?>','<?php echo $grafico[2][4]; ?>','<?php echo $grafico[2][5]; ?>','<?php echo $grafico[2][6]; ?>','<?php echo $grafico[2][7]; ?>','<?php echo $grafico[2][8]; ?>','<?php echo $grafico[2][9]; ?>','<?php echo $grafico[2][10]; ?>','<?php echo $grafico[2][11]; ?>','<?php echo $grafico[2][12]; ?>']
            },
            {
                label: ['<?php echo $grafico[3][0]; ?>'],
                backgroundColor: "#e8c3b9",
                data: ['<?php echo $grafico[3][1]; ?>','<?php echo $grafico[3][2]; ?>','<?php echo $grafico[3][3]; ?>','<?php echo $grafico[3][4]; ?>','<?php echo $grafico[3][5]; ?>','<?php echo $grafico[3][6]; ?>','<?php echo $grafico[3][7]; ?>','<?php echo $grafico[3][8]; ?>','<?php echo $grafico[3][9]; ?>','<?php echo $grafico[3][10]; ?>','<?php echo $grafico[3][11]; ?>','<?php echo $grafico[3][12]; ?>']
            },

            {
                label: ['<?php echo $grafico[4][0]; ?>'],
                backgroundColor: "#c45850",
                data: ['<?php echo $grafico[4][1]; ?>','<?php echo $grafico[4][2]; ?>','<?php echo $grafico[4][3]; ?>','<?php echo $grafico[4][4]; ?>','<?php echo $grafico[4][5]; ?>','<?php echo $grafico[4][6]; ?>','<?php echo $grafico[4][7]; ?>','<?php echo $grafico[4][8]; ?>','<?php echo $grafico[4][9]; ?>','<?php echo $grafico[4][10]; ?>','<?php echo $grafico[4][11]; ?>','<?php echo $grafico[4][12]; ?>']
            },

            {
                label: ['<?php echo $grafico[5][0]; ?>'],
                backgroundColor: "#A0D8E9",
                data: ['<?php echo $grafico[5][1]; ?>','<?php echo $grafico[5][2]; ?>','<?php echo $grafico[5][3]; ?>','<?php echo $grafico[5][4]; ?>','<?php echo $grafico[5][5]; ?>','<?php echo $grafico[5][6]; ?>','<?php echo $grafico[5][7]; ?>','<?php echo $grafico[5][8]; ?>','<?php echo $grafico[5][9]; ?>','<?php echo $grafico[5][10]; ?>','<?php echo $grafico[5][11]; ?>','<?php echo $grafico[5][12]; ?>']
            },

            {
                label: ['<?php echo $grafico[6][0]; ?>'],
                backgroundColor: "#A7DB8C",
                data: ['<?php echo $grafico[6][1]; ?>','<?php echo $grafico[6][2]; ?>','<?php echo $grafico[6][3]; ?>','<?php echo $grafico[6][4]; ?>','<?php echo $grafico[6][5]; ?>','<?php echo $grafico[6][6]; ?>','<?php echo $grafico[6][7]; ?>','<?php echo $grafico[6][8]; ?>','<?php echo $grafico[6][9]; ?>','<?php echo $grafico[6][10]; ?>','<?php echo $grafico[6][11]; ?>','<?php echo $grafico[6][12]; ?>']
            },



        ]
    };

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }]
            },
            legend: {
                display: true,
                position: 'right'
                }
        }
    });

</script>



