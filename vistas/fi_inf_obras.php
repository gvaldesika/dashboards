<?php

// Muestra lista de Obras
$listaObras = AuxiliaresControlador::ctrVerTodosCCOOperacionales();





//$ingresos = FinancieroControlador::ctrVerCuentaGastoAnual($ano,$listaCuentaGastos,$listaCentroCostos,$listaEmpresasEugcom);





if (isset($_POST['btnFiltrar']))
{
    if ($_POST['idCCO'] == -1)
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa fa-warning"></i> Debe seleccionar una Obra
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $muestraTabla = 'display:none';

    }else
    {
        $muestraTabla = '';
        $ano=$_POST['dropPerido'];
        $cco = $_POST['idCCO'];
        $nomCCo = AuxiliaresControlador::mdlCCOaNombre($cco)['nombre_cco'];
        //$listaCentroCostos = ParametrosApp::obtenerCCOUnMineria();
        $listaEmpresasEugcom = ['0000100003','0000100006','0000100001','0000100013'];
        $informe = FinancieroControlador::ctrVerObra($ano,[$cco],$listaEmpresasEugcom);

        // Guarda el informe en una vairable de sesion para poder exportarla a Excel
        $a = array(
                'nom_informe' => 'resultado_obra',
                'cco' => $cco,
                'nom_cco' =>$nomCCo,
                'periodo' => $ano,
                'informe' => $informe

        );
        $_SESSION['informe'] = $a;
    }

}else
{
    $muestraTabla = 'display:none';
}




?>
<script type="text/javascript">

    $(document).ready(function(){
        $('#loadingDivLoad').hide();

        $("#btnFiltrar").click(function(){
            $('#loadingDivLoad').show();
        });

    });

