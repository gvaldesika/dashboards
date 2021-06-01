<?php

if(isset($_POST['btnMostrarPeriodo']))
{
    $tmp = $_POST['dropAnos'].'-'.date('m-d');

    $fActual = date('Y-m-d',strtotime($tmp));
    $fActual_1_ano = date('Y-m-d', strtotime('-1 year', strtotime($fActual)) );
    $fActual_2_ano = date('Y-m-d', strtotime('-2 year', strtotime($fActual)) );


}else{
    $tmp = date('Y-m-d');
    $fActual = date('Y-m-d',strtotime($tmp));

//    $fActual = date('2020-12-31');
    $fActual_1_ano = date('Y-m-d', strtotime('-1 year', strtotime($fActual)) );
    $fActual_2_ano = date('Y-m-d', strtotime('-2 year', strtotime($fActual)) );

}

$zona = ComprobantesControlador::ctrGrafVentasAcumZona($fActual_2_ano,$fActual_1_ano,1);
$cliente = ComprobantesControlador::ctrGraficoCliente($fActual_2_ano,$fActual_1_ano,1);
$industria = ComprobantesControlador::ctrGraficoIndustria($fActual_2_ano,$fActual_1_ano,1);


$acumCliente = ComprobantesControlador::ctrGrafVentasAcumClientes($fActual_1_ano,$fActual,1);
$acumZona = ComprobantesControlador::ctrGrafVentasAcumZona($fActual_1_ano,$fActual,1);
$acumIndustria = ComprobantesControlador::ctrGrafVentasAcumIndustria($fActual_1_ano,$fActual,1);




