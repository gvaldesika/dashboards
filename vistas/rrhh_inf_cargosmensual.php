<?php
require_once 'controladores/cargos.controlador.php';

//prepara la lista de meses (dropdown)
$tmp = devuelvemeses();
$listaMeses = array();
foreach ($tmp as $item) {
    $listaMeses[] = explode('|',$item);
}
// FIN prepara la lista de meses (dropdown)

// Prepara lista de CCO (dropdown)
$listaCCO = CargosControlador::ctrverCCO();
$listaPeriodos = CargosControlador::ctrVerPeriodos();
$listaAnos = CargosControlador::ctrverPeriodosAno();





if (isset($_POST['btnFiltrar']))
{
    if (!is_null($_POST['idCCO']))
    {
        $lista = CargosControlador::ctrverHeadCount($_POST['idAno'],$_POST['idMeses'],$_POST['idCCO']);
        $_SESSION['listacargos'] = $lista;

    }else
    {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa fa-warning"></i> Por favor seleccione al menos 1 centro de costo
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';

    }
}else
{
    $lista = $_SESSION['listacargos'];
}


if (isset($_POST['btnExcel']))
{
    if (isset($_SESSION['listacargos']))
    {
        $res = CargosControlador::ctrExportarExcel($_SESSION['listacargos']);
        $nomArchivo = 'head_count_'.date('d_m_Y').'.xlsx';
        echo '<script>

    window.onload = function(){
         window.open("tmp/'.$nomArchivo.'", "_blank"); // will open new tab on window.onload
    }
</script>';
    }else{
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa fa-warning"></i> ¡No hay datos que exportar!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
    }
}


if (!is_null($_POST['idCCO']))
{
    $btnExcelStatus = '';
}


//var_dump($_SESSION['listacargos']);



?>
<!-- **** Informe de Head Count **** -->
<style>
    .table tr {
        cursor: pointer;
    }
    .table{
        background-color: #fff !important;
    }
    .hedding h1{
        color:#fff;
        font-size:25px;
    }
    .main-section{
        margin-top: 120px;
    }
    .hiddenRow {
        padding: 0 4px !important;
        background-color: #eeeeee;
        font-size: 13px;
    }
    .accordian-body span{
        color:#a2a2a2 !important;
    }
</style>

<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Datos obtenidos desde IKA Dashboards (Dato obtenido desde Talana)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- Aviso Origen del Dato-->

