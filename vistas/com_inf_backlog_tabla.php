<?php

require_once 'modelos/backlog.modelo.php';

//$lista = BacklogControlador::mdlVerBacklog();
$lista3 = BacklogControlador::ctrVerBacklogTabla(-1);
//$listaEstados = TablasControlador::ctrObtenerTabla(2);




?>
<style>
    .table td {
        text-align: center;
    }

    .bold-blue {
        font-weight: bold;
        color: #0277BD;
    }

    .container {
        max-width: 1340px;
    }
</style>



<!-- Aviso Origen del Dato-->
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <i class="fa fa-info"></i> Datos obtenidos desde Data Warehouse (Eugcom ERP)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- Aviso Origen del Dato-->


<div class="container">
    <div class="card">
        <div class="card-body">
            <center><h3>Backlog</h3></center><br><br>






            <table id="table" class="table table-bordered" data-toggle="table"
                   data-search="true"
                   data-filter-control="true"
                   data-show-export="true"
                   data-click-to-select="true">



                <thead>
                <tr>
                    <td class="table-secondary"><b>Cliente</b></td>
                    <td class="table-secondary"><b>Nombre Proyecto</b></td>
                    <td class="table-secondary"><b>CCO</b></td>
                    <td class="table-success"><b>Estado</b></td>
                    <td class="table-danger"><b>Dur. Contrato (Meses)</b></td>
                    <td class="table-secondary"><b>Termino</b></td>
                    <td class="table-secondary"><b>Saldo</b></td>
                    <td class="table-secondary"><b>Fac. Promedio¹</b></td>
                    <td class="table-secondary"><b>Empresa</b></td>
                </tr>
                </thead>
                <tbody>
                <?php
$totalBacklog = 0;
$totalPromedio = 0;
                foreach ($lista3 as $row)
                {
                    $totalBacklog = $totalBacklog + ($row['mensual']*$row['restante_meses']);
                    $totalPromedio = $totalPromedio +$row['promedio'];
                    echo '<tr>';
                    echo '<td>'.$row['Nom_Cli'].'</td>';
                    echo '<td>'.$row['Nom_Proy'].'</td>';
                    echo '<td>'.$row['CCO_Proy'].'</td>';
                    echo '<td>'.$row['nom_estado'].'</td>';
                    echo '<td>'.$row['total_meses'].'</td>';
                    echo '<td>'.date('m-Y',strtotime($row['Fecha_Fin'])).'</td>';
                    echo '<td>'.number_format($row['mensual']*$row['restante_meses'],0,',','.').'</td>';
                    echo '<td>'.number_format($row['promedio'],0,',','.').'</td>';
                    echo '<td>'.$row['Razon_Social'].'</td>';                    echo '</tr>';
                }
                ?>
<!--
                <tr>
                    <td scope="row">Bocamina Carbon</td>
                    <td>ENEL</td>
                    <td>Octubre 2020</td>
                    <td>Diciembre 2021</td>
                    <td><li class="fa fa-truck"></li> En Ejecución</td>
                    <td>$4.100</td>
                    <td><button type="button" class="btn btn-primary" tooltip="Editar"><li class="fa fa-edit"></li></button>
                        <button type="button" class="btn btn-danger" tooltip="Editar"><li class="fa fa-trash"></li></button>
                        <button type="button" class="btn btn-secondary" tooltip="Editar"><li class="fa fa-check"></li></button></td>
                </tr> -->
                </tbody>
                <tfoot>
                <tr>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"><b>Total:</b></td>
                    <td class="table-active"><b><?php echo '$'.number_format($totalBacklog,0,',','.') ?></b></td>
                    <td class="table-active"><b><?php echo '$'.number_format($totalPromedio,0,',','.') ?></b></td>
                    <td class="table-active"></td>

                </tr>
                </tfoot>
            </table>

            <p>1: Promedio ultimos 12 meses. Fuente de: "Datos publicados"</p>
        </div>
    </div>
</div>

<!-- Modal -->


<!-- Modal Nuevo Backlog -->












