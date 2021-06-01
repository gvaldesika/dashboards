
<?php

if(isset($_POST['btnMostrarPeriodo'])) {
    $tmp = $_POST['dropAnos'] . '-' . date('m-d');
    $fActual = date('Y', strtotime($tmp));
}else
{
    $fActual = date('Y');
}


$lista = ComprobantesControlador::ctrObtenerIngresosAnuales($fActual,2);
$budgetBase = ComprobantesControlador::ctrObtenerPresupuesto($fActual,'Base');
$forecast = ComprobantesControlador::ctrObtenerPresupuesto($fActual,'Forecast');






$budgetConfirmado = ComprobantesControlador::ctrObtenerIngresosAnualesAcumulado($fActual,2);
$budgetVariable = ComprobantesControlador::ctrObtenerPresupuestoAcumulado($fActual,'Base');
$forecastVariable = ComprobantesControlador::ctrObtenerPresupuestoAcumulado($fActual,'Forecast');






?>
<!-- Aviso Origen del Dato-->
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Datos obtenidos desde Data Warehouse (Eugcom ERP) y IKA Dashboards (Dato Manual)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- Aviso Origen del Dato-->

<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Seleccione Año</label>
                            <select name="dropAnos" id="dropAnos" class="form-control">

                                <?php
                                $anos = devuelveAnos();
                                foreach ($anos as $row)
                                {
                                    echo '<option value="'.$row.'">'.$row.'</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <label for="exampleInputEmail1"> &nbsp;</label><br>
                        <button type="submit" name="btnMostrarPeriodo" id="btnMostrarPeriodo" class="btn btn-primary">Mostrar</button>
                    </div>
                </div>
            </form>
            <br>
            <hr>


            <div class="row">
                <div class="col-lg-12">
                    <center><h3>Ventas Real V/S Budget (<?php echo $fActual; ?>)</h3></center> <br>
                    <center><h4>UN Mineria - Industrial - Infraestructura</h4></center><br><br>
                    <canvas id="bar-chart" width="800" height="450"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["<?php echo $lista[0]['mes']?>","<?php echo $lista[1]['mes']?>","<?php echo $lista[2]['mes']?>","<?php echo $lista[3]['mes']?>","<?php echo $lista[4]['mes']?>","<?php echo $lista[5]['mes']?>",
                "<?php echo $lista[6]['mes']?>","<?php echo $lista[7]['mes']?>","<?php echo $lista[8]['mes']?>","<?php echo $lista[9]['mes']?>","<?php echo $lista[10]['mes']?>","<?php echo $lista[11]['mes']?>",],
            datasets: [
                {
                    label: "Budget Acumulado",
                    type: "line",
                    fill: false,
                    backgroundColor: "#77dd77",
                    borderColor: "#77dd77",
                    yAxisID: 'right-y-axis',
                    data: [<?php echo $budgetVariable[0]['valor']?>,<?php echo $budgetVariable[1]['valor']?>,<?php echo $budgetVariable[2]['valor']?>,<?php echo $budgetVariable[3]['valor']?>,<?php echo $budgetVariable[4]['valor']?>,<?php echo $budgetVariable[5]['valor']?>,
                        <?php echo $budgetVariable[6]['valor']?>,<?php echo $budgetVariable[7]['valor']?>,<?php echo $budgetVariable[8]['valor']?>,<?php echo $budgetVariable[9]['valor']?>,<?php echo $budgetVariable[10]['valor']?>,<?php echo $budgetVariable[11]['valor']?>]
                },
                {
                    label: "Real Acumulado",
                    type: "line",
                    fill: false,
                    backgroundColor: "#ff6666",
                    borderColor: "#ff6666",
                    yAxisID: 'right-y-axis',
                    data: [<?php echo $budgetConfirmado[0]['valor']?>,<?php echo $budgetConfirmado[1]['valor']?>,<?php echo $budgetConfirmado[2]['valor']?>,<?php echo $budgetConfirmado[3]['valor']?>,<?php echo $budgetConfirmado[4]['valor']?>,<?php echo $budgetConfirmado[5]['valor']?>,
                        <?php echo $budgetConfirmado[6]['valor']?>,<?php echo $budgetConfirmado[7]['valor']?>,<?php echo $budgetConfirmado[8]['valor']?>,<?php echo $budgetConfirmado[9]['valor']?>,<?php echo $budgetConfirmado[10]['valor']?>,<?php echo $budgetConfirmado[11]['valor']?>]
                },
                {
                    label: "Ingresos Reales",
                    type: "bar",
                    backgroundColor: "#3e95cd",
                    yAxisID: 'left-y-axis',
                    data: [<?php echo $lista[0]['valor']?>,<?php echo $lista[1]['valor']?>,<?php echo $lista[2]['valor']?>,<?php echo $lista[3]['valor']?>,<?php echo $lista[4]['valor']?>,<?php echo $lista[5]['valor']?>,
                        <?php echo $lista[6]['valor']?>,<?php echo $lista[7]['valor']?>,<?php echo $lista[8]['valor']?>,<?php echo $lista[9]['valor']?>,<?php echo $lista[10]['valor']?>,<?php echo $lista[11]['valor']?>]
                },
                {
                    label: "Budget Base",
                    type: "bar",
                    backgroundColor: "#FEFD97",
                    yAxisID: 'left-y-axis',
                    data: [<?php echo $budgetBase[0]['valor']?>,<?php echo $budgetBase[1]['valor']?>,<?php echo $budgetBase[2]['valor']?>,<?php echo $budgetBase[3]['valor']?>,<?php echo $budgetBase[4]['valor']?>,<?php echo $budgetBase[5]['valor']?>,
                        <?php echo $budgetBase[6]['valor']?>,<?php echo $budgetBase[7]['valor']?>,<?php echo $budgetBase[8]['valor']?>,<?php echo $budgetBase[9]['valor']?>,<?php echo $budgetBase[10]['valor']?>,<?php echo $budgetBase[11]['valor']?>]
                },
                {
                    label: "Forecast",
                    type: "bar",
                    backgroundColor: "#555555",
                    yAxisID: 'left-y-axis',
                    data: [<?php echo $forecast[0]['valor']?>,<?php echo $forecast[1]['valor']?>,<?php echo $forecast[2]['valor']?>,<?php echo $forecast[3]['valor']?>,<?php echo $forecast[4]['valor']?>,<?php echo $forecast[5]['valor']?>,
                        <?php echo $forecast[6]['valor']?>,<?php echo $forecast[7]['valor']?>,<?php echo $forecast[8]['valor']?>,<?php echo $forecast[9]['valor']?>,<?php echo $forecast[10]['valor']?>,<?php echo $forecast[11]['valor']?>]
                }

            ]
        },
        options: {
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
                    }, {
                        id: 'right-y-axis',
                        type: 'linear',
                        position: 'right',
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