<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Reporte Head Count</h3></center>
            <br>
            <form method="post">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Centro de Costo</label>
                            <select name="idCCO[]" id="idCCO" multiple="multiple" class="form-control">
                                <?php

                                foreach ($listaCCO as $row)
                                {
                                    if (isset($_POST['idCCO']) && $_POST['idCCO'] == $row['nom_cco']) {
                                        echo '<option selected="selected" value="' . $row['nom_cco'] . '">' . $row['nom_cco'] . '</option>';
                                    }else
                                    {
                                        echo '<option value="' . $row['nom_cco'] . '">' . $row['nom_cco'] . '</option>';
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
                            <label for="exampleInputEmail1">Año</label>
                            <select name="idAno" id="idAno" class="form-control">
                                <option value="-1">Seleccione Año</option>
                                <?php
                                foreach ($listaAnos as $row)
                                {
                                    if (isset($_POST['btnFiltrar']) && $_POST['idAno'] == $row['periodo']) {
                                        echo '<option selected="selected" value="' . $row['periodo'] . '">' . $row['periodo'] . '</option>';
                                    }else
                                    {
                                        echo '<option value="' . $row['periodo'] . '">' . $row['periodo'] . '</option>';
                                    }

                                }

                                ?>
                            </select>
                            <br>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mes</label>
                            <select name="idMeses" id="idMeses" class="form-control">
                                <option value="-1">Seleccione Mes</option>
                                <?php

                                foreach ($listaPeriodos as $row)
                                {
                                    if (isset($_POST['btnFiltrar']) && $_POST['idMeses'] == $row['mes']) {
                                        echo '<option selected="selected" value="' . $row['mes'] . '">' . nroaMes($row['mes']) . '</option>';
                                    }else
                                    {
                                        echo '<option value="' . $row['mes'] . '">' . nroaMes($row['mes']) . '</option>';
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
            <form method="post">
                <button  name="btnExcel" id="btnExcel" type="submit" class="btn btn-success"><i class="fa fa-download"></i> Exportar a Excel</button>
            </form>
            <br>
            <br>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Periodo</th>
                    <th scope="col">Mes</th>
                    <th scope="col">CCO</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Dot. Actual</th>
                    <th scope="col">Dot. Prog.</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sumaActual = 0;
                $sumaHeadC = 0;
                if (count($lista) != 0)
                {
                    $idfila = 1;
                    foreach ($lista as $row)
                    {
                        //class="table-warning"
                        echo '<tr colspan="6" data-toggle="collapse" data-target="#fila_'.$idfila.'" class="accordion-toggle">';
                        echo '<td>'.$row['periodo'].'</td>';
                        echo '<td>'.nroaMes($row['mes']).'</td>';
                        echo '<td>'.$row['nom_cco'].'</td>';
                        echo '<td>'.$row['cargo'].'</td>';

                        $tmp1 = $row['nom_cco'].'_'.$row['cargo'];
                        $modalNombre = str_replace(' ', '_', $tmp1);


                        if ($row['cantidad'] > $row['headc'] && $row['headc'] !=0)
                        {
                            echo '<td class="table-warning">'.$row['cantidad'].'</td>';
                            echo '<td class="table-warning">'.$row['headc'].'</td>';
                        }else
                        {
                            echo '<td>'.$row['cantidad'].'</td>';
                            echo '<td>'.$row['headc'].'</td>';

                        }
                        echo '</tr>';
                        $listaTrabajadores = CargosControlador::ctrverHeadCountTrabajadores($_POST['idAno'],$_POST['idMeses'],$_POST['idCCO'],$row['cargo']);
//var_dump($listaTrabajadores);

                        /**
                         * <td colspan="6" class="hiddenRow">
                        <div class="accordian-body collapse p-3" id="demo1">
                        <p>No : <span>1</span></p>
                        <p>Date : <span>12 Jan 2018</span> </p>
                        <p>Description : <span>Good</span> </p>
                        <p>Credit : <span>$150.00</span> </p>
                        <p>Debit : <span></span></p>
                        <p>Balance : <span>$150.00</span></p>
                        </div>
                        </td>
                         */
                        echo '<tr class="p">
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordian-body collapse p-3" id="fila_'.$idfila.'">';
                        foreach ($listaTrabajadores as $row2)
                        {
                            echo '<p>'.$row2['rut'].' - '.$row2['nombre'].' '.$row2['ap_paterno'].' '.$row2['ap_materno'].'</p>';
                        }

                        echo '</div>
                            </td>
                        </tr>';



                        $sumaActual = $sumaActual + $row['cantidad'];
                        $sumaHeadC = $sumaHeadC + $row['headc'];
                    }
                    $idfila++;

                }
                else
                {
                    echo '<tr>';
                    echo '<td colspan="6">Seleccione un filtro para mostrar información</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';

                    echo '</tr>';
                }

                ?>
                </tbody>
                <tfoot>
                <tr>
                <tr class="table-active">
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">TOTALES</th>
                    <th scope="col"><?php echo $sumaActual; ?></th>
                    <th scope="col"><?php echo $sumaHeadC; ?></th>
                    <th scope="col"></th>
                </tr>
                </tr>
                </tfoot>
            </table>


        </div>
    </div>
</div>


<?php
/*
foreach ($lista as $row) {
    //$row['cargo']
    //$listaTrabajadores = CargosControlador::ctrverHeadCountTrabajadores($_POST['idAno'],$_POST['idMeses'],$_POST['idCCO'],$row['cargo']);

    $tmp1 = $row['nom_cco'].'_'.$row['cargo'];
    $modalNombre = str_replace(' ', '_', $tmp1);


    echo '<div class="modal fade" id="modal_'.$modalNombre.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles Cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">RUT</th>
      <th scope="col">Nombres</th>
      <th scope="col">Ap. Paterno</th>
      <th scope="col">Ap. Materno</th>
      <th scope="col">Cargo</th>
    </tr>
  </thead>
  <tbody>
';




    foreach ($listaTrabajadores as $row)
    {
        echo '<tr>';
        echo '<td>'.$row['rut'].'</td>';
        echo '<td>'.$row['nombre'].'</td>';
        echo '<td>'.$row['ap_paterno'].'</td>';
        echo '<td>'.$row['ap_materno'].'</td>';
        echo '<td>'.$row['cargo'].'</td>';
        echo '</tr>';

    }

      echo '  </tbody>
</table></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>';

}
*/

?>

<script>
    $('.accordion-toggle').click(function(){
        $('.hiddenRow').hide();
        $(this).next('tr').find('.hiddenRow').show();
    });
</script>
