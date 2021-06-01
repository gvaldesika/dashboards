<?php

ini_set('memory_limit', '1024M');
require_once "librerias/PHPExcel/Classes/PHPExcel.php";
if(isset($_POST['btnCargar'])) {

    $fechaInforme = '';

    if ($_FILES["miInforme"]["error"] > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa fa-warning"></i> Debe seleccionar un archivo formato Excel para realizar la carga
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else {
        $target_dir = 'vistas/informehrs/';
        $target_file = $target_dir . basename($_FILES["miInforme"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["miInforme"]["tmp_name"], $target_file);

        $tmpfname = "vistas/informehrs/" . basename($_FILES["miInforme"]["name"]);
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        $iniciaDato = 6;
        $listaAsistencia = array();

        for ($i = $iniciaDato; $i <= $lastRow; $i++) {


            $fechaInforme = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCell('F' . $i)->getValue()));


            $a = array(
                'ano' => (int)date('Y', strtotime($fechaInforme)),
                'mes' => (int)date('n', strtotime($fechaInforme)),
                'semana' => (int)date('W', strtotime($fechaInforme)),
                'nombre' => $worksheet->getCell('B' . $i)->getValue(),
                'empresa' => $worksheet->getCell('D' . $i)->getValue(),
                'cco' => $worksheet->getCell('E' . $i)->getValue(),
                'rut' => $worksheet->getCell('A' . $i)->getValue(),

                'trabajados' => (is_null($worksheet->getCell('H' . $i)->getValue())) ? 0 : $worksheet->getCell('H' . $i)->getValue(),
                'inasistencia' => (is_null($worksheet->getCell('I' . $i)->getValue())) ? 0 : $worksheet->getCell('I' . $i)->getValue(),
                'licencia' => (is_null($worksheet->getCell('J' . $i)->getValue())) ? 0 : $worksheet->getCell('J' . $i)->getValue(),
                'vacaciones' => (is_null($worksheet->getCell('K' . $i)->getValue())) ? 0 : $worksheet->getCell('K' . $i)->getValue(),

                'hrs_trabajadas' => (is_null($worksheet->getCell('P' . $i)->getFormattedValue())) ? 0 : $worksheet->getCell('P' . $i)->getFormattedValue(),
                'hhee_50' => (is_null($worksheet->getCell('S' . $i)->getFormattedValue())) ? 0 : $worksheet->getCell('S' . $i)->getFormattedValue(),
                'hhee_100' => (is_null($worksheet->getCell('AA' . $i)->getFormattedValue())) ? 0 : $worksheet->getCell('AA' . $i)->getFormattedValue(),
                'atrasos' => (is_null($worksheet->getCell('T' . $i)->getFormattedValue())) ? 0 : $worksheet->getCell('T' . $i)->getFormattedValue(),

            );
            $listaAsistencia[] = $a;
        }

        // Valida que no este cargada la semana a ingresar
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

}









// **** Carga informe Opcional ****

if(isset($_POST['btnCargarFull']))
{
    if ($_FILES["informeFull"]["error"] > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa fa-warning"></i> Debe seleccionar un archivo formato Excel para realizar la carga
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else {
        $target_dir = 'vistas/informehrs/';
        $target_file = $target_dir . basename($_FILES["informeFull"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["informeFull"]["tmp_name"], $target_file);

        $tmpfname = "vistas/informehrs/" . basename($_FILES["informeFull"]["name"]);
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        $iniciaDato = 9;
        $listaAsistenciaEspecial = array();
        for ($i = $iniciaDato; $i <= $lastRow; $i++) {


            $fechaInforme = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($worksheet->getCell('G' . $i)->getValue()));
            $horas = [(is_null($worksheet->getCell('T' . $i)->getValue())) ? '00:00' : $worksheet->getCell('T' . $i)->getValue(),
                (is_null($worksheet->getCell('W' . $i)->getValue())) ? '00:00' : $worksheet->getCell('W' . $i)->getValue()];


            $a = array(
                'rut' => $worksheet->getCell('B' . $i)->getValue(),
                'nombre' => $worksheet->getCell('C' . $i)->getValue(),
                'empresa' => $worksheet->getCell('D' . $i)->getValue(),
                'cco' => $worksheet->getCell('E' . $i)->getValue(),
                'fecha' => $fechaInforme,
                'semana' => date('W', strtotime($fechaInforme)),
                'turno' => $worksheet->getCell('H' . $i)->getValue(),

                'entrada' => (string)(is_null($worksheet->getCell('M' . $i)->getFormattedValue())) ? 0 : (string)$worksheet->getCell('M' . $i)->getFormattedValue(),
                'salida' => (string)(is_null($worksheet->getCell('N' . $i)->getFormattedValue())) ? 0 : (string)$worksheet->getCell('N' . $i)->getFormattedValue(),
                'atraso' => (is_null($worksheet->getCell('R' . $i)->getValue())) ? 0 : $worksheet->getCell('R' . $i)->getValue(),
                'jornada' => (is_null($worksheet->getCell('S' . $i)->getValue())) ? 0 : $worksheet->getCell('S' . $i)->getValue(),
                'he_entrada' => (is_null($worksheet->getCell('T' . $i)->getValue())) ? 0 : $worksheet->getCell('T' . $i)->getValue(),
                'he_salida' => (is_null($worksheet->getCell('W' . $i)->getValue())) ? 0 : $worksheet->getCell('W' . $i)->getValue(),
                'he_total' => sumaHoras($horas),
                'ausencia' => (is_null($worksheet->getCell('AC' . $i)->getValue())) ? 0 : $worksheet->getCell('AC' . $i)->getValue()

            );
            $listaAsistenciaEspecial[] = $a;
        }

        // Valida que no este cargada la semana a ingresar
        $listaSemana = AsistenciaControlador::ctrVeSemanasDet();

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
            if (!is_null($listaAsistenciaEspecial))
            {
                $res = new AsistenciaControlador();
                $res->ctrInsertarAsistenciaDetalle($listaAsistenciaEspecial);

                echo '<script>
                        window.location = "main.php?pag=rrhh_form_hrsextra";
                    </script>';


            }

        }else
        {
            if($_FILES["informeFull"]["error"] < 0)
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <i class="fa fa-warning"></i> Ya existe un informe cargado para la semana '.date('W',strtotime($fechaInforme)).' del año '.date('Y',strtotime($fechaInforme)).'
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>' ;
        }

    }
}



?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Carga Semanal de Asistencia</h3></center><br>
            <hr>
            Este menú permite cargar manualmente los informes generados de relojcontrol.com, que sirve como base para generar el "Reporte Semanal de Asistencia"<br>
            Los Informes de origen a cargar son:<br>
            <br>


                <i class="fa fa-arrow-right"></i> Reporte general de asistencia (Obligatorio) - <a href="vistas/ejemplos/rrhh_hrsextra/sample_obligatorio.xls">Ver Ejemplo acá</a> <br>
            <i class="fa fa-arrow-right"></i> Registro de Asistencia (Opcional*) – <a href="vistas/ejemplos/rrhh_hrsextra/sample_opcional.xls">Ver Ejemplo acá</a>
            <br><br>


            <p>*El informe solo permite ver el detalle de la semana</p><br>

<hr>
            <div class="row">
                <div class="col-5">
                    <b>Carga Reporte general de asistencia (Obligatorio):<br></b>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <input type="file" id="miInforme" name="miInforme" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"><br><br>
                    </div>
                    <div class="col-4">
                        <button type="submit" name="btnCargar" id="btnCargar" class="btn btn-primary"><i class="fa fa-upload"></i> Cargar</button>
                    </div>
                </div>
            </form>
            <br>
            <hr>
            <br>
            <div class="row">
                <div class="col-5">
                    <b>Registro de Asistencia (Opcional*)<br></b>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                        <input type="file" id="informeFull" name="informeFull" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"><br>
                    </div>
                    <div class="col-4">
                        <button type="submit" name="btnCargarFull" id="btnCargarFull" class="btn btn-primary"><i class="fa fa-upload"></i> Cargar</button>
                    </div>
                </div>
            </form>






            <!--Registro de Asistencia (Opcional):<br>
            <input type="file" id="miInforme2" name="miInforme2" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"><br>
-->

            <br><br>



        </div>
    </div>
</div>

