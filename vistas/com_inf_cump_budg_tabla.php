<?php
require_once 'config/parametros.php';
$fActual = date('Y');
$listaEmpresasEugcom = ['0000100003','0000100006','0000100001','0000100013'];


//$informe = FinancieroControlador::ctrVerConsolidado($ano,[528,532,534],$listaEmpresasEugcom);



/*
$lista = ComprobantesControlador::ctrObtenerIngresosAnualesIndustrial($fActual,2);
$budgetBase = ComprobantesControlador::ctrObtenerPresupuestoUn($fActual,'Base','IKA Industrial');
$listaAcumulado = ComprobantesControlador::ctrObtenerIngresosAnualesAcumuladoIndustrial($fActual,2);
$budgetBaseAcumulado = ComprobantesControlador::ctrObtenerPresupuestoAcumuladoUn($fActual,'Base','IKA Industrial');
*/

$listaMineria = ComercialControlador::ctrVerCumplimientoBudget($fActual,'IKA Mineria',ParametrosApp::obtenerCCOUnMineria(),$listaEmpresasEugcom);
$listaIndustrial = ComercialControlador::ctrVerCumplimientoBudget($fActual,'IKA Industrial',ParametrosApp::obtenerCCOUnMineria(),$listaEmpresasEugcom);
$listaInfraestructura = ComercialControlador::ctrVerCumplimientoBudget($fActual,'IKA Infraestructura',ParametrosApp::obtenerCCOUnMineria(),$listaEmpresasEugcom);

//var_dump($listaInfraestructura);

?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Cumplimiento Budget (<?php echo $fActual; ?>)</h3></center><br>
            <div class="row">
                <div class="col-12">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Budget</th>
                            <th scope="col">Ene</th>
                            <th scope="col">Feb</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Abr</th>
                            <th scope="col">May</th>
                            <th scope="col">Jun</th>
                            <th scope="col">Jul</th>
                            <th scope="col">Ago</th>
                            <th scope="col">Sep</th>
                            <th scope="col">Oct</th>
                            <th scope="col">Nov</th>
                            <th scope="col">Dic</th>
                        </tr>
                        </thead>
                        <tbody>



<!-- Minería -->
<?php
                        echo '<tr>';
                        echo '<td>Venta Mensual Minería</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][1]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][2]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][3]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][4]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][5]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][6]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][7]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][8]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][9]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][10]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][11]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[0][12]).'</td>';
                        echo '</tr>';

                        echo '<tr class="table-secondary">';
                        echo '<td>Venta Acumulada Mensual Minería</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][1]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][2]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][3]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][4]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][5]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][6]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][7]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][8]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][9]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][10]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][11]).'</td>';
                        echo '<td>'.formateaPorcentajes($listaMineria[1][12]).'</td>';
                        echo '</tr>';
?>
<!-- Minería -->

<!-- Industrial -->
<?php
echo '<tr>';
echo '<td>Venta Mensual Industrial</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][1]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][2]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][3]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][4]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][5]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][6]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][7]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][8]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][9]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][10]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][11]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[0][12]).'</td>';
echo '</tr>';

echo '<tr class="table-secondary">';
echo '<td>Venta Acumulada Mensual Industrial</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][1]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][2]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][3]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][4]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][5]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][6]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][7]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][8]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][9]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][10]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][11]).'</td>';
echo '<td>'.formateaPorcentajes($listaIndustrial[1][12]).'</td>';
echo '</tr>';
?>
<!-- Industrial -->

<!-- Infraestructura -->
<?php
echo '<tr>';
echo '<td>Venta Mensual Infraestructura</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][1]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][2]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][3]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][4]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][5]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][6]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][7]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][8]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][9]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][10]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][11]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[0][12]).'</td>';
echo '</tr>';

echo '<tr class="table-secondary">';
echo '<td>Venta Acumulada Mensual Infraestructura</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][1]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][2]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][3]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][4]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][5]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][6]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][7]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][8]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][9]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][10]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][11]).'</td>';
echo '<td>'.formateaPorcentajes($listaInfraestructura[1][12]).'</td>';
echo '</tr>';
?>
<!-- Infraestructura -->

                        </tbody>
                    </table>
                </div>
            </div>



            <!--- fin card -->
        </div>

    </div>
</div>

