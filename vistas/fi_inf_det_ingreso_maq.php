<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/dashboards/modelos/Conexion.php';



try {


    $ano = $_GET['ano'];
    $mes = $_GET['mes'];


    $stmt = Conexion::conectar()->prepare('SELECT 
ing.cod_vehiculo,
equ.marca,
equ.modelo,
equ.tipo_vehiculo,
ing.ano,
ing.mes,
ing.cod_cco,
ing.dolar_obs,
ing.porc_disp,
round(ing.desc_disp) as descuento,
ing.costo_fijo,
ing.costo_variable,
ing.total_neto,
ing.total_cobro_maq
 FROM "he_arriendo_equipos" ing 
INNER JOIN dm_equipos equ on equ.codigo_vehiculo = ing.cod_vehiculo
where ing.ano = :ano and ing.mes=:mes
order by ing.cod_vehiculo asc');
    $stmt->bindParam(":ano", $ano, PDO::PARAM_STR);
    $stmt->bindParam(":mes", $mes, PDO::PARAM_STR);


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



<h2>Detalles Ingresos Maquinaria  <em>(<?php echo $ano.'-'.$mes;?>)</h2></em> <br>

<table class="table table-sm">
    <thead>
    <tr>
        <th scope="col">Cod.</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Tipo</th>

        <th scope="col">Disp.(%)</th>
        <th scope="col">Descuento Disp.</th>
        <th scope="col">Posicionamiento</th>
        <th scope="col">Operación</th>
        <th scope="col">Total</th>
        <th scope="col">Total. Maq</th>


    </tr>
    </thead>
    <tbody>
    <?php
$totalSaldo = 0;
    if (count($res) == 0)
    {
        echo '<tr>';
        echo '<td colspan="11">No hay ingresos que mostrar ..</td>';
        echo '</tr>';

    }else{
        foreach ($res as $row)
        {
            echo '<tr>';
            echo '<td>'.$row['cod_vehiculo'].'</td>';
            echo '<td>'.$row['marca'].'</td>';
            echo '<td>'.$row['modelo'].'</td>';
            echo '<td>'.$row['tipo_vehiculo'].'</td>';

            echo '<td>'.$row['porc_disp'].'</td>';


            echo '<td>'.number_format($row['descuento'],0,',','.').'</td>';
            echo '<td>'.number_format($row['costo_fijo'],0,',','.').'</td>';
            echo '<td>'.number_format($row['costo_variable'],0,',','.').'</td>';
            echo '<td>'.number_format($row['total_neto'],0,',','.').'</td>';
            echo '<td>'.number_format($row['total_cobro_maq'],0,',','.').'</td>';
            echo '</tr>';

            $totalSaldo = $totalSaldo + $row['total_cobro_maq'];

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

        <th>Total:</th>
        <th> <?php echo number_format($totalSaldo,0,',','.'); ?></th>
    </tr>

    </tfoot>
</table>
    <button type="button" class="btn btn-success"
            onclick="window.open('', '_self', ''); window.close();">Cerrar</button>
</div>