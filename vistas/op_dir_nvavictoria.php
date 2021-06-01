<?php

// Sustentanibilidad
$actp = OperacionesControlador::ctrIndicadorPrevencion(date('Y'),['Con Tiempo Perdido'],[532]);
$astp = OperacionesControlador::ctrIndicadorPrevencion(date('Y'),['Sin Tiempo Perdido','Daño Material'],[532]);

// CLiente
$dispPromedio = OperacionesControlador::ctrPorcDisponibilidad(date('Y'),[532]);


// Eficiencia
$CF_Horas = OperacionesControlador::ctrObtenerPromProduccion(date('Y'),['CARGADOR FRONTAL'],[532],['HR']);
$TO_Horas = OperacionesControlador::ctrObtenerPromProduccion(date('Y'),['TRACTOR ORUGA'],[532],['HR']);
$TV_Horas = OperacionesControlador::ctrObtenerPromProduccion(date('Y'),['TOLVA'],[532],['HR']);
$EX_Horas = OperacionesControlador::ctrObtenerPromProduccion(date('Y'),['EXCAVADORA'],[532],['HR']);
$RD_Horas = OperacionesControlador::ctrObtenerPromProduccion(date('Y'),['RODILLO'],[532],['HR']);

$CF_Rend = OperacionesControlador::ctrObtenerRendComb(date('Y'),['CARGADOR FRONTAL'],[532],$CF_Horas);
$TO_Rend = OperacionesControlador::ctrObtenerRendComb(date('Y'),['TRACTOR ORUGA'],[532],$TO_Horas);
$TV_Rend = OperacionesControlador::ctrObtenerRendComb(date('Y'),['TOLVA'],[532],$TV_Horas);
$EX_Rend = OperacionesControlador::ctrObtenerRendComb(date('Y'),['EXCAVADORA'],[532],$EX_Horas);
$RD_Rend = OperacionesControlador::ctrObtenerRendComb(date('Y'),['RODILLO'],[532],$RD_Horas);

// Datos Fijos Pruebas

$periodoPasado = date('Y')-1;
$ano = date('Y');

$datosFijos = OperacionesControlador::ctrObtenerDatosFijos(date('Y'),532);

var_dump($datosFijos);




