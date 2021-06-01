<?php

//$resu = BacklogControlador::mdlVerBacklogDetalle();
$resu2 = BacklogControlador::ctrVerBacklogGrafico(1);
$ventaAdjud = BacklogControlador::ctrVerBackloVentaAdjudicada(1);
$ventasPeriodo = ComprobantesControlador::ctrObtenerIngresosPeriodo(date('Y-m-d', strtotime('-1 year')),date('Y-m-d'),1,2);
$totalBacklog = 0;

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jqc-1.12.4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-html5-1.6.5/r-2.2.7/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jqc-1.12.4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-html5-1.6.5/r-2.2.7/datatables.min.js"></script>

<!-- Aviso Origen del Dato-->
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Datos obtenidos desde IKA Dashboards (Dato Manual)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- Aviso Origen del Dato-->


<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Backlog IKA (M$ clp)</h3></center><br>
            <center><h4>UN Industrial</h4></center>
            <br><br>

            <br>




            <div class="row">
                <div class="col-sm-4">
                    <table class="table table-sm" >
                        <thead>
                        <tr>
                            <th class="table-secondary">Año</th>
                            <th class="table-secondary">Venta Adjudicada</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($ventaAdjud as $row)
                        {
                            $totalBacklog = $totalBacklog + $row['total_anual'];
                            echo '<tr>';
                            echo '<td>'.$row['ano'].'</td>';
                            echo '<td>$'.number_format($row['total_anual'],0,',','.').'</td>';
                            echo '</tr>';
                        }
                        $ratiobv = round($totalBacklog/$ventasPeriodo['sum'],2);

                        ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">TOTAL</h5>
                            <p class="card-text"><b>$<?php echo number_format($totalBacklog,0,',','.'); ?></b></p>
                            <hr>
                            <h5 class="card-title">RATIO B/V</h5>
                            <p class="card-text"><b><?php echo $ratiobv; ?></b></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <table class="table table-sm" >
                        <thead>
                        <tr>
                            <th class="table-secondary">CCO</th>
                            <th class="table-secondary">Obra</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach (ParametrosApp::obtenerCCOUnIndustrial() as $row)
                        {
                            $res = AuxiliaresControlador::mdlCCOaNombre($row);
                            echo '<tr>';
                            echo '<td>'.$row.'</td>';
                            echo '<td>'.$res['nombre_cco'].'</td>';
                            echo '</tr>';
                        }

                        ?>

                        </tbody>
                    </table>
                </div>


            </div>
            <br>
            <br>



            <div class="row">
                <div class="col-sm-12">
                    <canvas id="bar-chart" width="1500" height="650"></canvas>
                </div>
            </div>
        </div>







        </div>
    </div>
</div>







<script>
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: [
                <?php
                    foreach ($resu2 as $row)
                    {
                        echo '\''.$row['mes'].'\',';
                    }
                ?>
            ],
            datasets: [
                {
                    label: "Backlog",
                    backgroundColor: "#3e95cd",
                    data: [<?php
                        foreach ($resu2 as $row)
                        {
                            echo $row['total_mensual'].',';
                        }

                        ?>]
                }
            ]
        },
        options: {
            legend: { display: false },
            title: {
                display: false,
                text: ''
            },
            tooltips: {
                callbacks: {
                    label: function(t, d) {
                        var xLabel = d.datasets[t.datasetIndex].label;
                        var yLabel = t.yLabel >= 1000 ? '$' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : '$' + t.yLabel;
                        return xLabel + ': ' + yLabel;
                    }
                }
            },
            scales: {
                yAxes: [
                    {
                        id: 'left-y-axis',
                        type: 'linear',
                        position: 'left',
                        ticks: {
                            callback: function(value, index, values) {
                                if (parseInt(value) >= 1000) {
                                    return '$' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                } else {
                                    return '$' + value;
                                }
                            },
                            beginAtZero: true
                        }
                    }
                ]
            }

        }
    });




</script>