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
        $dolar = AuxiliaresControlador::ctrObtenerValorDolar($ano);

        //$listaCentroCostos = ParametrosApp::obtenerCCOUnMineria();
        $listaEmpresasEugcom = ['0000100003','0000100006','0000100001','0000100013'];
        $informe = FinancieroControlador::ctrVerMaquinariaUSD($ano,[50],$listaEmpresasEugcom,$dolar);

    }

}else
{
    $muestraTabla = 'display:none';
}

// Guarda el informe en una vairable de sesion para poder exportarla a Excel
$a = array(
    'nom_informe' => 'resultado_maquinaria_usd',
    'cco' => '50',
    'nom_cco' =>'MAQUINARIA $USD',
    'periodo' => $ano,
    'informe' => $informe

);
$_SESSION['informe'] = $a;


?>
<style>
    .table td {
        text-align: center;
    }
</style>
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
                <center><h3>Resultado Maquinaria ($USD)</h3></center><br>

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
                <br>
                <div style="<?php echo $muestraTabla; ?>">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col" rowspan="2" style="width: 32%">Valor $USD</th>
                            <th scope="col" style="width: 5%">Ene</th>
                            <th scope="col" style="width: 5%">Feb</th>
                            <th scope="col" style="width: 5%">Mar</th>
                            <th scope="col" style="width: 5%">Abr</th>
                            <th scope="col" style="width: 5%">May</th>
                            <th scope="col" style="width: 5%">Jun</th>
                            <th scope="col" style="width: 5%">Jul</th>
                            <th scope="col" style="width: 5%">Ago</th>
                            <th scope="col" style="width: 5%">Sep</th>
                            <th scope="col" style="width: 5%">Oct</th>
                            <th scope="col" style="width: 5%">Nov</th>
                            <th scope="col" style="width: 5%">Dic</th>
                            <th scope="col" style="width: 10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        echo '<tr class="table-secondary">';
                        echo '<td></td>';
                        echo '<td>'.$dolar['enero'].'</td>';
                        echo '<td>'.$dolar['febrero'].'</td>';
                        echo '<td>'.$dolar['marzo'].'</td>';
                        echo '<td>'.$dolar['abril'].'</td>';
                        echo '<td>'.$dolar['mayo'].'</td>';
                        echo '<td>'.$dolar['junio'].'</td>';
                        echo '<td>'.$dolar['julio'].'</td>';
                        echo '<td>'.$dolar['agosto'].'</td>';
                        echo '<td>'.$dolar['septiembre'].'</td>';
                        echo '<td>'.$dolar['octubre'].'</td>';
                        echo '<td>'.$dolar['noviembre'].'</td>';
                        echo '<td>'.$dolar['diciembre'].'</td>';
                        echo '<td></td>';
                        echo '</tr>';


                        ?>
                        </tbody>
                    </table>
                <br>
                <table class="table table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="14" class="text-center">Resultado Maquinaria $USD (CCO 50) - <?php echo 'Periodo: '.$ano ?></th>

                    </tr>
                    <tr class="text-center">
                        <th scope="col">Estado Resultado (Miles de $USD)</th>
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
                    //var_dump($informe['Ingresos de Explotación']);


                    foreach ($informe['Ingresos de Posicionamiento'] as $row) {

                        echo '<tr>';
                        echo '<td><b>Ingresos de Posicionamiento</b></td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Ingresos de Operación'] as $row) {
                        echo '<tr>';
                        echo '<td><b>Ingresos de Operación</b></td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Descuento Disponibilidad'] as $row) {
                        echo '<tr>';
                        echo '<td><b>Descuento Disponibilidad</b></td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Ingresos de Explotación'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Ingresos de Explotación</b></td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }




                    foreach ($informe['Arriendo Maquinarias'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Arriendo Maquinarias</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Arriendo Maquinarias Propias'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Arriendo Maquinarias Propias</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Arriendo Vehiculos'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Arriendo Vehiculos</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Alojamiento y Pensión'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Alojamiento y Pensión</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Combustible'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Combustible</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Comunicaciones'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Comunicaciones</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Contratista'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Contratista</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }




                    foreach ($informe['Depreciacion Activo'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Depreciacion Activo</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Depreciacion Activos Leasing'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Depreciacion Activos Leasing</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Flete Maquinarias'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Flete Maquinarias</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Gastos de Viaje y Representación'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Gastos de Viaje y Representación</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Gastos Financieros'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Gastos Financieros</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Gastos Generales'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Gastos Generales</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Mantención Equipos Móviles'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Mantención Equipos Móviles</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Mat. E Insumos Varios'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Mat. E Insumos Varios</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Multas, Infracciones y Mermas'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Multas, Infracciones y Mermas</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Neumáticos'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Neumáticos</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Otros Ingresos'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Otros Ingresos</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Permisos de Circulación'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Permisos de Circulación</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Remuneraciones y Gastos del Personal'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Remuneraciones y Gastos del Personal</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Reparación Equipos Móviles'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Reparación Equipos Móviles</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Seguros Generales'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Seguros Generales</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }


                    foreach ($informe['Servicio Mant. Full Service'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Servicio Mant. Full Service</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Servicios Técnicos Industriales'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Servicios Técnicos Industriales</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Transporte Combustibles'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Transporte Combustibles</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }
                    foreach ($informe['Transporte del Personal'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Transporte del Personal</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }




                    foreach ($informe['Vacaciones Personal'] as $row)
                    {
                        echo '<tr>';
                        echo '<td>Vacaciones Personal</td>';
                        echo '<td>'.formateaDolares($row[1]).'</td>';
                        echo '<td>'.formateaDolares($row[2]).'</td>';
                        echo '<td>'.formateaDolares($row[3]).'</td>';
                        echo '<td>'.formateaDolares($row[4]).'</td>';
                        echo '<td>'.formateaDolares($row[5]).'</td>';
                        echo '<td>'.formateaDolares($row[6]).'</td>';
                        echo '<td>'.formateaDolares($row[7]).'</td>';
                        echo '<td>'.formateaDolares($row[8]).'</td>';
                        echo '<td>'.formateaDolares($row[9]).'</td>';
                        echo '<td>'.formateaDolares($row[10]).'</td>';
                        echo '<td>'.formateaDolares($row[11]).'</td>';
                        echo '<td>'.formateaDolares($row[12]).'</td>';
                        echo '<td>'.formateaDolares($row[13]).'</td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Total Costo Directo'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Total Costo Directo</b></td>';
                        echo '<td><b>'.formateaDolares($row[1]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[2]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[3]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[4]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[5]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[6]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[7]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[8]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[9]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[10]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[11]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[12]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[13]).'</b></td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Costo Mantención'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Costo Mantención</b></td>';
                        echo '<td><b>'.formateaDolares($row[1]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[2]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[3]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[4]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[5]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[6]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[7]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[8]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[9]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[10]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[11]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[12]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[13]).'</b></td>';
                        echo '</tr>';
                    }

                    foreach ($informe['Margen de Contribución'] as $row)
                    {
                        echo '<tr class="table-active">';
                        echo '<td><b>Margen de Contribución</b></td>';
                        echo '<td><b>'.formateaDolares($row[1]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[2]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[3]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[4]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[5]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[6]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[7]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[8]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[9]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[10]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[11]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[12]).'</b></td>';
                        echo '<td><b>'.formateaDolares($row[13]).'</b></td>';
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