?>
<style>
    .table td {
        text-align: center;
    }

    .container {
        max-width: 1600px !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<!-- Aviso Origen del Dato-->
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Datos obtenidos desde Data Warehouse (Eugcom ERP)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- Aviso Origen del Dato-->



<div class="container">
    <div class="card">
        <div class="card-body">

            <div>
                <form method="post">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Seleccione Año</label>
                            <select name="dropAnos" id="dropAnos" class="form-control" >

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
                        <button type="submit" name="btnMostrarPeriodo" id="btnMostrarPeriodo" class="btn btn-primary" >Mostrar</button>
                    </div>
            </div>
                </form>
            <br>
            <hr>
            <br>

            <!--
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">2020</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">2021</a>
                </li>

            </ul>-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br><br>
                    <h4>% Montos Contratos Vigentes por Zona</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 mx-auto">
                            <br>
                            <br>
                            <br>
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <td scope="col" class="table-secondary"><b>Zona</b></td>
                                    <td scope="col" class="table-warning"><b>MAT <?php echo nroaMes(date("n",strtotime($fActual_1_ano))).' '.date("Y",strtotime($fActual_1_ano)); ?></b></td>
                                    <td scope="col" class="table-success"><b>MAT <?php echo nroaMes(date("n",strtotime($fActual))).' '.date("Y",strtotime($fActual));?></b></td>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $totalAnual2 = 0;
                                $totalAcumulado2 = 0;

                                foreach ($zona as $row)
                                {
                                    if ($row['zona'] == 'Norte'):
                                        $totalAnual2 = $totalAnual2 + $row['acumulado'];
                                    echo '<tr>';
                                    echo '<td>'.$row['zona'].'</td>';
                                    echo '<td>$'.number_format($row['acumulado'],0,',','.').'</td>';
                                    foreach ($acumZona as $row2)
                                    {
                                        if ($row['zona'] == $row2['zona'])
                                        {
                                            echo '<td>$'.number_format($row2['acumulado'],0,',','.').'</td>';
                                            $totalAcumulado2 = $totalAcumulado2 + $row2['acumulado'];
                                        }
                                    }
                                    echo '</tr>';
                                    endif;
                                }

                                foreach ($zona as $row)
                                {
                                    if ($row['zona'] == 'Centro'):
                                        $totalAnual2 = $totalAnual2 + $row['acumulado'];
                                        echo '<tr>';
                                        echo '<td>'.$row['zona'].'</td>';
                                        echo '<td>$'.number_format($row['acumulado'],0,',','.').'</td>';
                                        foreach ($acumZona as $row2)
                                        {
                                            if ($row['zona'] == $row2['zona'])
                                            {
                                                echo '<td>$'.number_format($row2['acumulado'],0,',','.').'</td>';
                                                $totalAcumulado2 = $totalAcumulado2 + $row2['acumulado'];
                                            }
                                        }
                                        echo '</tr>';
                                    endif;
                                }

                                foreach ($zona as $row)
                                {
                                    if ($row['zona'] == 'Sur'):
                                        $totalAnual2 = $totalAnual2 + $row['acumulado'];
                                        echo '<tr>';
                                        echo '<td>'.$row['zona'].'</td>';
                                        echo '<td>$'.number_format($row['acumulado'],0,',','.').'</td>';
                                        foreach ($acumZona as $row2)
                                        {
                                            if ($row['zona'] == $row2['zona'])
                                            {
                                                echo '<td>$'.number_format($row2['acumulado'],0,',','.').'</td>';
                                                $totalAcumulado2 = $totalAcumulado2 + $row2['acumulado'];
                                            }
                                        }
                                        echo '</tr>';
                                    endif;
                                }

                                ?>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="table-active"><b>TOTALES</b></td>
                                    <td class="table-active"><b>$<?php echo number_format($totalAnual2,0,',','.');  ?></b></td>
                                    <td class="table-active"><b>$<?php echo number_format($totalAcumulado2,0,',','.');  ?></b></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <canvas id="zonaContrato" width="800" height="450"></canvas><br>
                            <center> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detalle1">
                                    <i class="fa fa-search"></i> Detalles
                                </button></center>
                        </div>
                        <div class="col-sm-4">
                            <canvas id="zonaContratoAcumulado" width="800" height="450"></canvas><br>
                            <center> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detalleAcum1">
                                    <i class="fa fa-search"></i> Detalles
                                </button></center>
                        </div>


                    </div>
                    <br>
                    <br>
                    <h4>% Montos Contratos Vigentes por Cliente</h4>
                    <hr>
                    <div class="row">

                        <div class="col-sm-4">
                            <br>
                            <br>
                            <br>
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <td scope="col" class="table-secondary"><b>Cliente</b></td>
                                    <td scope="col" class="table-warning"><b>MAT <?php echo nroaMes(date("n",strtotime($fActual_1_ano))).' '.date("Y",strtotime($fActual_1_ano)); ?></b></td>
                                    <td scope="col" class="table-success"><b>MAT <?php echo nroaMes(date("n",strtotime($fActual))).' '.date("Y",strtotime($fActual));?></b></td>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $totalAnual2 = 0;
                                $totalAcumulado2 = 0;



                                foreach ($acumCliente as $row3)
                                {
                                    echo '<tr>';
                                    echo '<td>' . $row3['cliente'] . '</td>';

                                    $flag = false;
                                    foreach ($cliente as $row)
                                    {
                                        if ($row['cliente'] == $row3['cliente'])
                                        {
                                            if ($row['totalAnualCliente'] == 0)
                                            {
                                                echo '<td>$0</td>';
                                            }else
                                            {
                                                echo '<td>$'.number_format($row['totalAnualCliente'],0,',','.').'</td>';
                                                $flag = true;
                                            }
                                            $totalAnual2 = $totalAnual2 + $row['totalAnualCliente'];
                                        }
                                    }
                                    if(!$flag && $row3['cliente'] != 'SQM'):
                                        echo '<td>$0</td>';
                                        endif;
                                    $flag = true;

                                    foreach ($acumCliente as $row2)
                                    {
                                        if ($row3['cliente'] == $row2['cliente'])
                                        {
                                            if ($row2['acumulado'] == 0)
                                            {
                                                echo '<td>$0</td>';
                                            }else
                                            {
                                                echo '<td>$'.number_format($row2['acumulado'],0,',','.').'</td>';
                                            }
                                            $totalAcumulado2 = $totalAcumulado2 + $row2['acumulado'];
                                        }
                                    }

                                    echo '</tr>';
                                }







/*
                                foreach ($cliente as $row)
                                {
                                    $totalAnual2 = $totalAnual2 + $row['totalAnualCliente'];
                                    echo '<tr>';

                                    echo '<td>'.$row['cliente'].'</td>';
                                    echo '<td>$'.number_format($row['totalAnualCliente'],0,',','.').'</td>';
                                    foreach ($acumCliente as $row2)
                                    {
                                        if ($row['cliente'] == $row2['cliente'])
                                        {
                                            echo '<td>$'.number_format($row2['acumulado'],0,',','.').'</td>';
                                            $totalAcumulado2 = $totalAcumulado2 + $row2['acumulado'];
                                        }
                                    }


                                    echo '</tr>';

                                }
*/
                                ?>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="table-active"><b>TOTALES</b></td>
                                    <td class="table-active"><b>$<?php echo number_format($totalAnual2,0,',','.');  ?></b></td>
                                    <td class="table-active"><b>$<?php echo number_format($totalAcumulado2,0,',','.');  ?></b></td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>

                        <div class="col-sm-4">
                            <canvas id="clientes" width="800" height="450"></canvas><br>
                            <center> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detalle2">
                                    <i class="fa fa-search"></i> Detalles
                                </button></center>
                        </div>

                        <div class="col-sm-4">
                            <canvas id="clientesAcumulado" width="800" height="450"></canvas><br>
                            <center> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detalleAcum2">
                                    <i class="fa fa-search"></i> Detalles
                                </button></center>
                        </div>


                    </div>





                    <br>
                    <br>
                    <h4>% Montos Contratos Vigentes por Industria</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <br>
                            <br>
                            <br>
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <td scope="col" class="table-secondary"><b>Industria</b></td>
                                    <td scope="col" class="table-warning"><b>MAT <?php echo nroaMes(date("n",strtotime($fActual_1_ano))).' '.date("Y",strtotime($fActual_1_ano)); ?></b></td>
                                    <td scope="col" class="table-success"><b>MAT <?php echo nroaMes(date("n",strtotime($fActual))).' '.date("Y",strtotime($fActual));?></b></td>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $totalAnual1 = 0;
                                $totalAcumulado1 = 0;

                                foreach ($industria as $row)
                                {
                                    $totalAnual1 = $totalAnual1 + $row['totalAnualCliente'];
                                    echo '<tr>';
                                    echo '<td>'.$row['zona'].'</td>';
                                    echo '<td>$'.number_format($row['totalAnualCliente'],0,',','.').'</td>';
                                    foreach ($acumIndustria as $row2)
                                    {
                                        if ($row['zona'] == $row2['industria'])
                                        {
                                            echo '<td>$'.number_format($row2['acumulado'],0,',','.').'</td>';
                                            $totalAcumulado1 = $totalAcumulado1 + $row2['acumulado'];
                                        }

                                    }

                                    echo '</tr>';

                                }
                                $totalAcumulado1 = $totalAcumulado1;
                                ?>



                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="table-active"><b>TOTALES</b></td>
                                    <td class="table-active"><b>$<?php echo number_format($totalAnual1,0,',','.');  ?></b></td>
                                    <td class="table-active"><b>$<?php echo number_format($totalAcumulado1,0,',','.');  ?></b></td>
                                </tr>
                                </tfoot>
                            </table>

                        </div>

                        <div class="col-sm-4">
                            <canvas id="IndustriaContrato" width="800" height="450"></canvas><br>
                            <center> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detalle3">
                                    <i class="fa fa-search"></i> Detalles
                                </button></center>
                        </div>

                        <div class="col-sm-4">

                            <canvas id="IndustriaContratoAcum" width="800" height="450"></canvas><br>

                             <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#detalleAcum3" style="margin:0 auto;
    display:block;">
                                    <i class="fa fa-search"></i> Detalles  </button>

                    </div>

                        <div class="col-sm-4">
                            <p>*Origen datos: "Datos en Vivo"</p>
                        </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                </div>
            </div>



        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="detalle1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">% Montos Contratos Vigentes por Zona </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Zona</th>
                        <th scope="col">%</th>
                        <th scope="col">Monto</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($zona as $row)
                    {
                        if ($row['porcTotal'] == 0):
                        echo '<tr>';
                        echo '<td>'.$row['zona'].'</td>';
                        echo '<td>'.$row['porcTotal'].'</td>';
                        echo '<td>'.number_format($row['acumulado'],0,',','.').'</td>';
                        echo '</tr>';
                        endif;

                    }


                    ?>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detalleAcum1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">% Montos Contratos Vigentes por Zona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Zona</th>
                        <th scope="col">%</th>
                        <th scope="col">Monto</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($acumZona as $row)
                    {
                        if ($row['porcTotal']!=0):
                        echo '<tr>';
                        echo '<td>'.$row['zona'].'</td>';
                        echo '<td>'.$row['porcTotal'].'</td>';
                        echo '<td>'.number_format($row['acumulado'],0,',','.').'</td>';
                        echo '</tr>';
                        endif;

                    }


                    ?>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>






<div class="modal fade" id="detalle2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">% Montos Contratos Vigentes por Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">%</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($cliente as $row)
                    {
                        if($row['totalAnualCliente'] != 0):
                        echo '<tr>';
                        echo '<td>'.$row['cliente'].'</td>';
                        echo '<td>'.$row['porcTotal'].'</td>';
                        echo '<td>'.number_format($row['totalAnualCliente'],0,',','.').'</td>';
                        echo '</tr>';
                        endif;
                    }
                    ?>


                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detalleAcum2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">% Montos Contratos Vigentes por Cliente </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">%</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($acumCliente as $row)
                    {
                        if($row['porcTotal'] != 0):
                        echo '<tr>';
                        echo '<td>'.$row['cliente'].'</td>';
                        echo '<td>'.$row['porcTotal'].'</td>';
                        echo '<td>'.number_format($row['acumulado'],0,',','.').'</td>';
                        echo '</tr>';
                        endif;
                    }
                    ?>


                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>






<div class="modal fade" id="detalle3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">% Montos Contratos Vigentes por Industria </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="modal-body">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Industria</th>
                            <th scope="col">%</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                <?php
                foreach ($industria as $row)
                {
                    if($row['porcTotal'] != 0):
                    echo '<tr>';
                    echo '<td>'.$row['zona'].'</td>';
                    echo '<td>'.$row['porcTotal'].'</td>';
                    echo '<td>'.number_format($row['totalAnualCliente'],0,',','.').'</td>';
                    echo '</tr>';
                    endif;
                }
                ?>
                        </tbody>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="detalleAcum3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">% Montos Contratos Vigentes por Industria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="modal-body">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Industria</th>
                            <th scope="col">%</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($acumIndustria as $row)
                        {
                            if ($row['porcTotal'] != 0)
                            {
                                echo '<tr>';
                                echo '<td>'.$row['industria'].'</td>';
                                echo '<td>'.$row['porcTotal'].'</td>';
                                echo '<td>'.number_format($row['acumulado'],0,',','.').'</td>';
                                echo '</tr>';
                            }

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>





<script>

    new Chart(document.getElementById("zonaContrato"), {
        type: 'pie',
        data: {
            labels: [<?php

                foreach ($zona as $row)
                {
                    if($row['zona'] == 'Norte')
                    {
                        echo '"'.$row['zona'].'",';
                    }
                }

                foreach ($zona as $row)
                {
                    if($row['zona'] == 'Centro')
                    {
                        echo '"'.$row['zona'].'",';
                    }
                }

                foreach ($zona as $row)
                {
                    if($row['zona'] == 'Sur')
                    {
                        echo '"'.$row['zona'].'",';
                    }
                }

                ?>],
            datasets: [{
                backgroundColor: ["#006FFF", "#FFBF00","#FF005C","#e8c3b9","#c45850"],
                data: [<?php

                    foreach ($zona as $row)
                    {
                        if($row['zona'] == 'Norte')
                        {
                            echo '"'.$row['porcTotal'].'",';
                        }
                    }

                    foreach ($zona as $row)
                    {
                        if($row['zona'] == 'Centro')
                        {
                            echo '"'.$row['porcTotal'].'",';
                        }
                    }

                    foreach ($zona as $row)
                    {
                        if($row['zona'] == 'Sur')
                        {
                            echo '"'.$row['porcTotal'].'",';
                        }
                    }


                    ?>],
                datalabels: {
                    color: '#000000',
                    font: {
                        weight: 'bold',
                        size: 16,
                    }
                }
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontSize: 21
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#36A2EB',
                    formatter: function(value, context) {
                        return value+'' ;
                    }
                }
            }
        }
    });
    new Chart(document.getElementById("zonaContratoAcumulado"), {
        type: 'pie',
        data: {
            labels: [<?php

                foreach ($acumZona as $row)
                {
                    if($row['zona'] == 'Norte')
                    {
                        echo '"'.$row['zona'].'",';
                    }
                }

                foreach ($acumZona as $row)
                {
                    if($row['zona'] == 'Centro')
                    {
                        echo '"'.$row['zona'].'",';
                    }
                }

                foreach ($acumZona as $row)
                {
                    if($row['zona'] == 'Sur')
                    {
                        echo '"'.$row['zona'].'",';
                    }
                }

                ?>],
            datasets: [{
                backgroundColor: ["#006FFF", "#FFBF00","#FF005C","#e8c3b9","#c45850"],
                data: [<?php

                    foreach ($acumZona as $row)
                    {
                        if($row['zona'] == 'Norte')
                        {
                            echo '"'.$row['porcTotal'].'",';
                        }
                    }

                    foreach ($acumZona as $row)
                    {
                        if($row['zona'] == 'Centro')
                        {
                            echo '"'.$row['porcTotal'].'",';
                        }
                    }

                    foreach ($acumZona as $row)
                    {
                        if($row['zona'] == 'Sur')
                        {
                            echo '"'.$row['porcTotal'].'",';
                        }
                    }


                    ?>],
                datalabels: {
                    color: '#000000',
                    font: {
                        weight: 'bold',
                        size: 16,
                    }
                }
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontSize: 21
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#36A2EB',
                    formatter: function(value, context) {
                        return value+'' ;
                    }
                }
            }
        }
    });




    new Chart(document.getElementById("clientes"), {
        type: 'pie',
        data: {
            labels: [<?php

                foreach ($cliente as $row)
                {
                    if($row['porcTotal'] != 0):
                    echo '"'.$row['cliente'].'",';
                    endif;
                }

                ?>],
            datasets: [{
                backgroundColor: [<?php

                    foreach ($cliente as $row)
                    {
                        if($row['porcTotal'] != 0):
                            echo '"'.$row['color'].'",';
                        endif;
                    }

                    ?>],
                data: [<?php
                    foreach ($cliente as $row)
                    {
                        if($row['porcTotal'] != 0):
                        echo '"'.$row['porcTotal'].'",';
                        endif;
                    }
                    ?>],
                datalabels: {
                    color: '#000000',
                    font: {
                        weight: 'bold',
                        size: 16,
                    }
                }
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontSize: 21
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#36A2EB',
                    formatter: function(value, context) {
                        return value+'' ;
                    }
                }
            }
        }
    });
    new Chart(document.getElementById("clientesAcumulado"), {
        type: 'pie',
        data: {
            labels: [<?php

                foreach ($acumCliente as $row)
                {
                    if ($row['porcTotal'] != 0):
                    echo '"'.$row['cliente'].'",';
                    endif;
                }

                ?>],
            datasets: [{
                backgroundColor: [<?php

                    foreach ($acumCliente as $row)
                    {
                        if($row['porcTotal'] != 0):
                            echo '"'.$row['color'].'",';
                        endif;
                    }

                    ?>],
                data: [<?php
                    foreach ($acumCliente as $row)
                    {
                        if ($row['porcTotal'] != 0):
                        echo '"'.$row['porcTotal'].'",';
                        endif;
                    }
                    ?>],
                datalabels: {
                    color: '#000000',
                    font: {
                        weight: 'bold',
                        size: 16,
                    }
                }
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontSize: 21
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#36A2EB',
                    formatter: function(value, context) {
                        return value+'' ;
                    }
                }
            }
        }
    });


    new Chart(document.getElementById("IndustriaContrato"), {
        type: 'pie',
        data: {
            labels: [<?php

                foreach ($industria as $row)
                {
                    if($row['porcTotal'] != 0)
                    {
                        echo '"'.$row['zona'].'",';
                    }
                }

                ?>],
            datasets: [{
                backgroundColor: [<?php

                    foreach ($industria as $row)
                    {
                        if($row['porcTotal'] != 0):
                            echo '"'.$row['color'].'",';
                        endif;
                    }

                    ?>],
                data: [<?php
                    foreach ($industria as $row)
                    {
                        if($row['porcTotal'] != 0)
                        {
                            echo '"'.$row['porcTotal'].'",';
                        }
                    }
                    ?>],
                datalabels: {
                    color: '#000000',
                    font: {
                        weight: 'bold',
                        size: 16,
                    }
                }
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontSize: 21
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#36A2EB',
                    formatter: function(value, context) {
                        return value+'' ;
                    }
                }
            }
        }
    });
    new Chart(document.getElementById("IndustriaContratoAcum"), {
        type: 'pie',
        data: {
            labels: [<?php

                foreach ($acumIndustria as $row)
                {
                    if ($row['porcTotal'] != 0):
                    echo '"'.$row['industria'].'",';
                    endif;
                }

                ?>],
            datasets: [{
                backgroundColor: [<?php

                    foreach ($acumIndustria as $row)
                    {
                        if($row['porcTotal'] != 0):
                            echo '"'.$row['color'].'",';
                        endif;
                    }

                    ?>],
                data: [<?php
                    foreach ($acumIndustria as $row)
                    {
                        if ($row['porcTotal'] != 0):
                        echo '"'.$row['porcTotal'].'",';
                        endif;
                    }
                    ?>],
                datalabels: {
                    color: '#000000',
                    font: {
                        weight: 'bold',
                        size: 16,
                    }
                }
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontSize: 21
                }
            },
            plugins: {
                // Change options for ALL labels of THIS CHART
                datalabels: {
                    color: '#36A2EB',
                    formatter: function(value, context) {
                        return value+'' ;
                    }
                }
            }
        }
    });







</script>