</script>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <center><h3>Resultados Obras</h3></center><br>

                <form method="post">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="cars">Escoja origen del dato</label>
                            <select name="dropOrigen" id="dropOrigen" class="form-control">
                                <option value="1">Dato en vivo</option>
                                <!-- <option value="2">Datos publicados</option> -->
                            </select>
                            <br>
                            <button type="submit" name="btnFiltrar" id="btnFiltrar" class="btn btn-primary">Mostrar</button>

                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Seleccione Obra:</label>
                                <select name="idCCO" id="idCCO" class="form-control">
                                    <option value="-1">Seleccione Obra</option>
                                    <?php
                                    foreach ($listaObras as $row)
                                    {
                                        if($_POST['idCCO'] == $row['codigo_cco'])
                                        {
                                            echo '<option value="'.$row['codigo_cco'].'" selected="selected">'.$row['nombre_cco'].'</option>';

                                        }else
                                        {
                                            echo '<option value="'.$row['codigo_cco'].'">'.$row['nombre_cco'].'</option>';

                                        }

                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label for="cars">Seleccione Periodo</label>
                            <select name="dropPerido" id="dropPerido" class="form-control">
                                <?php
                                foreach (devuelveAnos() as $row)
                                {
                                    if($_POST['dropPerido'] == $row)
                                    {
                                        echo '<option value="'.$row.'" selected="selected">'.$row.'</option>';
                                    }else{
                                        echo '<option value="'.$row.'">'.$row.'</option>';
                                    }

                                }

                                ?>

                            </select>
                        </div>

                    </div>
                </form>
                <hr>
                <br>

                <center><div id="loadingDivLoad" name="loadingDivLoad"> Cargando informaci??n, por favor espere ... <img src="https://sistemas.ika-hub.cl/extranet/html/images/loader/ajax-loader.gif"/>          </div></center>
                <br>
                <div style="<?php echo $muestraTabla; ?>">
                    <form method="post">
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-success pull-right" href="/dashboards/vistas/exportar_informe.php" target="_blank"><i class="fa fa-cloud-download"></i> Generar Excel</a>
                        </div>
                    </div>
                    </form>
<br>
                <table class="table table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="14" class="text-center"><?php echo 'Obra: '.$nomCCo.' - Periodo: '.$ano ?></th>

                    </tr>
                    <tr class="text-center">
                        <th scope="col">Estado Resultado (Millones de Pesos)</th>
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
                        <th scope="col">Tot</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
//var_dump($informe);
                    //var_dump($informe['Ingresos de Explotaci??n']);
                    foreach ($informe['Ingresos de Explotaci??n'] as $row)
                    {
                        $op = 'Ingresos de Explotaci??n';


                        echo '<tr>';
                        echo '<td><b>Ingresos de Explotaci??n</b></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    echo '<tr>';
                    echo '<td><b>Costo Directo</b></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '</tr>';

                    foreach ($informe['Arriendo Inmuebles'] as $row)
                    {
                        $op = 'Arriendo Inmuebles';
                        echo '<tr>';
                        echo '<td>Arriendo Inmuebles</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Arriendo Maquinarias'] as $row)
                    {
                        $op = 'Arriendo Maquinarias';

                        echo '<tr>';
                        echo '<td>Arriendo Maquinarias</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Arriendo Maquinarias Propias'] as $row)
                    {
                        $op = 'Arriendo Maquinarias Propias';
                        echo '<tr>';
                        echo '<td>Arriendo Maquinarias Propias</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Arriendo Vehiculos'] as $row)
                    {
                        $op = 'Arriendo Vehiculos';

                        echo '<tr>';
                        echo '<td>Arriendo Vehiculos</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Alojamiento y Pensi??n'] as $row)
                    {
                        $op = 'Alojamiento y Pensi??n';
                        echo '<tr>';
                        echo '<td>Alojamiento y Pensi??n</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Combustible'] as $row)
                    {
                        $op = 'Combustible';
                        echo '<tr>';
                        echo '<td>Combustible</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Comunicaciones'] as $row)
                    {
                        $op = 'Comunicaciones';
                        echo '<tr>';
                        echo '<td>Comunicaciones</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Contratista'] as $row)
                    {
                        $op = 'Contratista';
                        echo '<tr>';
                        echo '<td>Contratista</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Correc. Monetaria'] as $row)
                    {
                        $op = 'Correc. Monetaria';
                        echo '<tr>';
                        echo '<td>Correc. Monetaria</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Demovilizaci??n Faenas'] as $row)
                    {
                        $op = 'Demovilizaci??n Faenas';
                        echo '<tr>';
                        echo '<td>Demovilizaci??n Faenas</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Depreciacion Activo'] as $row)
                    {
                        $op = 'Depreciacion Activo';

                        echo '<tr>';
                        echo '<td>Depreciacion Activo</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Flete Maquinarias'] as $row)
                    {
                        $op = 'Flete Maquinarias';

                        echo '<tr>';
                        echo '<td>Flete Maquinarias</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Gastos de Viaje y Representaci??n'] as $row)
                    {
                        $op = 'Gastos de Viaje y Representaci??n';
                        echo '<tr>';
                        echo '<td>Gastos de Viaje y Representaci??n</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Gastos Generales'] as $row)
                    {
                        $op = 'Gastos Generales';
                        echo '<tr>';
                        echo '<td>Gastos Generales</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Indemnizaciones'] as $row)
                    {
                        $op = 'Indemnizaciones';
                        echo '<tr>';
                        echo '<td>Indemnizaciones</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Mat. E Insumos Varios'] as $row)
                    {
                        $op = 'Mat. E Insumos Varios';
                        echo '<tr>';
                        echo '<td>Mat. E Insumos Varios</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Multas, Infracciones y Mermas'] as $row)
                    {
                        $op = 'Multas, Infracciones y Mermas';
                        echo '<tr>';
                        echo '<td>Multas, Infracciones y Mermas</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Patentes y D?? Municipales'] as $row)
                    {
                        $op = 'Patentes y D?? Municipales';
                        echo '<tr>';
                        echo '<td>Patentes y D?? Municipales</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Permisos de Circulaci??n'] as $row)
                    {
                        $op = 'Permisos de Circulaci??n';
                        echo '<tr>';
                        echo '<td>Permisos de Circulaci??n</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Remuneraciones y Gastos del Personal'] as $row)
                    {
                        $op = 'Remuneraciones y Gastos del Personal';
                        echo '<tr>';
                        echo '<td>Remuneraciones y Gastos del Personal</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Servicios Administrativos'] as $row)
                    {
                        $op = 'Servicios Administrativos';

                        echo '<tr>';
                        echo '<td>Servicios Administrativos</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Servicio de Alimentaci??n'] as $row)
                    {
                        $op = 'Servicio de Alimentaci??n';
                        echo '<tr>';
                        echo '<td>Servicio de Alimentaci??n</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Servicio de Vigilancia'] as $row)
                    {
                        $op = 'Servicio de Vigilancia';
                        echo '<tr>';
                        echo '<td>Servicio de Vigilancia</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Servicios T??cnicos Industriales'] as $row)
                    {
                        $op = 'Servicios T??cnicos Industriales';
                        echo '<tr>';
                        echo '<td>Servicios T??cnicos Industriales</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Sistemas TI y Software'] as $row)
                    {
                        $op = 'Sistemas TI y Software';
                        echo '<tr>';
                        echo '<td>Sistemas TI y Software</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Transporte Combustibles'] as $row)
                    {
                        $op = 'Transporte Combustibles';
                        echo '<tr>';
                        echo '<td>Transporte Combustibles</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Transporte del Personal'] as $row)
                    {
                        $op = 'Transporte del Personal';
                        echo '<tr>';
                        echo '<td>Transporte del Personal</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Vacaciones Personal'] as $row)
                    {
                        $op = 'Vacaciones Personal';
                        echo '<tr>';
                        echo '<td>Vacaciones Personal</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&cco='.$cco.'" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Total Costo Directo'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Total Costo Directo</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[1]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[2]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[3]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[4]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[5]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[6]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[7]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[8]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[9]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[10]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[11]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[12]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }

                    // **** Resultados Operacionales ****
                    foreach ($informe['Resultados Operacionales'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Resultados Operacionales</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[1]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[2]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[3]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[4]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[5]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[6]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[7]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[8]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[9]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[10]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[11]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[12]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }

                    // **** Margen de Contribuci??n (%) ****
                    foreach ($informe['Margen de Contribuci??n (%)'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Margen de Contribuci??n (%)</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[1]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[2]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[3]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[4]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[5]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[6]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[7]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[8]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[9]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[10]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[11]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[12]).'</b></td>';
                        echo '<td><b>'.formateaPorcentajes($row[13]).'</b></td>';
                        echo '</tr>';
                    }


                    //Gastos Adm. y Ventas
                    foreach ($informe['Gastos Adm. y Ventas'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Gastos Adm. y Ventas</td>';
                        echo '<td>'.formateaNumeroMillones($row[1]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[2]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[3]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[4]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[5]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[6]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[7]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[8]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[9]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[10]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[11]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[12]).'</td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }

                    //Total Resultado
                    foreach ($informe['Total Resultado'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Total Resultado</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[1]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[2]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[3]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[4]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[5]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[6]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[7]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[8]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[9]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[10]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[11]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[12]).'</b></td>';
                        echo '<td><b>'.formateaNumeroMillones($row[13]).'</b></td>';
                        echo '</tr>';
                    }


                    ?>


                    </tbody>
                </table>







            </div>
        </div>
    </div>
</div>
</div>