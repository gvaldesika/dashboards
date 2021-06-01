
<?php

if(isset($_POST['btnMostrarPeriodo'])) {
    $tmp = $_POST['dropAnos'] . '-' . date('m-d');
    $fActual = date('Y', strtotime($tmp));
}else
{
    $fActual = date('Y');
}


$lista = PresupuestoControlador::ctrVerPresupuestoDetalle($fActual,1);

$listaMin = PresupuestoControlador::ctrVerPresupuestoDetalle($fActual,6);




?>

<style>
    .container {
        max-width: 1600px !important;
</style>

<!-- Aviso Origen del Dato-->
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Datos obtenidos desde Data Warehouse (Eugcom ERP) y IKA Dashboards (Dato Manual)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- Aviso Origen del Dato-->

<div class="container">
    <div class="card">
        <div class="card-body">
            <button type="button" name="btnVerDetalles" id="btnVerDetalles" class="btn btn-secondary" onclick="window.location = 'main.php?pag=com_inf_real_budget_un'"><i class="fa fa-back"></i> Volver</button>
            <form method="post">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Seleccione Año</label>
                            <select name="dropAnos" id="dropAnos" class="form-control">

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
                        <button type="submit" name="btnMostrarPeriodo" id="btnMostrarPeriodo" class="btn btn-primary">Mostrar</button>
                    </div>
                </div>
            </form>
            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <center><h4>Ventas Real V/S Budget - Industrial (<?php echo $fActual; ?>)</h4></center> <br>
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr class="table-active">
                            <th scope="col" class="bg-success" rowspan="1">Nro.</th>
                            <th scope="col" class="bg-success" rowspan="1" >Centro de Costo</th>
                            <th scope="col" class="bg-success" colspan="2">Enero</th>
                            <th scope="col" class="bg-success" colspan="2">Febrero</th>
                            <th scope="col" class="bg-success" colspan="2">Marzo</th>
                            <th scope="col" class="bg-success" colspan="2">Abril</th>
                            <th scope="col" class="bg-success" colspan="2">Mayo</th>
                            <th scope="col" class="bg-success" colspan="2">Junio</th>
                            <th scope="col" class="bg-success" colspan="2">Julio</th>
                            <th scope="col" class="bg-success" colspan="2">Agosto</th>
                            <th scope="col" class="bg-success" colspan="2">Septiembre</th>
                            <th scope="col" class="bg-success" colspan="2">Octubre</th>
                            <th scope="col" class="bg-success" colspan="2">Noviembre</th>
                            <th scope="col" class="bg-success" colspan="2">Diciembre</th>
                        </tr>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $ind_1_presupuestado_total = 0;
                        $ind_1_presupuestado_acumulado = 0;
                        $ind_1_real_total = 0;
                        $ind_1_real_acumulado = 0;

                        $ind_2_presupuestado_total = 0;
                        $ind_2_presupuestado_acumulado = 0;
                        $ind_2_real_total = 0;
                        $ind_2_real_acumulado = 0;

                        $ind_3_presupuestado_total = 0;
                        $ind_3_presupuestado_acumulado = 0;
                        $ind_3_real_total = 0;
                        $ind_3_real_acumulado = 0;

                        $ind_4_presupuestado_total = 0;
                        $ind_4_presupuestado_acumulado = 0;
                        $ind_4_real_total = 0;
                        $ind_4_real_acumulado = 0;

                        $ind_5_presupuestado_total = 0;
                        $ind_5_presupuestado_acumulado = 0;
                        $ind_5_real_total = 0;
                        $ind_5_real_acumulado = 0;

                        $ind_6_presupuestado_total = 0;
                        $ind_6_presupuestado_acumulado = 0;
                        $ind_6_real_total = 0;
                        $ind_6_real_acumulado = 0;

                        $ind_7_presupuestado_total = 0;
                        $ind_7_presupuestado_acumulado = 0;
                        $ind_7_real_total = 0;
                        $ind_7_real_acumulado = 0;

                        $ind_8_presupuestado_total = 0;
                        $ind_8_presupuestado_acumulado = 0;
                        $ind_8_real_total = 0;
                        $ind_8_real_acumulado = 0;

                        $ind_9_presupuestado_total = 0;
                        $ind_9_presupuestado_acumulado = 0;
                        $ind_9_real_total = 0;
                        $ind_9_real_acumulado = 0;

                        $ind_10_presupuestado_total = 0;
                        $ind_10_presupuestado_acumulado = 0;
                        $ind_10_real_total = 0;
                        $ind_10_real_acumulado = 0;

                        $ind_11_presupuestado_total = 0;
                        $ind_11_presupuestado_acumulado = 0;
                        $ind_11_real_total = 0;
                        $ind_11_real_acumulado = 0;

                        $ind_12_presupuestado_total = 0;
                        $ind_12_presupuestado_acumulado = 0;
                        $ind_12_real_total = 0;
                        $ind_12_real_acumulado = 0;

                        foreach ($lista as $row)
                        {
                            $ind_1_presupuestado_total = 0;
                            $ind_1_presupuestado_acumulado = 0;
                            $ind_1_real_total = $row[0]['presupuestado'];
                            $ind_1_real_acumulado = 0;

                            $ind_2_presupuestado_total = 0;
                            $ind_2_presupuestado_acumulado = 0;
                            $ind_2_real_total = 0;
                            $ind_2_real_acumulado = 0;

                            $ind_3_presupuestado_total = 0;
                            $ind_3_presupuestado_acumulado = 0;
                            $ind_3_real_total = 0;
                            $ind_3_real_acumulado = 0;

                            $ind_4_presupuestado_total = 0;
                            $ind_4_presupuestado_acumulado = 0;
                            $ind_4_real_total = 0;
                            $ind_4_real_acumulado = 0;

                            $ind_5_presupuestado_total = 0;
                            $ind_5_presupuestado_acumulado = 0;
                            $ind_5_real_total = 0;
                            $ind_5_real_acumulado = 0;

                            $ind_6_presupuestado_total = 0;
                            $ind_6_presupuestado_acumulado = 0;
                            $ind_6_real_total = 0;
                            $ind_6_real_acumulado = 0;

                            $ind_7_presupuestado_total = 0;
                            $ind_7_presupuestado_acumulado = 0;
                            $ind_7_real_total = 0;
                            $ind_7_real_acumulado = 0;

                            $ind_8_presupuestado_total = 0;
                            $ind_8_presupuestado_acumulado = 0;
                            $ind_8_real_total = 0;
                            $ind_8_real_acumulado = 0;

                            $ind_9_presupuestado_total = 0;
                            $ind_9_presupuestado_acumulado = 0;
                            $ind_9_real_total = 0;
                            $ind_9_real_acumulado = 0;

                            $ind_10_presupuestado_total = 0;
                            $ind_10_presupuestado_acumulado = 0;
                            $ind_10_real_total = 0;
                            $ind_10_real_acumulado = 0;

                            $ind_11_presupuestado_total = 0;
                            $ind_11_presupuestado_acumulado = 0;
                            $ind_11_real_total = 0;
                            $ind_11_real_acumulado = 0;

                            $ind_12_presupuestado_total = 0;
                            $ind_12_presupuestado_acumulado = 0;
                            $ind_12_real_total = 0;
                            $ind_12_real_acumulado = 0;

                            echo '<tr>';
                            echo '<td>'.$row[0]['cco'].'</td>';
                            echo '<td>'.$row[0]['nombre_cco'].'</td>';
                            echo '<td class="table-warning">'. round($row[0]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[0]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[1]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[1]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[2]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[2]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[3]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[3]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[4]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[4]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[5]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[5]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[6]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[6]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[7]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[7]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[8]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[8]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[9]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[9]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[10]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[10]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[11]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[11]['real']/1000000,1) .'</td>';

                            echo '</tr>';
                        }

                        ?>



                        </tbody>
                    </table><br>



                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <center><h4>Ventas Real V/S Budget - Mineria (<?php echo $fActual; ?>)</h4></center> <br>
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr class="table-active">
                            <th scope="col" class="bg-primary" rowspan="1">Nro.</th>
                            <th scope="col" class="bg-primary" rowspan="1" >Centro de Costo</th>
                            <th scope="col" class="bg-primary" colspan="2">Enero</th>
                            <th scope="col" class="bg-primary" colspan="2">Febrero</th>
                            <th scope="col" class="bg-primary" colspan="2">Marzo</th>
                            <th scope="col" class="bg-primary" colspan="2">Abril</th>
                            <th scope="col" class="bg-primary" colspan="2">Mayo</th>
                            <th scope="col" class="bg-primary" colspan="2">Junio</th>
                            <th scope="col" class="bg-primary" colspan="2">Julio</th>
                            <th scope="col" class="bg-primary" colspan="2">Agosto</th>
                            <th scope="col" class="bg-primary" colspan="2">Septiembre</th>
                            <th scope="col" class="bg-primary" colspan="2">Octubre</th>
                            <th scope="col" class="bg-primary" colspan="2">Noviembre</th>
                            <th scope="col" class="bg-primary" colspan="2">Diciembre</th>
                        </tr>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>
                            <th scope="col" class="table-warning">PR</th>
                            <th scope="col" class="table-primary">RE</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($listaMin as $row)
                        {

                            echo '<tr>';
                            echo '<td>'.$row[0]['cco'].'</td>';
                            echo '<td>'.$row[0]['nombre_cco'].'</td>';
                            echo '<td class="table-warning">'. round($row[0]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[0]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[1]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[1]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[2]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[2]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[3]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[3]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[4]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[4]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[5]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[5]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[6]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[6]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[7]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[7]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[8]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[8]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[9]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[9]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[10]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[10]['real']/1000000,1) .'</td>';

                            echo '<td class="table-warning">'.round($row[11]['presupuestado']/1000000,1) .'</td>';
                            echo '<td class="table-primary">'.round($row[11]['real']/1000000,1) .'</td>';

                            echo '</tr>';
                        }

                        ?>



                        </tbody>
                    </table><br>
                    *$M pesos
                </div>
            </div>

        </div>
    </div>
</div>



