<?php
ini_set('memory_limit', '1024M');
require_once "librerias/PHPExcel/Classes/PHPExcel.php";
if(isset($_POST['btnCargar'])) {
    $fechaInforme = '';
//informeFull

    // **************** codigo de prueba ***********************

    if ($_FILES["informeFull"]["error"] > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa fa-warning"></i> Debe seleccionar un archivo formato Excel para realizar la carga
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
    } else {
        $target_dir = 'vistas/informehrs/';
        $target_file = $target_dir . basename($_FILES["informeFull"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["informeFull"]["tmp_name"], $target_file);

        $tmpfname = "vistas/informehrs/".basename($_FILES["informeFull"]["name"]);
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        $iniciaDato = 9;
        $listaAsistenciaEspecial = array();
        for ($i = $iniciaDato; $i <= $lastRow; $i++) {


            $fechaInforme = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCell('G' . $i)->getValue()));


            $a = array(
                'rut' => $worksheet->getCell('B' . $i)->getValue(),
                'nombre' => $worksheet->getCell('C' . $i)->getValue(),
                'empresa' => $worksheet->getCell('D' . $i)->getValue(),
                'cco' => $worksheet->getCell('E' . $i)->getValue(),
                'fecha' => $fechaInforme,
                'semana' => date('W',strtotime($fechaInforme)),
                'turno' => $worksheet->getCell('H' . $i)->getValue(),

                'entrada' => (string)(is_null($worksheet->getCell('M' . $i)->getFormattedValue())) ? 0 : (string)$worksheet->getCell('M' . $i)->getFormattedValue(),
                'salida' => (string)(is_null($worksheet->getCell('N' . $i)->getFormattedValue())) ? 0 : (string)$worksheet->getCell('N' . $i)->getFormattedValue(),
                'atraso' => (is_null($worksheet->getCell('R' . $i)->getValue())) ? 0 : $worksheet->getCell('R' . $i)->getValue(),
                'jornada' => (is_null($worksheet->getCell('P' . $i)->getValue())) ? 0 : $worksheet->getCell('P' . $i)->getValue(),

                'he_entrada' => (is_null($worksheet->getCell('T' . $i)->getValue())) ? 0 : $worksheet->getCell('T' . $i)->getValue(),
                'he_salida' => (is_null($worksheet->getCell('W' . $i)->getValue())) ? 0 : $worksheet->getCell('W' . $i)->getValue(),
                'ausencia' => (is_null($worksheet->getCell('AC' . $i)->getValue())) ? 0 : $worksheet->getCell('AC' . $i)->getValue()

            );
            $listaAsistenciaEspecial[] = $a;
        }

    }



    // **************** FIn codigo de prueba ***********************










    if ($_FILES["miInforme"]["error"] > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa fa-warning"></i> Debe seleccionar un archivo formato Excel para realizar la carga
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
    } else {
        $target_dir = 'vistas/informehrs/';
        $target_file = $target_dir . basename($_FILES["miInforme"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["miInforme"]["tmp_name"], $target_file);

        $tmpfname = "vistas/informehrs/".basename($_FILES["miInforme"]["name"]);
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        $iniciaDato = 6;
        $listaAsistencia = array();

        for ($i = $iniciaDato; $i <= $lastRow; $i++) {


            $fechaInforme = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCell('F' . $i)->getValue()));


            $a = array(
                'ano' => (int)date('Y',strtotime($fechaInforme)),
                'mes' => (int)date('n',strtotime($fechaInforme)),
                'semana' => (int)date('W',strtotime($fechaInforme)),
                'nombre' => $worksheet->getCell('B' . $i)->getValue(),
                'empresa' => $worksheet->getCell('D' . $i)->getValue(),
                'cco' => $worksheet->getCell('E' . $i)->getValue(),
                'rut' => $worksheet->getCell('A' . $i)->getValue(),

                'trabajados' => (is_null($worksheet->getCell('H' . $i)->getValue())) ? 0 : $worksheet->getCell('H' . $i)->getValue(),
                'inasistencia' => (is_null($worksheet->getCell('I' . $i)->getValue())) ? 0 : $worksheet->getCell('I' . $i)->getValue(),
                'licencia' => (is_null($worksheet->getCell('J' . $i)->getValue())) ? 0 : $worksheet->getCell('J' . $i)->getValue(),
                'vacaciones' => (is_null($worksheet->getCell('K' . $i)->getValue())) ? 0 : $worksheet->getCell('K' . $i)->getValue(),

                'hrs_trabajadas' => (is_null($worksheet->getCell('P' . $i)->getFormattedValue())) ? 0 : $worksheet->getCell('P' . $i)->getFormattedValue(),
                'hhee_50' => (is_null($worksheet->getCell('S' . $i)->getFormattedValue())) ? 0 : $worksheet->getCell('Y' . $i)->getFormattedValue(),
                'hhee_100' => (is_null($worksheet->getCell('AE' . $i)->getFormattedValue())) ? 0 : $worksheet->getCell('Z' . $i)->getFormattedValue(),
                'atrasos' => (is_null($worksheet->getCell('T' . $i)->getFormattedValue())) ? 0 : $worksheet->getCell('M' . $i)->getFormattedValue(),

            );
            $listaAsistencia[] = $a;
        }

    }

    // Carga Excel detalle (opcional)