//var_dump($CF_Horas);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="card">
        <div class="card-body">
            <center><h3>Consolidado Operacional - Nva. Victoria (<?php echo date('Y') ?>)</h3></center>
            <br><br>
            <div class="row">
                <table class="table table-sm">
                    <thead>
                    <tr class="table-primary">
                        <th scope="col" style="width: 15%" >SUSTENTABILIDAD</th>
                        <th scope="col" style="width: 5%">UN</th>
                        <th scope="col">PROYECTADO</th>
                        <th scope="col">META AÑO</th>
                        <th scope="col">PASADO</th>
                        <th scope="col">ACUMULADO</th>

                        <th scope="col">ENE</th>
                        <th scope="col">FEB</th>
                        <th scope="col">MAR</th>
                        <th scope="col">ABR</th>
                        <th scope="col">MAY</th>
                        <th scope="col">JUN</th>
                        <th scope="col">JUL</th>
                        <th scope="col">AGO</th>
                        <th scope="col">SEP</th>
                        <th scope="col">OCT</th>
                        <th scope="col">NOV</th>
                        <th scope="col">DIC</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row" >ACTP</th>
                        <td>Evento</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$actp[0][1].'</td>';
                        echo '<td>'.$actp[0][2].'</td>';
                        echo '<td>'.$actp[0][3].'</td>';
                        echo '<td>'.$actp[0][4].'</td>';
                        echo '<td>'.$actp[0][5].'</td>';
                        echo '<td>'.$actp[0][6].'</td>';
                        echo '<td>'.$actp[0][7].'</td>';
                        echo '<td>'.$actp[0][8].'</td>';
                        echo '<td>'.$actp[0][9].'</td>';
                        echo '<td>'.$actp[0][10].'</td>';
                        echo '<td>'.$actp[0][11].'</td>';
                        echo '<td>'.$actp[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row"> ASTP O MATERIAL</th>
                        <td>Evento</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$astp[0][1].'</td>';
                        echo '<td>'.$astp[0][2].'</td>';
                        echo '<td>'.$astp[0][3].'</td>';
                        echo '<td>'.$astp[0][4].'</td>';
                        echo '<td>'.$astp[0][5].'</td>';
                        echo '<td>'.$astp[0][6].'</td>';
                        echo '<td>'.$astp[0][7].'</td>';
                        echo '<td>'.$astp[0][8].'</td>';
                        echo '<td>'.$astp[0][9].'</td>';
                        echo '<td>'.$astp[0][10].'</td>';
                        echo '<td>'.$astp[0][11].'</td>';
                        echo '<td>'.$astp[0][12].'</td>';
                        ?>
                    </tr>


                    <!--
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    -->
                    </tbody>
                </table>
                <br>
                <!-- Cliente -->
                <table class="table table-sm">
                    <thead>
                    <tr class="table-primary">
                        <th scope="col" style="width: 15%">CLIENTE</th>
                        <th scope="col" style="width: 5%">UN</th>
                        <th scope="col">PROYECTADO</th>
                        <th scope="col">META AÑO</th>
                        <th scope="col">PASADO</th>
                        <th scope="col">ACUMULADO</th>

                        <th scope="col">ENE</th>
                        <th scope="col">FEB</th>
                        <th scope="col">MAR</th>
                        <th scope="col">ABR</th>
                        <th scope="col">MAY</th>
                        <th scope="col">JUN</th>
                        <th scope="col">JUL</th>
                        <th scope="col">AGO</th>
                        <th scope="col">SEP</th>
                        <th scope="col">OCT</th>
                        <th scope="col">NOV</th>
                        <th scope="col">DIC</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row">DISP.  DE LOS EQUIPOS </th>
                        <td>%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$dispPromedio[0][1].'</td>';
                        echo '<td>'.$dispPromedio[0][2].'</td>';
                        echo '<td>'.$dispPromedio[0][3].'</td>';
                        echo '<td>'.$dispPromedio[0][4].'</td>';
                        echo '<td>'.$dispPromedio[0][5].'</td>';
                        echo '<td>'.$dispPromedio[0][6].'</td>';
                        echo '<td>'.$dispPromedio[0][7].'</td>';
                        echo '<td>'.$dispPromedio[0][8].'</td>';
                        echo '<td>'.$dispPromedio[0][9].'</td>';
                        echo '<td>'.$dispPromedio[0][10].'</td>';
                        echo '<td>'.$dispPromedio[0][11].'</td>';
                        echo '<td>'.$dispPromedio[0][12].'</td>';
                        ?>
                    </tr>
                    <!--
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    -->
                    </tbody>
                </table>
                <br>

                <!-- Cliente -->
                <table class="table table-sm">
                    <thead>
                    <tr class="table-primary">
                        <th scope="col" style="width: 15%">EFICIENCIA</th>
                        <th scope="col" style="width: 5%">UN</th>
                        <th scope="col">PROYECTADO</th>
                        <th scope="col">META AÑO</th>
                        <th scope="col">PASADO</th>
                        <th scope="col">ACUMULADO</th>

                        <th scope="col">ENE</th>
                        <th scope="col">FEB</th>
                        <th scope="col">MAR</th>
                        <th scope="col">ABR</th>
                        <th scope="col">MAY</th>
                        <th scope="col">JUN</th>
                        <th scope="col">JUL</th>
                        <th scope="col">AGO</th>
                        <th scope="col">SEP</th>
                        <th scope="col">OCT</th>
                        <th scope="col">NOV</th>
                        <th scope="col">DIC</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row">HRS CARGADOR FRONTAL</th>
                        <td>HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td><a href="vistas/op_det_reports.php?ano='.$ano.'&mes=1&cco=532&tipo='.urlencode('CARGADOR FRONTAL').'" target="_blank">'.$CF_Horas[0][1].'</a></td>';
                        //echo '<td>'.$CF_Horas[0][1].'</td>';
                        echo '<td>'.$CF_Horas[0][2].'</td>';
                        echo '<td>'.$CF_Horas[0][3].'</td>';
                        echo '<td>'.$CF_Horas[0][4].'</td>';
                        echo '<td>'.$CF_Horas[0][5].'</td>';
                        echo '<td>'.$CF_Horas[0][6].'</td>';
                        echo '<td>'.$CF_Horas[0][7].'</td>';
                        echo '<td>'.$CF_Horas[0][8].'</td>';
                        echo '<td>'.$CF_Horas[0][9].'</td>';
                        echo '<td>'.$CF_Horas[0][10].'</td>';
                        echo '<td>'.$CF_Horas[0][11].'</td>';
                        echo '<td>'.$CF_Horas[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">HRS TRACTOR ORUGA</th>
                        <td>HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$TO_Horas[0][1].'</td>';
                        echo '<td>'.$TO_Horas[0][2].'</td>';
                        echo '<td>'.$TO_Horas[0][3].'</td>';
                        echo '<td>'.$TO_Horas[0][4].'</td>';
                        echo '<td>'.$TO_Horas[0][5].'</td>';
                        echo '<td>'.$TO_Horas[0][6].'</td>';
                        echo '<td>'.$TO_Horas[0][7].'</td>';
                        echo '<td>'.$TO_Horas[0][8].'</td>';
                        echo '<td>'.$TO_Horas[0][9].'</td>';
                        echo '<td>'.$TO_Horas[0][10].'</td>';
                        echo '<td>'.$TO_Horas[0][11].'</td>';
                        echo '<td>'.$TO_Horas[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">HRS TOLVA</th>
                        <td>HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$TV_Horas[0][1].'</td>';
                        echo '<td>'.$TV_Horas[0][2].'</td>';
                        echo '<td>'.$TV_Horas[0][3].'</td>';
                        echo '<td>'.$TV_Horas[0][4].'</td>';
                        echo '<td>'.$TV_Horas[0][5].'</td>';
                        echo '<td>'.$TV_Horas[0][6].'</td>';
                        echo '<td>'.$TV_Horas[0][7].'</td>';
                        echo '<td>'.$TV_Horas[0][8].'</td>';
                        echo '<td>'.$TV_Horas[0][9].'</td>';
                        echo '<td>'.$TV_Horas[0][10].'</td>';
                        echo '<td>'.$TV_Horas[0][11].'</td>';
                        echo '<td>'.$TV_Horas[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">HRS EXCAVADORA</th>
                        <td>HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$EX_Horas[0][1].'</td>';
                        echo '<td>'.$EX_Horas[0][2].'</td>';
                        echo '<td>'.$EX_Horas[0][3].'</td>';
                        echo '<td>'.$EX_Horas[0][4].'</td>';
                        echo '<td>'.$EX_Horas[0][5].'</td>';
                        echo '<td>'.$EX_Horas[0][6].'</td>';
                        echo '<td>'.$EX_Horas[0][7].'</td>';
                        echo '<td>'.$EX_Horas[0][8].'</td>';
                        echo '<td>'.$EX_Horas[0][9].'</td>';
                        echo '<td>'.$EX_Horas[0][10].'</td>';
                        echo '<td>'.$EX_Horas[0][11].'</td>';
                        echo '<td>'.$EX_Horas[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">HRS RODILLO</th>
                        <td>HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$RD_Horas[0][1].'</td>';
                        echo '<td>'.$RD_Horas[0][2].'</td>';
                        echo '<td>'.$RD_Horas[0][3].'</td>';
                        echo '<td>'.$RD_Horas[0][4].'</td>';
                        echo '<td>'.$RD_Horas[0][5].'</td>';
                        echo '<td>'.$RD_Horas[0][6].'</td>';
                        echo '<td>'.$RD_Horas[0][7].'</td>';
                        echo '<td>'.$RD_Horas[0][8].'</td>';
                        echo '<td>'.$RD_Horas[0][9].'</td>';
                        echo '<td>'.$RD_Horas[0][10].'</td>';
                        echo '<td>'.$RD_Horas[0][11].'</td>';
                        echo '<td>'.$RD_Horas[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">REND. CARGADOR FRONTAL</th>
                        <td>LT/HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$CF_Rend[0][1].'</td>';
                        echo '<td>'.$CF_Rend[0][2].'</td>';
                        echo '<td>'.$CF_Rend[0][3].'</td>';
                        echo '<td>'.$CF_Rend[0][4].'</td>';
                        echo '<td>'.$CF_Rend[0][5].'</td>';
                        echo '<td>'.$CF_Rend[0][6].'</td>';
                        echo '<td>'.$CF_Rend[0][7].'</td>';
                        echo '<td>'.$CF_Rend[0][8].'</td>';
                        echo '<td>'.$CF_Rend[0][9].'</td>';
                        echo '<td>'.$CF_Rend[0][10].'</td>';
                        echo '<td>'.$CF_Rend[0][11].'</td>';
                        echo '<td>'.$CF_Rend[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">REND. TRACTOR ORUGA</th>
                        <td>LT/HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$TO_Rend[0][1].'</td>';
                        echo '<td>'.$TO_Rend[0][2].'</td>';
                        echo '<td>'.$TO_Rend[0][3].'</td>';
                        echo '<td>'.$TO_Rend[0][4].'</td>';
                        echo '<td>'.$TO_Rend[0][5].'</td>';
                        echo '<td>'.$TO_Rend[0][6].'</td>';
                        echo '<td>'.$TO_Rend[0][7].'</td>';
                        echo '<td>'.$TO_Rend[0][8].'</td>';
                        echo '<td>'.$TO_Rend[0][9].'</td>';
                        echo '<td>'.$TO_Rend[0][10].'</td>';
                        echo '<td>'.$TO_Rend[0][11].'</td>';
                        echo '<td>'.$TO_Rend[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">REND. TOLVA</th>
                        <td>LT/HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$TV_Rend[0][1].'</td>';
                        echo '<td>'.$TV_Rend[0][2].'</td>';
                        echo '<td>'.$TV_Rend[0][3].'</td>';
                        echo '<td>'.$TV_Rend[0][4].'</td>';
                        echo '<td>'.$TV_Rend[0][5].'</td>';
                        echo '<td>'.$TV_Rend[0][6].'</td>';
                        echo '<td>'.$TV_Rend[0][7].'</td>';
                        echo '<td>'.$TV_Rend[0][8].'</td>';
                        echo '<td>'.$TV_Rend[0][9].'</td>';
                        echo '<td>'.$TV_Rend[0][10].'</td>';
                        echo '<td>'.$TV_Rend[0][11].'</td>';
                        echo '<td>'.$TV_Rend[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">REND. EXCAVADORA</th>
                        <td>LT/HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$EX_Rend[0][1].'</td>';
                        echo '<td>'.$EX_Rend[0][2].'</td>';
                        echo '<td>'.$EX_Rend[0][3].'</td>';
                        echo '<td>'.$EX_Rend[0][4].'</td>';
                        echo '<td>'.$EX_Rend[0][5].'</td>';
                        echo '<td>'.$EX_Rend[0][6].'</td>';
                        echo '<td>'.$EX_Rend[0][7].'</td>';
                        echo '<td>'.$EX_Rend[0][8].'</td>';
                        echo '<td>'.$EX_Rend[0][9].'</td>';
                        echo '<td>'.$EX_Rend[0][10].'</td>';
                        echo '<td>'.$EX_Rend[0][11].'</td>';
                        echo '<td>'.$EX_Rend[0][12].'</td>';
                        ?>
                    </tr>
                    <tr>
                        <th scope="row">REND. RODILLO</th>
                        <td>LT/HR</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <?php
                        echo '<td>'.$RD_Rend[0][1].'</td>';
                        echo '<td>'.$RD_Rend[0][2].'</td>';
                        echo '<td>'.$RD_Rend[0][3].'</td>';
                        echo '<td>'.$RD_Rend[0][4].'</td>';
                        echo '<td>'.$RD_Rend[0][5].'</td>';
                        echo '<td>'.$RD_Rend[0][6].'</td>';
                        echo '<td>'.$RD_Rend[0][7].'</td>';
                        echo '<td>'.$RD_Rend[0][8].'</td>';
                        echo '<td>'.$RD_Rend[0][9].'</td>';
                        echo '<td>'.$RD_Rend[0][10].'</td>';
                        echo '<td>'.$RD_Rend[0][11].'</td>';
                        echo '<td>'.$RD_Rend[0][12].'</td>';
                        ?>
                    </tr>
                    <!--
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    -->
                    </tbody>
                </table>


            </div>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <center><h4>Horas</h4></center>
                <canvas id="bar-chart-grouped" width="1680" height="920"></canvas>
            </div>

            <div class="col-6">
                <center><h4>Rendimiento (LT/HR)</h4></center>
                <canvas id="grafrendimiento" width="1680" height="920"></canvas>
            </div>


        </div>
    </div>
</div>

<script>
    new Chart(document.getElementById("bar-chart-grouped"), {
        type: 'bar',
        data: {
            labels: ["Cargador Frontal","Tractor Oruga","Tolva","Excavadora","Rodillo"],
            datasets: [
                {
                    label: "Acumulado",
                    backgroundColor: "#3e95cd",
                    data: [1036,1805,3021,1491,135]
                }, {
                    label: "Proyectado",
                    backgroundColor: "#8e5ea2",
                    data: [6600,10244,19224,6960,100]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Prueba'
            }
        }
    });

    new Chart(document.getElementById("grafrendimiento"), {
        type: 'bar',
        data: {
            labels: ["Cargador Frontal","Tractor Oruga","Tolva","Excavadora","Rodillo"],
            datasets: [
                {
                    label: "Acumulado",
                    backgroundColor: "#009c8c",
                    data: [20.8,38.6,5.1,15.9,9.1]
                }, {
                    label: "Proyectado",
                    backgroundColor: "#efb810",
                    data: [17.5,36,7.5,17.5,11]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Prueba'
            }
        }
    });

</script>
