<?php

// Muestra lista de Obras
$listaObras = AuxiliaresControlador::ctrVerTodosCCOOperacionales();


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

        //$listaCentroCostos = ParametrosApp::obtenerCCOUnMineria();
        $listaEmpresasEugcom = ['0000100003','0000100006','0000100001','0000100013'];
        $listaCCO = [10,12,15,18,19,20,21,22,23,25];
        $informe = FinancieroControlador::ctrVerAdmVentas($ano,$listaCCO,$listaEmpresasEugcom);
    }

}else
{
    $muestraTabla = 'display:none';
}

// Guarda el informe en una vairable de sesion para poder exportarla a Excel
$a = array(
    'nom_informe' => 'adm_finc',
    'cco' => '',
    'nom_cco' =>'ADM. Y VENTAS',
    'periodo' => $ano,
    'informe' => $informe

);
$_SESSION['informe'] = $a;

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
                <center><h3>Resultado Adm. y Ventas</h3></center><br>

                <form method="post">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="cars">Escoja origen del dato</label>
                            <select name="dropOrigen" id="dropOrigen" class="form-control">
                                <option value="1">Dato en vivo</option>
                                <!-- <option value="2">Datos publicados</option> -->
                            </select>
                            <br>

                        </div>

                        <div class="col-sm-2">
                            <label for="cars">Seleccione Periodo</label>
                            <select name="dropPerido" id="dropPerido" class="form-control">
                                <?php
                                foreach (devuelveAnos() as $row)
                                {
                                    echo '<option value="'.$row.'">'.$row.'</option>';
                                }

                                ?>

                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="cars">&nbsp;</label><br>
                            <button type="submit" name="btnFiltrar" id="btnFiltrar" class="btn btn-primary">Mostrar</button>
                        </div>
                        <div class="col-sm-6">
                            <label for="cars">&nbsp;</label><br>
                            <!-- onclick="return false;" -->
                            <a class="btn btn-success pull-right" href="/dashboards/vistas/exportar_informe.php"  target="_blank" ><i class="fa fa-cloud-download"></i> Generar Excel</a>
                        </div>

                    </div>
                </form>
                <hr>
                <br>
                <center><div id="loadingDivLoad" name="loadingDivLoad"> Cargando información, por favor espere ... <img src="https://sistemas.ika-hub.cl/extranet/html/images/loader/ajax-loader.gif"/>          </div></center>
                <div style="<?php echo $muestraTabla; ?>">

                <table class="table table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="14" class="text-center">Resultado Adm. y Ventas Consolidados - <?php echo 'Periodo: '.$ano ?></th>

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


                    $op = 'Arriendo Inmuebles';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Arriendo Inmuebles</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Arriendo Maquinarias Propias';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Arriendo Maquinarias Propias</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Arriendo Vehiculos';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Arriendo Vehiculos</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Alojamiento y Pensión';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Alojamiento y Pensión</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Combustible';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Combustible</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Comunicaciones';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Comunicaciones</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Contratista';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Contratista</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }

                    $op = 'Depreciacion Activo';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Depreciacion Activo</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Gastos de Viaje y Representación';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Gastos de Viaje y Representación</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Gastos Generales';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Gastos Generales</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Indemnizaciones';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Indemnizaciones</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Mat. E Insumos Varios';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Mat. E Insumos Varios</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Multas, Infracciones y Mermas';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Multas, Infracciones y Mermas</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Patentes y D° Municipales';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Patentes y D° Municipales</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Multas, Infracciones y Mermas';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Permisos de Circulación</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Remuneraciones y Gastos del Personal';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Remuneraciones y Gastos del Personal</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Servicios Administrativos';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Servicios Administrativos</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Servicio de Alimentación';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Servicio de Alimentación</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Servicio de Vigilancia';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Servicio de Vigilancia</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Servicios Técnicos Industriales';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Servicios Técnicos Industriales</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Seguros Generales';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Seguros Generales</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Suministros Básicos';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Suministros Básicos</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }

                    $op = 'Sistemas TI y Software';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Sistemas TI y Software</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Transporte Combustibles';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Transporte Combustibles</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Transporte del Personal';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Transporte del Personal</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
                        echo '</tr>';
                    }
                    $op = 'Vacaciones Personal';
                    foreach ($informe[$op] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Vacaciones Personal</td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=1&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[1]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=2&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[2]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=3&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[3]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=4&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[4]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=5&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[5]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=6&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[6]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=7&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[7]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=8&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[8]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=9&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[9]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=10&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[10]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=11&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[11]).'</a></td>';
                        echo '<td><a href="vistas/fi_inf_det_gasto.php?ano='.$ano.'&mes=12&gasto='.urlencode($op).'&op=adm" target="_blank">'.formateaNumeroMillones($row[12]).'</a></td>';
                        echo '<td>'.formateaNumeroMillones($row[13]).'</td>';
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

                    foreach ($informe['Correc. Monetaria'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Correc. Monetaria</td>';
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
                    foreach ($informe['Costo Venta Act. Fijo'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Costo Venta Act. Fijo</td>';
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
                    foreach ($informe['Gastos Bancarios'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Gastos Bancarios</td>';
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
                    foreach ($informe['Impuesto Renta'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Impuesto Renta</td>';
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
                    foreach ($informe['Otros Ingresos'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Otros Ingresos</td>';
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

                    foreach ($informe['Otros Ingresos / Egresos / Impto.'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Otros Ingresos / Egresos / Impto.</b></td>';
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