/*
    if ($_FILES["miInforme2"]["error"] > 0) {

    } else {
        $target_dir = 'vistas/informehrs/';
        $target_file = $target_dir . basename($_FILES["miInforme2"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["miInforme2"]["tmp_name"], $target_file);

        $tmpfname = "vistas/informehrs/".basename($_FILES["miInforme2"]["name"]);
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        $iniciaDato = 6;
        $listaAsistenciaFull = array();

        for ($i = $iniciaDato; $i <= $lastRow; $i++) {


            $fechaInforme = date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCell('G' . $i)->getValue()));


            $a = array(
                'nro' => $worksheet->getCell('A' . $i)->getValue(),
                'rut' => $worksheet->getCell('B' . $i)->getValue(),
                'nombre' => $worksheet->getCell('C' . $i)->getValue(),
                'cco' => $worksheet->getCell('D' . $i)->getValue(),
                'depto' => $worksheet->getCell('E' . $i)->getValue(),
                'fecha' => date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCell('G' . $i)->getValue())),
                'tipo' => $worksheet->getCell('H' . $i)->getValue(),

            );
            $listaAsistenciaFull[] = $a;
        }

    }
*/


    // valida que la semana a cargar no exista
    $listaSemana = AsistenciaControlador::ctrVeSemanas();
    $flag = true;

    foreach ($listaSemana as $row)
    {
        if(date('W',strtotime($fechaInforme)) == $row['semana'])
        {
            $flag = false;
        }
    }


    if ($flag)
    {
        if (!is_null($listaAsistencia))
        {
            $res = new AsistenciaControlador();
            $res->ctrInsertarAsistencia($listaAsistencia);
        }

        /*
            $resif (!is_null($listaAsistenciaFull))
        { = new AsistenciaControlador();
            $res->ctrInsertarAsistenciaDetalle($listaAsistenciaFull);

        }*/


    }else
    {
        if($_FILES["miInforme"]["error"] < 0)
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <i class="fa fa-warning"></i> Ya existe un informe cargado para la semana '.date('W',strtotime($fechaInforme)).' del año '.date('Y',strtotime($fechaInforme)).'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;

    }





}

// Prepara las listas para los dropdown de Centro de costo y semanas

$listaCCO = AsistenciaControlador::ctrVerCCO();
$listaSemana = AsistenciaControlador::ctrVeSemanas();



