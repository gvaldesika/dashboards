<?php
ini_set('memory_limit', '1024M');
require_once "librerias/PHPExcel/Classes/PHPExcel.php";
//$lista = ComprobantesControlador::ctrObtenerIngresosAnuales(2020);
//$budgetBase = ComprobantesControlador::ctrObtenerPresupuestoTabla(2020,'Base');

if(isset($_POST['btnCargaPresup'])) {
    if ($_FILES["myFile"]["error"] > 0) {
        echo "Error: " . $_FILES["myFile"]["error"] . "<br />";
    } else {
        $target_dir = 'vistas/presupuestos/';
        $target_file = $target_dir . basename($_FILES["myFile"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file);

        $tmpfname = "vistas/presupuestos/sample_presup.xlsx";
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        $iniciaDato = 5;
        $presupuesto = array();
        $periodos = array();


        for ($i = $iniciaDato; $i <= $lastRow; $i++) {
            $a = array(
                'periodo' => $worksheet->getCell('A' . $i)->getValue(),
                'CCO' => $worksheet->getCell('B' . $i)->getValue(),
                'nombreCCO' => AuxiliaresControlador::mdlCCOaNombre($worksheet->getCell('B' . $i)->getValue())['nombre_cco'],
                'empresa' => $worksheet->getCell('C' . $i)->getValue(),
                'tipo' => $worksheet->getCell('D' . $i)->getValue(),
                'Enero' => (is_null($worksheet->getCell('E' . $i)->getValue())) ? 0 : $worksheet->getCell('E' . $i)->getValue(),
                'Febrero' => (is_null($worksheet->getCell('F' . $i)->getValue())) ? 0 : $worksheet->getCell('F' . $i)->getValue(),
                'Marzo' => (is_null($worksheet->getCell('G' . $i)->getValue())) ? 0 : $worksheet->getCell('G' . $i)->getValue(),
                'Abril' => (is_null($worksheet->getCell('H' . $i)->getValue())) ? 0 : $worksheet->getCell('H' . $i)->getValue(),
                'Mayo' => (is_null($worksheet->getCell('I' . $i)->getValue())) ? 0 : $worksheet->getCell('I' . $i)->getValue(),
                'Junio' => (is_null($worksheet->getCell('J' . $i)->getValue())) ? 0 : $worksheet->getCell('J' . $i)->getValue(),
                'Julio' => (is_null($worksheet->getCell('K' . $i)->getValue())) ? 0 : $worksheet->getCell('K' . $i)->getValue(),
                'Agosto' => (is_null($worksheet->getCell('L' . $i)->getValue())) ? 0 : $worksheet->getCell('L' . $i)->getValue(),
                'Septiembre' => (is_null($worksheet->getCell('M' . $i)->getValue())) ? 0 : $worksheet->getCell('M' . $i)->getValue(),
                'Octubre' => (is_null($worksheet->getCell('N' . $i)->getValue())) ? 0 : $worksheet->getCell('N' . $i)->getValue(),
                'Noviembre' => (is_null($worksheet->getCell('O' . $i)->getValue())) ? 0 : $worksheet->getCell('O' . $i)->getValue(),
                'Diciembre' => (is_null($worksheet->getCell('P' . $i)->getValue())) ? 0 : $worksheet->getCell('P' . $i)->getValue()
            );
            $presupuesto[] = $a;
            $periodos[] = $worksheet->getCell('A' . $i)->getValue();
        }
        var_dump($periodos);

        //$resu = PresupuestoModelo::mdlEliminaPresupuesto()

        foreach ($presupuesto as $row) {
            $res = PresupuestoControlador::ctrInsertarPresupuestos($row);
        }


    }
}


if (isset($_POST['btnVerPresup']))
{
    $presup = PresupuestoControlador::ctrVerPresupuesto($_POST['dropPeriodo'],'Base');
}else
{
    $presup = PresupuestoControlador::ctrVerPresupuesto(date('Y'),'Base');
}



?>
<style xmlns="http://www.w3.org/1999/html">
    .table td {
        text-align: center;
    }
</style>


    <div class="card">
        <div class="card-body">


            <div class="row">
                <div class="col-lg-12">
                    <h3>Ingreso Budget Base</h3>
                    <br><br>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cargaBase"> <li class="fa fa-upload"></li> Cargar Budget Base</button>
                    <button type="button" class="btn btn-success"> <li class="fa fa-download"></li> Descargar Budget Base</button>

                    <input type="button" class="btn btn-info" value="Descargar Plantilla" onclick="relocate_home()">
                <br><br>

                    <form method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            Seleccione Periodo: <select name="dropPeriodo" id="dropPeriodo" class="form-control">
                                <option value="2020">2020</option>
                                <option value="2021" selected="selected">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                        <div class="col-lg-2"><br>
                            <button type="submit" name="btnVerPresup" id="btnVerPresup" class="btn btn-secondary">Ver</button>
                        </div>
                    </div>
                    </form><br><br>


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td colspan="17" class="bg-success"><b>Unidad IKA Industrial</b></td>
                        </tr>
                        <tr class="table-secondary">
                            <td scope="col">Periodo</td>
                            <td scope="col">Nro. CCO</td>
                            <td scope="col">Nom. CCO</td>
                            <td scope="col">Tipo Presupuesto</td>
                            <td scope="col">Ene</td>
                            <td scope="col">Feb</td>
                            <td scope="col">Mar</td>
                            <td scope="col">Abr</td>
                            <td scope="col">May</td>
                            <td scope="col">Jun</td>
                            <td scope="col">Jul</td>
                            <td scope="col">Ago</td>
                            <td scope="col">Sep</td>
                            <td scope="col">Oct</td>
                            <td scope="col">Nov</td>
                            <td scope="col">Dic</td>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if(count($presup)==0)
                        {
                            echo '<tr>';
                            echo '<td colspan="14"> No hay presupuesto cargado para el periodo</td>';
                            echo '</tr>';

                        }else
                        {
                        foreach ($presup as $row)
                        {
                            if($row['Empresa'] == 'IKA Industrial')
                            {
                                echo '<tr>';
                                echo '<td>'.$row['Periodo'].'</td>';
                                echo '<td>'.$row['CCO'].'</td>';
                                echo '<td>'.$row['Nombre_CCO'].'</td>';
                                echo '<td>'.$row['Tipo'].'</td>';
                                echo '<td>'.formateaNumero($row['Enero']).'</td>';
                                echo '<td>'.formateaNumero($row['Febrero']).'</td>';
                                echo '<td>'.formateaNumero($row['Marzo']).'</td>';
                                echo '<td>'.formateaNumero($row['Abril']).'</td>';
                                echo '<td>'.formateaNumero($row['Mayo']).'</td>';
                                echo '<td>'.formateaNumero($row['Junio']).'</td>';
                                echo '<td>'.formateaNumero($row['Julio']).'</td>';
                                echo '<td>'.formateaNumero($row['Agosto']).'</td>';
                                echo '<td>'.formateaNumero($row['Septiembre']).'</td>';
                                echo '<td>'.formateaNumero($row['Octubre']).'</td>';
                                echo '<td>'.formateaNumero($row['Noviembre']).'</td>';
                                echo '<td>'.formateaNumero($row['Diciembre']).'</td>';
                                echo '</tr>';
                            }

                        }



                        }
                        ?>



                        </tbody>
                    </table>
<br><br>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td colspan="17" class="bg-primary"><b>Unidad IKA Mineria</b></td>
                        </tr>
                        <tr class="table-secondary">
                            <td scope="col">Periodo</td>
                            <td scope="col">Nro. CCO</td>
                            <td scope="col">Nom. CCO</td>
                            <td scope="col">Tipo Presupuesto</td>
                            <td scope="col">Ene</td>
                            <td scope="col">Feb</td>
                            <td scope="col">Mar</td>
                            <td scope="col">Abr</td>
                            <td scope="col">May</td>
                            <td scope="col">Jun</td>
                            <td scope="col">Jul</td>
                            <td scope="col">Ago</td>
                            <td scope="col">Sep</td>
                            <td scope="col">Oct</td>
                            <td scope="col">Nov</td>
                            <td scope="col">Dic</td>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if(count($presup)==0)
                        {
                            echo '<tr>';
                            echo '<td colspan="14"> No hay presupuesto cargado para el periodo</td>';
                            echo '</tr>';

                        }else
                        {
                            foreach ($presup as $row)
                            {
                                if($row['Empresa'] == 'IKA Mineria')
                                {
                                    echo '<tr>';
                                    echo '<td>'.$row['Periodo'].'</td>';
                                    echo '<td>'.$row['CCO'].'</td>';
                                    echo '<td>'.$row['Nombre_CCO'].'</td>';
                                    echo '<td>'.$row['Tipo'].'</td>';
                                    echo '<td>'.formateaNumero($row['Enero']).'</td>';
                                    echo '<td>'.formateaNumero($row['Febrero']).'</td>';
                                    echo '<td>'.formateaNumero($row['Marzo']).'</td>';
                                    echo '<td>'.formateaNumero($row['Abril']).'</td>';
                                    echo '<td>'.formateaNumero($row['Mayo']).'</td>';
                                    echo '<td>'.formateaNumero($row['Junio']).'</td>';
                                    echo '<td>'.formateaNumero($row['Julio']).'</td>';
                                    echo '<td>'.formateaNumero($row['Agosto']).'</td>';
                                    echo '<td>'.formateaNumero($row['Septiembre']).'</td>';
                                    echo '<td>'.formateaNumero($row['Octubre']).'</td>';
                                    echo '<td>'.formateaNumero($row['Noviembre']).'</td>';
                                    echo '<td>'.formateaNumero($row['Diciembre']).'</td>';
                                    echo '</tr>';
                                }
                            }
                        }
                        ?>

                        </tbody>
                    </table><br><br>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td colspan="17" class="bg-warning"><b>Unidad IKA Infraestructura</b></td>
                        </tr>
                        <tr class="table-secondary">
                            <td scope="col">Periodo</td>
                            <td scope="col">Nro. CCO</td>
                            <td scope="col">Nom. CCO</td>
                            <td scope="col">Tipo Presupuesto</td>
                            <td scope="col">Ene</td>
                            <td scope="col">Feb</td>
                            <td scope="col">Mar</td>
                            <td scope="col">Abr</td>
                            <td scope="col">May</td>
                            <td scope="col">Jun</td>
                            <td scope="col">Jul</td>
                            <td scope="col">Ago</td>
                            <td scope="col">Sep</td>
                            <td scope="col">Oct</td>
                            <td scope="col">Nov</td>
                            <td scope="col">Dic</td>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if(count($presup)==0)
                        {
                            echo '<tr>';
                            echo '<td colspan="14"> No hay presupuesto cargado para el periodo</td>';
                            echo '</tr>';

                        }else
                        {
                            foreach ($presup as $row)
                            {
                                if($row['Empresa'] == 'IKA Infraestructura')
                                {
                                    echo '<tr>';
                                    echo '<td>'.$row['Periodo'].'</td>';
                                    echo '<td>'.$row['CCO'].'</td>';
                                    echo '<td>'.$row['Nombre_CCO'].'</td>';
                                    echo '<td>'.$row['Tipo'].'</td>';
                                    echo '<td>'.formateaNumero($row['Enero']).'</td>';
                                    echo '<td>'.formateaNumero($row['Febrero']).'</td>';
                                    echo '<td>'.formateaNumero($row['Marzo']).'</td>';
                                    echo '<td>'.formateaNumero($row['Abril']).'</td>';
                                    echo '<td>'.formateaNumero($row['Mayo']).'</td>';
                                    echo '<td>'.formateaNumero($row['Junio']).'</td>';
                                    echo '<td>'.formateaNumero($row['Julio']).'</td>';
                                    echo '<td>'.formateaNumero($row['Agosto']).'</td>';
                                    echo '<td>'.formateaNumero($row['Septiembre']).'</td>';
                                    echo '<td>'.formateaNumero($row['Octubre']).'</td>';
                                    echo '<td>'.formateaNumero($row['Noviembre']).'</td>';
                                    echo '<td>'.formateaNumero($row['Diciembre']).'</td>';
                                    echo '</tr>';
                                }
                            }
                        }
                        ?>

                        </tbody>
                    </table><br><br>
                    * Millones de Pesos
                </div>

                </div>
            </div>

        </div>
    </div>




<!-- Modal -->
<form method="post" enctype="multipart/form-data">
<div class="modal fade" id="cargaBase" tabindex="-1" role="dialog" aria-labelledby="cargaBase" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Carga de Budget Base</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Escoja el archivo de carga para el presupuesto:<br>
                <br>
                <input type="file" id="myFile" name="myFile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button name="btnCargaPresup" id="btnCargaPresup" type="submit" class="btn btn-primary"><li class="fa fa-save"></li> Guardar</button>
            </div>
        </div>
    </div>
</div>
</form>


<script>
    function relocate_home()
    {
        location.href = "vistas/presupuestos/template_presupuesto.xlsx";
    }
</script>