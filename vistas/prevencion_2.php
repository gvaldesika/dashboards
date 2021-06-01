<?php
require_once "librerias/phplot/phplot.php";

//$resu = PrevencionControlador::ctrObtenerNroIncidentesAnual(2020);
$div = PrevencionControlador::ctrVerDiviciones();
$resu = PrevencionControlador::ctrVerGraficoIncidentes(2020);




$listaDiv = array();
foreach ($div as $row)
{
    $listaDiv[] = utf8_decode($row['Nombre_Div']);
}
generaGrafico($resu,$listaDiv);

?>
<div class="row">
    <div class="col-lg-12">
<div class="card">
    <div class="card-body">
        <center>
        <img src="grafico.png">
        </center>
    </div>
</div>
    </div>


    <div class="col-lg-12">
        <?php





        ?>
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
    $plot->SetTitle('Reportabilidad de Incidentes por Obra 2020');

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

    var ctx = document.getElementById("myChart").getContext("2d");

    var data = {
        labels: ["Chocolate", "Vanilla", "Strawberry"],
        datasets: [
            <?php
                foreach ($resu as $row)
                {
                    echo '{
                label: "Blue",
                backgroundColor: "blue",
                data: ['.$row[1].','.$row[1].','.$row[1].','.$row[1].','.$row[1].','.$row[1].','.$row[1].','.$row[1].','.$row[1].',]
            }';

                }

            ?>




            {
                label: "Blue",
                backgroundColor: "blue",
                data: [3,7,4]
            },
            {
                label: "Red",
                backgroundColor: "red",
                data: [4,3,5]
            },
            {
                label: "Green",
                backgroundColor: "green",
                data: [7,2,6]
            }
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
            }
        }
    });

</script>