if (isset($_POST['btnFiltrar']))
{


    $op = $_POST['idCCO'];
    $fecha =explode('|', $_POST['idSemana']);
    $lista = AsistenciaControlador::ctrVerAsistencia($op,$fecha);

    /*
    $op = $_POST['idCCO'];
    $fecha =explode('|', $_POST['idSemana']);
    $lista = AsistenciaControlador::ctrVerAsistenciaCompleta($op,$fecha);
    */



}


//var_dump($lista);

//var_dump($listaAsistencia);

?>
<style>
    .table td {
        text-align: center;
    }

    .table tr {
        text-align: center;
    }

    .bold-blue {
        font-weight: bold;
        color: #0277BD;
    }

    .container {
        max-width: 1400px;
    }
</style>

    <!-- Aviso Origen del Dato-->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="fa fa-info"></i> Datos obtenidos desde IKA Dashboards (Dato Manual cargado desde relojcontrol.com)
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- Aviso Origen del Dato-->

<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Reporte Semanal de Asistencia</h3></center>





            <br>
            <hr>
            <!-- Filtro -->
            <form method="post">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Centro de Costo</label>
                        <select name="idCCO" id="idCCO" class="form-control">
                            <option value="-1">Escoja un CCO</option>
                            <?php
                            foreach ($listaCCO as $row)
                            {
                                if (isset($_POST['idCCO']) && $_POST['idCCO'] == $row['cco']) {
                                    echo '<option selected="selected" value="' . $row['cco'] . '">' . $row['cco'] . '</option>';
                                }else
                                {
                                    echo '<option value="' . $row['cco'] . '">' . $row['cco'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <br>
                        <button type="submit" name="btnFiltrar" id="btnFiltrar" class="btn btn-primary">Mostrar</button>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Semana</label>
                        <select name="idSemana" id="idSemana" class="form-control">
                            <option value="-1">Seleccione semana</option>
                            <?php
                            $inicioSemana = '';
                            $finSemana = '';

                            foreach ($listaSemana as $row)
                            {
                                $mes = (strlen($row['semana'])==1 ? '0'.$row['semana'] : $row['semana']);
                                $inicioSemana = date('d-m-Y',strtotime($row['ano'].'W'.$mes));
                                $finSemana = date('d-m-Y',strtotime($inicioSemana. ' +7 days'));

                                if (isset($_POST['idSemana']) && $_POST['idSemana'] == $row['semana']) {
                                   echo '<option selected="selected" value="'.$row['ano'].'|'.$row['semana'].'">' . $row['semana'].' ('.$inicioSemana.' al '.$finSemana. ') </option>';
                                }else
                                {
                                    echo '<option value="'.$row['ano'].'|'.$row['semana'].'">' . $row['semana'].' ('.$inicioSemana.' al '.$finSemana. ') </option>';

                                }
                            }
                            ?>
                        </select>
                        <br>
                    </div>
                </div>

            </div>
            </form>



            <hr>
            <br>
            <center><?php
                if (isset($_POST['btnFiltrar']))
                {
                    $fecha =explode('|', $_POST['idSemana']);
                    $semana = semanaAFechas($fecha[1],$fecha[0]);


                    $inicioSemana = date('d-m-Y',strtotime($fecha[0].'W'.$fecha[1]));
                    $finSemana = date('d-m-Y',strtotime($inicioSemana. ' +7 days'));

                    echo '<h4><b>Mostrando semana '.$fecha[1].'</b><br> ('.date('d-m-Y',strtotime($semana['week_start'])).' al '.date('d-m-Y',strtotime($semana['week_end'])).')</h4>';
                }
                ?></center>
            <br>
            <table class="table table-sm table-bordered">
                <thead>
                <tr class="table-active">
                    <th scope="col">Periodo</th>
                    <th scope="col">Mes</th>
                    <th scope="col">Semana</th>
                    <th scope="col">Nombre Apellido</th>
                    <th scope="col">CCO</th>
                    <th scope="col">Asist.</th>
                    <th scope="col">Inasist.</th>
                    <th scope="col">Lic. Med</th>
                    <th scope="col">Vacaciones</th>
                    <th scope="col">HH Trab.</th>
                    <th scope="col">HHEE 50</th>
                    <th scope="col">HHEE 100</th>
                    <th scope="col">HH. Falta</th>
                    <th scope="col"></th>




                </tr>
                </thead>
                <tbody>
                <?php
                if (is_null($lista))
                {
                    echo '<tr>';
                    echo '<td colspan="14">Seleccione un filtro para mostrar información</td>';
                    echo '</tr>';


                }else {


                    foreach ($lista as $row) {
                        echo '<tr >';
                        echo '<td>' . $row['ano'] . '</td>';
                        echo '<td>' . $row['mes'] . '</td>';
                        echo '<td>' . $row['semana'] . '</td>';
                        echo '<td>' . $row['nombre'] . '</td>';
                        echo '<td>' . $row['cco'] . '</td>';
                        echo '<td>' . $row['trabajados'] . '</td>';
                        echo '<td>' . $row['inasistencia'] . '</td>';
                        echo '<td>' . $row['licencia'] . '</td>';
                        echo '<td>' . $row['vacaciones'] . '</td>';

                        echo '<td>' . $row['hrs_trabajadas'] . '</td>';
                        /*
                        if ($row['hrs_trabajadas']>45 && '08:00 - 18:00 of')
                        {
                            echo '<td class="table-danger">' . $row['hrs_trabajadas'] . '</td>';
                        }
                        else
                        {
                            echo '<td>' . $row['hrs_trabajadas'] . '</td>';
                        }
*/
                        echo '<td>' . $row['hhee_50'] . '</td>';
                        echo '<td>' . $row['hhee_100'] . '</td>';
                        echo '<td>' . $row['atrasos'] . '</td>';
                        echo '<td><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal_' . $row['id_fila'] . '">
<i class="fa fa-eye"></i></button></td>';
                        echo '</tr>';

                    }
                }
                ?>


                </tbody>
            </table>


        </div>
    </div>
</div>



<!-- Modal -->



<?php

// Funsion sin uso (suma horas)
/*
function sumaHoras($listaHoras) {

    $sum = strtotime('00:00');
    $totaltime = 0;
    foreach( $listaHoras as $element ) {

        // Converting the time into seconds
        $timeinsec = strtotime($element) - $sum;

        // Sum the time with previous value
        $totaltime = $totaltime + $timeinsec;
    }

// Totaltime is the summation of all
// time in seconds

// Hours is obtained by dividing
// totaltime with 3600
    $h = intval($totaltime / 3600);
    $totaltime = $totaltime - ($h * 3600);
// Minutes is obtained by dividing
// remaining total time with 60
    $m = intval($totaltime / 60);

// Remaining value is seconds
    //$s = $totaltime - ($m * 60);

    return $h.':'.$m;
}
*/

foreach ($lista as $row)
{
    $inicioSemana = date('d-m-Y',strtotime($row['ano'].'W'.$row['semana']));
    $finSemana = date('d-m-Y',strtotime($inicioSemana. ' +7 days'));

    echo '<div class="modal fade bd-example-modal-lg" id="modal_'.$row['id_fila'].'" name="modal_'.$row['id_fila'].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle semana <br>'.$row['nombre'].'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-sm">
  <thead>
    <tr>
    <th scope="col">Turno</th>
      <th scope="col">Fecha</th>
      <th scope="col">Entrada</th>
      <th scope="col">Salida</th>
    </tr>
  </thead>
  <tbody>';
        $semanaTrabajador = AsistenciaControlador::ctrVerAsistSemana($row['semana'],$row['rut']);

        foreach ($semanaTrabajador as $row)
        {

            echo '<tr>';
            echo '<td>'.$row['turno'].'</td>';
            echo '<td>'.date('d-m-Y',strtotime($row['fecha'])).'</td>';
            echo '<td>'.$row['entrada'].'</td>';
            echo '<td>'.$row['salida'].'</td>';
            echo '</tr>';
        }

    echo '
  </tbody>
</table>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>';

}
?>