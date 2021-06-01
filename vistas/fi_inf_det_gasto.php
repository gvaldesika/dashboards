<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/Conexion.php';



try {


    $ano = $_GET['ano'];
    $mes = $_GET['mes'];
    $gasto = urldecode($_GET['gasto']);
    $cco = $_GET['cco'];
    $op = $_GET['op']; // Permite visualizar multiples centros de costo

    switch ($op)
    {
        case 'adm':
            $stmt = Conexion::conectar()->prepare('SELECT 
                    *
                    FROM he_comprobantes_contables
                    WHERE
                    cuentas_de_gastos = :gasto 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (10,12,15,18,19,20,21,22,23,25)');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":gasto", $gasto, PDO::PARAM_STR);
            break;

        case 'unind':
            $stmt = Conexion::conectar()->prepare('SELECT 
                    *
                    FROM he_comprobantes_contables
                    WHERE
                    cuentas_de_gastos = :gasto 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (525,526,527,529,530,533,536)');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":gasto", $gasto, PDO::PARAM_STR);
            break;

        case 'unmin':
            $stmt = Conexion::conectar()->prepare('SELECT 
                    *
                    FROM he_comprobantes_contables
                    WHERE
                    cuentas_de_gastos = :gasto 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (528,532,534)');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":gasto", $gasto, PDO::PARAM_STR);
            break;

        case 'uninf':
            $stmt = Conexion::conectar()->prepare('SELECT 
                    *
                    FROM he_comprobantes_contables
                    WHERE
                    cuentas_de_gastos = :gasto 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo in (535,537,538,539,540)');
            $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
            $stmt->bindParam(":gasto", $gasto, PDO::PARAM_STR);
            break;

        default:
            if ($cco !=50)
            {
                $stmt = Conexion::conectar()->prepare('SELECT 
                    *
                    FROM he_comprobantes_contables
                    WHERE
                    cuentas_de_gastos = :gasto 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and
                    codigo_centro_costo != 50 and codigo_centro_costo = :cco');
                $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
                $stmt->bindParam(":gasto", $gasto, PDO::PARAM_STR);
                $stmt->bindParam(":cco", $cco, PDO::PARAM_STR);

            }else
            {
                $stmt = Conexion::conectar()->prepare('SELECT 
                    *
                    FROM he_comprobantes_contables
                    WHERE
                    cuentas_de_gastos = :gasto 
                    and
                    ano_proceso = :ano and mesfecha = :mes
                    and codigo_centro_costo = :cco');
                $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
                $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);
                $stmt->bindParam(":gasto", $gasto, PDO::PARAM_STR);
                $stmt->bindParam(":cco", $cco, PDO::PARAM_STR);
            }
            break;
    }





    $stmt->execute();

    $res = $stmt->fetchAll();
} catch (Exception $e) {

}


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<style>
    .container{
        width: 1400px !important;
    }
</style>


<div class="container">



<h2>Detalles Comprobantes - <em><?php echo $gasto;?></h2></em> <br>

<table class="table table-sm">
    <thead>
    <tr>
        <th scope="col">Empresa</th>
        <th scope="col">Año</th>
        <th scope="col">Mes</th>
        <th scope="col">Tipo</th>
        <th scope="col">Nro.</th>

        <th scope="col">Cuenta</th>
        <th scope="col">Nom. Cuenta</th>
        <th scope="col">Glosa</th>

        <th scope="col">Debe</th>
        <th scope="col">Haber</th>
        <th scope="col">Saldo</th>


    </tr>
    </thead>
    <tbody>
    <?php
$totalSaldo = 0;
    if (count($res) == 0)
    {
        echo '<tr>';
        echo '<td colspan="11">No hay comprobantes que mostrar ..</td>';
        echo '</tr>';

    }else{
        foreach ($res as $row)
        {
            echo '<tr>';
            echo '<td>'.$row['razon_social'].'</td>';
            echo '<td>'.$row['ano_proceso'].'</td>';
            echo '<td>'.$row['mesfecha'].'</td>';
            echo '<td>'.$row['tipo_comprobante_nombre'].'</td>';
            echo '<td>'.$row['comprobante'].'</td>';

            echo '<td>'.$row['codigo_cuenta'].'</td>';
            echo '<td>'.$row['descripcion_cuenta'].'</td>';
            echo '<td>'.$row['glosa'].'</td>';

            echo '<td>'.number_format($row['debe'],0,',','.').'</td>';
            echo '<td>'.number_format($row['haber'],0,',','.').'</td>';
            echo '<td>'.number_format($row['saldo'],0,',','.').'</td>';
            echo '</tr>';

            $totalSaldo = $totalSaldo + $row['saldo'];

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
        <th>Total Saldo:</th>
        <th> <?php echo number_format($totalSaldo,0,',','.'); ?></th>
    </tr>

    </tfoot>
</table>
    <button type="button" class="btn btn-success"
            onclick="window.open('', '_self', ''); window.close();">Cerrar</button>
</div>