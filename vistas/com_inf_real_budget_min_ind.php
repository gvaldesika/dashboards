
<?php

if(isset($_POST['btnMostrarPeriodo'])) {
    $tmp = $_POST['dropAnos'] . '-' . date('m-d');
    $fActual = date('Y', strtotime($tmp));
}else
{
    $fActual = date('Y');
}

$lista = ComprobantesControlador::ctrObtenerIngresosAnualesIndustrialMineria($fActual,2);
$budgetBase = ComprobantesControlador::ctrObtenerPresupuestoUn($fActual,'Base','min_ind');
$listaAcumulado = ComprobantesControlador::ctrObtenerIngresosAnualesAcumuladoIndustrialMineria($fActual,2);
$budgetBaseAcumulado = ComprobantesControlador::ctrObtenerPresupuestoAcumuladoUn($fActual,'Base','min_ind');




//$budgetBase = ComprobantesControlador::ctrObtenerPresupuesto($fActual,'Base');

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
                                    if (isset($_POST['dropAnos'])):
                                        if($row == $_POST['dropAnos']):
                                            echo '<option value="'.$row.'" selected="selected">'.$row.'</option>';
                                        else:
                                            echo '<option value="'.$row.'">'.$row.'</option>';
                                        endif;
                                    else:
                                        if($row == date('Y')):
                                            echo '<option value="'.$row.'" selected="selected">'.$row.'</option>';
                                        else:
                                            echo '<option value="'.$row.'">'.$row.'</option>';
                                        endif;
                                    endif;
                                }
                                ?>



                            </select>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <label for="exampleInputEmail1"> &nbsp;</label><br>
                        <button type="submit" name="btnMostrarPeriodo" id="btnMostrarPeriodo" class="btn btn-primary">Mostrar</button>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" name="btnVerDetalles" id="btnVerDetalles" class="btn btn-primary float-right" onclick="window.location = 'main.php?pag=com_inf_real_budget_un_det'"><i class="fa fa-eye"></i> Ver detalles por Obra</button>
                    </div>

                </div>

                <div class="row">

                </div>

            </form>
            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <center><h4>Ventas Real V/S Budget - Mineria e Industrias (<?php echo $fActual; ?>)</h4></center> <br>
                    <canvas id="bar-chart" width="800" height="450"></canvas>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>
<!-- -->



<script>

    var ctx = document.getElementById('bar-chart');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            datasets: [
                {
                    label: "Budget Acumulado",
                    type: "line",
                    fill: false,
                    backgroundColor: "#77dd77",
                    borderColor: "#77dd77",
                    yAxisID: 'right-y-axis',
                    data: [<?php echo $budgetBaseAcumulado[0]['valor']?>,<?php echo $budgetBaseAcumulado[1]['valor']?>,<?php echo $budgetBaseAcumulado[2]['valor']?>,<?php echo $budgetBaseAcumulado[3]['valor']?>,<?php echo $budgetBaseAcumulado[4]['valor']?>,<?php echo $budgetBaseAcumulado[5]['valor']?>,
                        <?php echo $budgetBaseAcumulado[6]['valor']?>,<?php echo $budgetBaseAcumulado[7]['valor']?>,<?php echo $budgetBaseAcumulado[8]['valor']?>,<?php echo $budgetBaseAcumulado[9]['valor']?>,<?php echo $budgetBaseAcumulado[10]['valor']?>,<?php echo $budgetBaseAcumulado[11]['valor']?>]
                },
                {
                    label: "Real Acumulado",
                    type: "line",
                    fill: false,
                    backgroundColor: "#ff6666",
                    borderColor: "#ff6666",
                    yAxisID: 'right-y-axis',
                    data: [<?php echo $listaAcumulado[0]['valor']?>,<?php echo $listaAcumulado[1]['valor']?>,<?php echo $listaAcumulado[2]['valor']?>,<?php echo $listaAcumulado[3]['valor']?>,<?php echo $listaAcumulado[4]['valor']?>,<?php echo $listaAcumulado[5]['valor']?>,
                        <?php echo $listaAcumulado[6]['valor']?>,<?php echo $listaAcumulado[7]['valor']?>,<?php echo $listaAcumulado[8]['valor']?>,<?php echo $listaAcumulado[9]['valor']?>,<?php echo $listaAcumulado[10]['valor']?>,<?php echo $listaAcumulado[11]['valor']?>]
                },
                {
                    label: 'UN  Ind+Min',
                    type: "bar",
                    yAxisID: 'left-y-axis',
                    data: [<?php echo $lista[0]['Enero']?>,<?php echo $lista[0]['Febrero']?>,<?php echo $lista[0]['Marzo']?>,<?php echo $lista[0]['Abril']?>,<?php echo $lista[0]['Mayo']?>,<?php echo $lista[0]['Junio']?>
                        ,<?php echo $lista[0]['Julio']?>,<?php echo $lista[0]['Agosto']?>,<?php echo $lista[0]['Septiembre']?>,<?php echo $lista[0]['Octubre']?>,<?php echo $lista[0]['Noviembre']?>,<?php echo $lista[0]['Diciembre']?>],
                    backgroundColor: '#696969',
                },
                {
                    label: "Budget Base",
                    type: "bar",
                    backgroundColor: "#FEFD97",
                    borderColor: "#FEFD97",
                    yAxisID: 'left-y-axis',
                    data: [<?php echo $budgetBase[0]['valor']?>,<?php echo $budgetBase[1]['valor']?>,<?php echo $budgetBase[2]['valor']?>,<?php echo $budgetBase[3]['valor']?>,<?php echo $budgetBase[4]['valor']?>,<?php echo $budgetBase[5]['valor']?>,
                        <?php echo $budgetBase[6]['valor']?>,<?php echo $budgetBase[7]['valor']?>,<?php echo $budgetBase[8]['valor']?>,<?php echo $budgetBase[9]['valor']?>,<?php echo $budgetBase[10]['valor']?>,<?php echo $budgetBase[11]['valor']?>]
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