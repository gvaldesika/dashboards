<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/Conexion.php';


//href="vistas/op_det_reports.php?ano='.$ano.'&mes=1&cco=532gasto='.urlencode('CARGADOR FRONTAL').'"

$ano = $_GET['ano'];
$mes = $_GET['mes'];
$cco = $_GET['cco'];
$tipo = urldecode($_GET['tipo']);

$lista = null;
try {

    $stmt = Conexion::conectar()->prepare('select * from "he_reports" where ano=:ano and mes=:mes and "Cod. CCO"=:cco and "Tipo Veh." = :tipo');

    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
    $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
    $stmt->bindParam(":cco", $cco, PDO::PARAM_STR);
    $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
    $stmt->execute();
    //$stmt->fetch();
    $lista =  $stmt->fetchAll();
} catch (Exception $e) {
    return $e->getMessage();
}





?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .container{
        width: 1800px !important;
    }
</style>


<div style="width: 1800px; margin-left: 50px; margin-right: 50px;">



<h2>Detalles Report</h2><br>
    <h4>Tipo Equipo: <?php echo $tipo; ?> - Mes/Año: <?php echo $mes.'/'.$ano?></h4><br>

<table class="table table-sm">
    <thead>
    <tr>
        <th scope="col">Cod. Report</th>
        <th scope="col">Nro. Report</th>
        <th scope="col">Fecha</th>

        <th scope="col">Nro. Equipo</th>
        <th scope="col">Equipo</th>
        <th scope="col">Chofer</th>

        <th scope="col">Km. Inicial</th>
        <th scope="col">Km. Final</th>
        <th scope="col">Km Recorrido</th>

        <th scope="col">Hr. Inicial</th>
        <th scope="col">Hr. Final</th>
        <th scope="col">Hr. Recorrido</th>

        <th scope="col">UM</th>
        <th scope="col">Producción</th>

        <th scope="col">Turno</th>
        <th scope="col">Material</th>
        <th scope="col">Usuario</th>
        <th scope="col">Rep. Físico</th>


    </tr>
    </thead>
    <tbody>
    <?php
$totalSaldo = 0;
    if (count($lista) == 0)
    {
        echo '<tr>';
        echo '<td colspan="11">No hay comprobantes que mostrar ..</td>';
        echo '</tr>';

    }else{
        foreach ($lista as $row)
        {
            echo '<tr>';
            echo '<td>'.$row['Nro. Report'].'</td>';
            echo '<td>'.$row['Cod. Report'].'</td>';
            echo '<td>'.date('d-m-Y',strtotime($row['Fecha Report'])).'</td>';
            echo '<td>'.$row['Cod. Vehiculo'].'</td>';
            echo '<td>'.$row['Marca Veh.'].' '.$row['Modelo Veh.'].'</td>';

            echo '<td>'.$row['Nom. Chofer'].' '.$row['Ap. Chofer'].'</td>';
            echo '<td>'.$row['Km. Inicial'].'</td>';
            echo '<td>'.$row['Km. Final'].'</td>';
            echo '<td>'.$row['Km Recorrido'].'</td>';

            echo '<td>'.$row['Hr. Inicial'].'</td>';
            echo '<td>'.$row['Hr. Final'].'</td>';
            echo '<td>'.$row['Hr. Recorrido'].'</td>';

            echo '<td>'.$row['um'].'</td>';
            echo '<td>'.$row['cantidad'].'</td>';
            echo '<td>'.$row['turno'].'</td>';
            echo '<td>'.$row['material'].'</td>';

            echo '<td>'.$row['Usuario Report'].'</td>';
            echo '<td><a class="btn btn-primary" href="https://legacy.ika-hub.cl/flotas/report/archivosx/'.$row['archivo'].'" target="_blank"><i class="fa fa-download"></i></a></td>';


            /***
             *         <th scope="col">Cod. Report</th>
            <th scope="col">Nro. Report</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nro. Equipo</th>
            <th scope="col">Equipo</th>
            <th scope="col">Chofer</th>
            <th scope="col">Km. Inicial</th>
            <th scope="col">Km. Final</th>
            <th scope="col">Km Recorrido</th>
            <th scope="col">Hr. Inicial</th>
            <th scope="col">Hr. Final</th>
            <th scope="col">Hr. Recorrido</th>
            <th scope="col">UM</th>
            <th scope="col">Producción</th>
            <th scope="col">Turno</th>
            <th scope="col">Usuario</th>
             */
            echo '</tr>';

            $totalSaldo = $totalSaldo + $row['cantidad'];

        }

    }




    ?>


    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th> </th>
        <th> </th>
        <th>Total:</th>
        <th><?php echo $totalSaldo; ?></th>
        <th> </th>
        <th> </th>
        <th> </th>
        <th> </th>
    </tr>

    </tfoot>
</table>
    <button type="button" class="btn btn-success"
            onclick="window.open('', '_self', ''); window.close();">Cerrar</button>
</div>